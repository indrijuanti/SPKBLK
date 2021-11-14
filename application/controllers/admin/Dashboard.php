<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');
		$this->load->model('Model_Alternatif');

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
		$user = $this->db->get('user')->result();
		$data['jumlah_user'] = count($user);
		$data['data_user']   = $this->db->get('user');
		$program = $this->db->get('program')->result();
		$data['sql'] = $this->db->query("SELECT * FROM peringkat ORDER BY nilai_peringkat DESC LIMIT 1");
		$data['sql1'] = $this->db->query("SELECT * FROM kriteria ORDER BY bobot DESC LIMIT 1");


		$data['jumlah_program'] = count($program);
		$data['data_peringkat']  = $this->Model_Alternatif->view_pemenang()->result();
		$this->load->view('admin/dashboard', $data);
	}
}
