<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analisa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Alternatif');
        $this->load->model('Model_Kriteria');
        $this->load->model('Model_Program');

        if ($this->session->userdata('logged_in') != "login") {
?>
            <script type="text/javascript">
                alert('Anda harus login terlebih dahulu Sebelum Mengakses Halaman Ini !');
                window.location = '<?php echo base_url('index.php/login/index_auth'); ?>'
            </script>
            <?php
        }
    }

    public function index()
    {
        $this->load->view('admin/analisa/data_analisa');
    }

    public function proses_normalisasi()
    {

        $program = $this->db->query("SELECT DISTINCT kriteria.tipe, alternatif.id_program, alternatif.id_kriteria FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND program.id_program=alternatif.id_program");
        foreach ($program->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_program  = $a1->id_program;


            if ($a1->tipe == "Benefit") {


                $max   = $this->db->query("SELECT kriteria.kriteria, MAX(alternatif.nilai) as hasilmax FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
                $nil = $this->db->query("SELECT nilai FROM alternatif WHERE id_kriteria='$id_kriteria' AND id_program='$id_program'")->row();
                $minim   = $this->db->query("SELECT kriteria.kriteria, MIN(alternatif.nilai) as minim FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
                if (($nil->nilai - $minim->minim == 0 && $max->hasilmax - $minim->minim == 0) || $max->hasilmax - $minim->minim == 0) {
                    $normalisasi = 0;
                } else {
                    $normalisasi = ($nil->nilai - $minim->minim) / ($max->hasilmax - $minim->minim);
                }
                $data = array(
                    'id_program' => $a1->id_program,
                    'id_kriteria' => $a1->id_kriteria,
                    'normalisasi' => $normalisasi
                );

                $nimax = number_format(($nil->nilai - $minim->minim) / ($max->hasilmax - $minim->minim), 2);
                $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_program='$a1->id_program' and id_kriteria='$a1->id_kriteria' and normalisasi='$nimax'");

                if ($cek->num_rows() == null) {
                    $this->db->insert('normalisasi', $data);
                } elseif ($cek->num_rows() == 1) {
                    $this->session->set_flashdata('gagal', 'Data Sudah Di normalisasikan');
            ?>

                <?php
                }
            } elseif ($a1->tipe == "cost") {

                $min   = $this->db->query("SELECT kriteria.kriteria, MIN(alternatif.nilai) as hasilmin FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
                $nil = $this->db->query("SELECT nilai FROM alternatif WHERE id_kriteria='$id_kriteria' AND id_program='$id_program'")->row();
                $maxim   = $this->db->query("SELECT kriteria.kriteria, MAX(alternatif.nilai) as maxim FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();


                $data = array(
                    'id_program' => $a1->id_program,
                    'id_kriteria' => $a1->id_kriteria,
                    'normalisasi' => number_format(($nil->nilai - $maxim->maxim) / ($min->hasilmin - $maxim->maxim), 2)
                );
                $nimin = number_format(($nil->nilai - $maxim->maxim) / ($min->hasilmin - $maxim->maxim), 2);
                $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_program='$a1->id_program' and id_kriteria='$a1->id_kriteria' and normalisasi='$nimin'");
                if ($cek->num_rows() == null) {
                    $this->db->insert('normalisasi', $data);
                } elseif ($cek->num_rows() == 1) {
                    $this->session->set_flashdata('gagal', 'Data Sudah Di normalisasikan');
                ?>

                <?php
                }
            }
        }
        redirect('admin/analisa/index');
    }


    public function proses_keputusan()
    {

        $program = $this->db->query("SELECT DISTINCT kriteria.tipe, normalisasi.id_program, normalisasi.id_kriteria FROM normalisasi,kriteria,program WHERE kriteria.id_kriteria=normalisasi.id_kriteria AND program.id_program=normalisasi.id_program");
        foreach ($program->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_program  = $a1->id_program;

            $kriteria   = $this->db->query("SELECT kriteria.bobot, normalisasi.normalisasi FROM normalisasi,kriteria,program WHERE kriteria.id_kriteria=normalisasi.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
            $nil = $this->db->query("SELECT normalisasi FROM normalisasi WHERE id_kriteria='$id_kriteria' AND id_program='$id_program'")->row();

            $data = array(
                'id_program' => $a1->id_program,
                'id_kriteria' => $a1->id_kriteria,
                'bobot_keputusan' => number_format(($kriteria->bobot * $nil->normalisasi) + $kriteria->bobot, 2)
            );
            $keputusan = number_format(($kriteria->bobot * $nil->normalisasi) + $kriteria->bobot, 2);
            $cek = $this->db->query("SELECT * FROM keputusan WHERE id_program='$a1->id_program' and id_kriteria='$a1->id_kriteria' and bobot_keputusan='$keputusan'");
            if ($cek->num_rows() == null) {
                $this->db->insert('keputusan', $data);
            } elseif ($cek->num_rows() == 1) {
                $this->session->set_flashdata('gagal', 'Data Sudah Di normalisasikan');
                ?>

            <?php
            }
        }
        redirect('admin/analisa/index');
    }

    public function proses_matriks_batas()
    {

        $program = $this->db->query("SELECT DISTINCT keputusan.id_kriteria, keputusan.id_program FROM keputusan,kriteria,program WHERE kriteria.id_kriteria=keputusan.id_kriteria AND program.id_program=keputusan.id_program");
        foreach ($program->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_program = $a1->id_program;


            $kriteria1  = $this->db->query("SELECT EXP(SUM(LOG(bobot_keputusan)))AS jumlah FROM keputusan WHERE id_kriteria='$id_kriteria'")->row();

            $bagi       = 1 / 22;


            $data = array(
                'id_kriteria' => $a1->id_kriteria,
                'nilai_batas' => number_format(pow($kriteria1->jumlah, $bagi), 9)
            );

            $nilai_batas = number_format(pow($kriteria1->jumlah, $bagi), 9);

            $cek = $this->db->query("SELECT * FROM matriks_batas WHERE id_kriteria='$a1->id_kriteria' and nilai_batas='$nilai_batas'");

            if ($cek->num_rows() == null) {

                $insert = $this->db->insert('matriks_batas', $data);
            } else {

                $this->session->set_flashdata('gagal', 'Data Sudah Di normalisasikan');
            ?>

            <?php
            }
        }
        redirect('admin/analisa/index');
    }


    public function proses_perkiraan_batas()
    {
        $program = $this->db->query("SELECT DISTINCT matriks_batas.id_kriteria, keputusan.id_kriteria, keputusan.id_program FROM keputusan,kriteria,program,matriks_batas WHERE kriteria.id_kriteria=keputusan.id_kriteria AND program.id_program=keputusan.id_program AND kriteria.id_kriteria=matriks_batas.id_kriteria");
        foreach ($program->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_program = $a1->id_program;

            $bobot  = $this->db->query("SELECT bobot_keputusan FROM keputusan WHERE id_kriteria='$id_kriteria' AND id_program='$id_program'")->row();
            $batas  = $this->db->query("SELECT nilai_batas FROM matriks_batas WHERE id_kriteria='$id_kriteria'")->row();

            $data = array(
                'id_program' => $a1->id_program,
                'id_kriteria' => $a1->id_kriteria,
                'nilai_perkiraan' => number_format($bobot->bobot_keputusan - $batas->nilai_batas, 9)
            );
            $nilai_perkiraan = number_format($bobot->bobot_keputusan - $batas->nilai_batas, 9);
            $cek = $this->db->query("SELECT * FROM perkiraan_perbatasan WHERE id_program='$id_program' and id_kriteria='$a1->id_kriteria' and nilai_perkiraan='$nilai_perkiraan'");

            if ($cek->num_rows() == null) {
                $this->db->insert('perkiraan_perbatasan', $data);
            } elseif ($cek->num_rows() == 1) {
                $this->session->set_flashdata('gagal', 'Data Sudah Di normalisasikan');
            ?>

<?php
            }
        }
        redirect('admin/analisa/index');
    }

    public function delete_analisa()
    {
        $this->db->query("DELETE FROM peringkat");
        redirect('admin/analisa/index');
    }

    public function delete_perkiraan_batas()
    {
        $this->db->query("DELETE FROM perkiraan_perbatasan");
        redirect('admin/analisa/index');
    }

    public function delete_matriks_batas()
    {
        $this->db->query("DELETE FROM matriks_batas");
        redirect('admin/analisa/index');
    }

    public function delete_keputusan()
    {
        $this->db->query("DELETE FROM keputusan");
        redirect('admin/analisa/index');
    }

    public function delete_normalisasi()
    {
        $this->db->query("DELETE FROM normalisasi");
        redirect('admin/analisa/index');
    }

    public function proses_peringkat()
    {

        $sql = $this->db->query("SELECT * FROM program");
        foreach ($sql->result() as $a) {
            $id_program = $a->id_program;
            $nama_program = $a->nama_program;
            $sum = 0;
            $sql2 = $this->db->query("SELECT id_kriteria FROM kriteria");
            foreach ($sql2->result() as $row) {
                $id_kriteria = $row->id_kriteria;
                $sql4 = $this->db->query("SELECT nilai_perkiraan FROM perkiraan_perbatasan WHERE id_program=$id_program and id_kriteria=$id_kriteria")->row_array();
                $check = $sql4['nilai_perkiraan'] ?? 0;
                $sum = $sum + $check;
            }
            $data = array(
                'id_program'     => $id_program,
                'nama_program'   => $nama_program,
                'nilai_peringkat' => $sum
            );
            $this->db->insert('peringkat', $data);
        }
        redirect('admin/analisa/index');
    }
}
