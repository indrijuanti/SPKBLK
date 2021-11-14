<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_User');
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function index_auth()
    {
        $data['title'] = 'Login';
        $this->load->view('auth/index', $data);
    }

    public function auth()
    {
        $email    = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        //$password = md5($this->input->post('password', TRUE));

        $cek = $this->db->where('email', $email)->where('password', md5($password))->get('user')->row();
        $cek2 = count($cek);

        if ($cek2 > 0) {
            $data['logged_in']  = TRUE;
            $data['id_user']    = $cek->id_user;
            $data['name']       = $cek->name;
            $data['email']      = $cek->email;
            $data['image']      = $cek->image;
            $data['level']      = $cek->level;
            $data['logged_in']  = "login";

            $this->session->set_userdata($data);
            if ($this->session->userdata('level') == 'admin') {
                redirect('admin/dashboard');
            } elseif ($this->session->userdata('level') == 'user') {
                redirect('user/dashboard');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Email atau Password tidak sesuai');

            redirect_back();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        session_destroy();

        redirect('login/index_auth');
    }
}
