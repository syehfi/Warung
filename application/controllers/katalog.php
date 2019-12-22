<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Katalog extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('client_produk_model', 'produk');
            $this->load->library('form_validation');
            $this->load->library('session');
        }
        
    
        public function index()
        {
            $data['produk'] = $this->produk->getAllProduk();
            $this->load->view('./template/header_home', $data, FALSE);
            $this->load->view('home/katalog', $data);    
        }
        
        public function detail($id){
            $data['produk'] = $this->produk->getbyidProduk($id);
            $this->load->view('./template/header_home');
            $this->load->view('./home/detail', $data);
        }
    
    }
    
    /* End of file Katalog.php */
    
?>