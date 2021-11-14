<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Kriteria');
        $this->load->model('Model_Program');
        $this->load->model('Model_Alternatif');

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
        $program = $this->db->get('program')->result();
        $data['jumlah_program'] = count($program);
        $data['data_program']   = $this->db->get('program');
        $this->load->view('user/alternatif/data_alternatif', $data);
    }

    public function create($id_program)
    {
        $data['view'] = $this->db->where('id_program', $id_program)->get('program')->row();
        $data['data_kriteria']   = $this->db->get('kriteria')->result();
        $data['data_alternatif'] = $this->db->query("SELECT alternatif.id_alternatif, kriteria.kriteria, alternatif.nilai, alternatif.keterangan FROM alternatif,kriteria WHERE alternatif.id_kriteria=kriteria.id_kriteria AND alternatif.id_program='$id_program'")->result();
        $this->load->view('user/alternatif/input_alternatif', $data);
    }

    public function tambah()
    {
        $program        = $this->input->post('program');
        $kriteria        = $this->input->post('kriteria');
        $nilai           = $this->input->post('nilai');
        $keterangan      = $this->input->post('keterangan');
        $data            = array(
            'id_program'        => $program,
            'id_kriteria'       => $kriteria,
            'nilai'          => $nilai,
            'keterangan'     => $keterangan
        );

        $cek = $this->Model_Alternatif->check();
        if ($cek->num_rows() > 1) {
            $this->session->set_flashdata('warning', 'Data Sudah Tersedia');
        } else {
            $this->Model_Alternatif->insert($data);
        }
        redirect_back();
    }

    public function view_edit($id_alternatif)
    {
        $data['view'] = $this->db->where('id_alternatif', $id_alternatif)->get('alternatif')->row();
        $data['data_alternatif'] = $this->db->where('id_alternatif', $id_alternatif)->get('alternatif')->row();
        $this->load->view('user/alternatif/edit_alternatif', $data);
    }

    public function edit($id_alternatif)
    {
        $program         = $this->input->post('program', true);
        $kriteria        = $this->input->post('kriteria', true);
        $nilai           = $this->input->post('nilai', true);
        $keterangan      = $this->input->post('keterangan', true);
        $data            = array(
            'id_program'     => $program,
            'id_kriteria'    => $kriteria,
            'nilai'          => $nilai,
            'keterangan'     => $keterangan
        );

        if ($this->Model_Alternatif->edit($data, $id_alternatif) == TRUE) {
            $this->session->set_flashdata('edit', true);
        } else {
            $this->session->set_flashdata('edit', false);
        }

        redirect('user/alternatif/index/' . $id_alternatif);
    }

    public function delete($id_alternatif)
    {
        $this->Model_Alternatif->delete($id_alternatif);
        $this->session->set_flashdata('hapus', 'Berhasil Dihapus');
        redirect_back($id_alternatif);
    }
}
