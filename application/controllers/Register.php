<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Register extends CI_Controller {
    
        public function __construct()
	{
		parent::__construct();
		$this->load->model('client_user_model', 'user');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('./register/register');
    }
    
	public function tambahUser()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == false) {
            $this->load->view('./register/register');
            
		} else {
			$this->user->addNewUser();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('login/index');
		}
	}
}
    
    /* End of file Register.php */
    
?>