<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
        $program = $this->db->get('program')->result();
        $data['jumlah_program'] = count($program);
        $data['data_program']   = $this->db->get('program');
        $this->load->view('admin/program/data_program', $data);
    }

    public function create()
    {
        $this->load->view('admin/program/input_program');
    }

    public function tambah()
    {
        $nama_program    = $this->input->post('nama_program');
        $kode            = $this->input->post('kode');
        $kategori        = $this->input->post('kategori');
        $banyak_pendaftar = $this->input->post('banyak_pendaftar');
        $instruktur      = $this->input->post('instruktur');
        $fasilitas       = $this->input->post('fasilitas');
        $alumni          = $this->input->post('alumni');


        $data            = array(
            'nama_program'  => $nama_program,
            'kode'          => $kode,
            'kategori'      => $kategori,
            'banyak_pendaftar' => $banyak_pendaftar,
            'instruktur'    => $instruktur,
            'fasilitas'     => $fasilitas,
            'alumni'        => $alumni

        );

        if ($this->Model_Program->insert($data) == TRUE) {
            $this->session->set_flashdata('tambah', true);
        } else {
            $this->session->set_flashdata('tambah', false);
        }

        redirect('admin/program/index');
    }

    public function view_edit($id_program)
    {
        $data['view'] = $this->db->where('id_program', $id_program)->get('program')->row();
        $this->load->view('admin/program/edit_program', $data);
    }

    public function edit($id_program)
    {
        $nama_program    = $this->input->post('nama_program', true);
        $kode            = $this->input->post('kode', true);
        $kategori        = $this->input->post('kategori', true);
        $banyak_pendaftar = $this->input->post('banyak_pendaftar', true);
        $instruktur      = $this->input->post('instruktur', true);
        $fasilitas       = $this->input->post('fasilitas', true);
        $alumni          = $this->input->post('alumni', true);


        $data            = array(
            'nama_program'  => $nama_program,
            'kode'          => $kode,
            'kategori'        => $kategori,
            'banyak_pendaftar' => $banyak_pendaftar,
            'instruktur'    => $instruktur,
            'fasilitas'     => $fasilitas,
            'alumni'        => $alumni

        );
        if ($this->Model_Program->edit($data, $id_program)) {
        }
        if ($this->Model_Program->edit($data, $id_program) == TRUE) {
            $this->session->set_flashdata('edit', true);
        } else {
            $this->session->set_flashdata('edit', false);
        }

        redirect('admin/program/index/' . $id_program);
    }

    public function delete($id_program)
    {
        if ($this->Model_Program->delete($id_program) == TRUE) {
            $this->session->set_flashdata('delete', true);
        } else {
            $this->session->set_flashdata('delete', false);
        }
        redirect('admin/program/index/' . $id_program);
    }
}
