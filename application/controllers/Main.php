<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_User');
    }

    public function index()
    {

        $data['title'] = 'Home Page';
        $this->load->view("mainpage/mainview.php", $data);
    }
}
