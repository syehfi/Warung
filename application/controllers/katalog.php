<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Katalog extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('client_produk_model', 'produk');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->library('cart');
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
        
        public function addCart($id){
            
            // abil total dari id produk
            $dataProduk = $this->db->get_where('produk', array('id_produk' => $id))->row();
            $getStok = $this->input->post('stok');
            // $data = array(
            //     'id'      => $id,
            //     'qty'     => $getStok,
            //     'price'   => $dataProduk->harga * $getStok,
            //     'name'    => $getProduk->nama_produk,
            //     'option'  =>  array('Size' => 'L', 'Color' => 'Red')
            // );

            $data = array(
                'id'      => $id,
                'qty'     => $getStok,
                'price'   => $dataProduk->harga * $getStok,
                'name'    => "Hello", // $dataProduk->nama_produk
                // 'options' => array('Size' => 'L', 'Color' => 'Red')
            );

            $this->cart->insert($data); 
            
            redirect('katalog/detail/'.$id);   
        }

        function viewCheckout() {

            $this->load->view('./template/header_home');
            $this->load->view('home/checkout');    
        }

    
    }
    
    /* End of file Katalog.php */
    
?>