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
                alert('Login Dahulu Sebelum Akses Halaman Ini !');
                window.location = '<?php echo base_url('index.php/login/index_auth'); ?>'
            </script>
            <?php
        }
    }

    public function index()
    {
        $this->load->view('user/analisa/data_analisa');
    }

    public function proses_normalisasi()
    {
        $program = $this->db->query("SELECT DISTINCT kriteria.tipe, alternatif.id_program, alternatif.id_kriteria FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND program.id_program=alternatif.id_program");
        foreach ($program->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_program  = $a1->id_program;

            if ($a1->tipe == "benefit") {

                $max = $this->db->query("SELECT kriteria.kriteria, MAX(alternatif.nilai) as hasilmax FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND kriteria.id_kriteria='$id_kriteria' ")->row();
                $nil = $this->db->query("SELECT nilai FROM alternatif WHERE id_kriteria='$id_kriteria' AND id_program='$id_program'")->row();


                $data = array(
                    'id_program' => $a1->id_program,
                    'id_kriteria' => $a1->id_kriteria,
                    'normalisasi' => number_format($nil->nilai / $max->hasilmax, 2),
                );
                $nilaimax = number_format($nil->nilai / $max->hasilmax, 2);
                $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_program='$a1->id_program' and id_kriteria='$a1->id_kriteria' and normalisasi='$nilaimax'");
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

                $data = array(
                    'id_program' => $a1->id_program,
                    'id_kriteria' => $a1->id_kriteria,
                    'normalisasi' => number_format($min->hasilmin / $nil->nilai, 2),
                );
                $nilaimin = number_format($min->hasilmin / $nil->nilai, 2);
                $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_program='$a1->id_program' and id_kriteria='$a1->id_kriteria' and normalisasi='$nilaimin'");
                if ($cek->num_rows() == null) {
                    $this->db->insert('normalisasi', $data);
                } elseif ($cek->num_rows() == 1) {
                    $this->session->set_flashdata('gagal', 'Data Sudah Di normalisasikan');
                ?>

                <?php
                }
            }
        }
        redirect('user/analisa/index');
    }

    public function delete_analisa()
    {
        $this->db->query("DELETE FROM analisa");
        $this->db->query("DELETE FROM peringkat");
        redirect('user/analisa/index');
    }

    public function delete_normalisasi()
    {
        $this->db->query("DELETE FROM normalisasi");
        redirect('user/analisa/index');
    }

    public function proses_rangking()
    {
        $program = $this->db->query("SELECT DISTINCT alternatif.id_program, alternatif.id_kriteria FROM alternatif,kriteria,program WHERE kriteria.id_kriteria=alternatif.id_kriteria AND program.id_program=alternatif.id_program");
        foreach ($program->result() as $a1) {
            $id_kriteria = $a1->id_kriteria;
            $id_program = $a1->id_program;
            $bobot = $this->db->query("SELECT bobot FROM kriteria WHERE id_kriteria='$id_kriteria'")->row();
            $nil = $this->db->query("SELECT normalisasi FROM normalisasi WHERE id_kriteria='$id_kriteria' AND id_program='$id_program'")->row();
            echo $a1->id_program . ' - ' . number_format($nil->normalisasi * $bobot->bobot, 2) . ' - ' . $a1->id_kriteria . '<br>';

            $data = array(
                'id_program'    => $a1->id_program,
                'id_kriteria'   => $a1->id_kriteria,
                'nilai_analisa' => number_format($nil->normalisasi * $bobot->bobot, 2),
            );
            $nimax = number_format($nil->normalisasi * $bobot->bobot, 2);
            $cek = $this->db->query("SELECT * FROM analisa WHERE id_program='$a1->id_program' and id_kriteria='$a1->id_kriteria' and nilai_analisa='$nimax'");
            if ($cek->num_rows() == null) {
                $this->db->insert('analisa', $data);
            } elseif ($cek->num_rows() == 1) {
                $this->session->set_flashdata('gagal', 'Data Sudah Di Analisa');
                ?>
<?php
            }
        }

        $sql = $this->db->query("SELECT * FROM program");
        foreach ($sql->result() as $a) {
            $id_program = $a->id_program;
            $nama_program = $a->nama_program;
            $sum = 0;
            $sql2 = $this->db->query("SELECT id_kriteria FROM kriteria");
            foreach ($sql2->result() as $row) {
                $id_kriteria = $row->id_kriteria;
                $sql4 = $this->db->query("SELECT nilai_analisa FROM analisa WHERE id_program='$id_program' and id_kriteria='$id_kriteria'")->row_array();

                $sum = $sum + $sql4->nilai_analisa;
            }
            $data = array(
                'id_program'     => $id_program,
                'nama_program'   => $nama_program,
                'nilai_peringkat' => $sum
            );
            $this->db->insert('peringkat', $data);
        }
        redirect('user/analisa/index');
    }
}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 03:28:59 */
/* http://harviacode.com */