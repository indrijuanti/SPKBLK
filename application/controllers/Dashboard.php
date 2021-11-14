<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');
		$this->load->model('Model_Alternatif');
	}

	public function index()
	{
		$user = $this->db->get('user')->result();
		$data['jumlah_user'] = count($user);
		$data['data_user']   = $this->db->get('user');
		$peserta = $this->db->get('program')->result();
		$data['jumlah_program'] = count($peserta);
		$data['data_peringkat']  = $this->Model_Alternatif->view_pemenang()->result();
		$this->load->view('dashboard', $data);
	}
}
