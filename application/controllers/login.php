<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('session');
    }


    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('template/login', $data);
        $this->load->view('login/index', $data);
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('uname1'));
        $password = htmlspecialchars($this->input->post('pwd1'));
        $ceklogin = $this->login_model->login($username, $password);

        if ($ceklogin) {
            foreach ($ceklogin as $row);
            # code...
            $this->session->set_userdata('user', $row->username);
            $this->session->set_userdata('level', $row->level);
            $this->session->set_userdata('id', $row->id_user);
            if ($this->session->userdata('level') == "admin") {
                redirect('admin/index');
            } elseif ($this->session->userdata('level') == "user") {
                redirect('katalog');
            }
        } else {
            $data['title'] = 'Login';
            $this->load->view('template/login', $data);
            $this->load->view('login/index', $data);
            echo "<script>alert('Username dan Password tidak valid.'); window.location = 'index'</script>";	
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }
}
    
    /* End of file login.php */
