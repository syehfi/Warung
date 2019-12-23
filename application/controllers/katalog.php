<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_produk_model', 'produk');
        $this->load->model('client_transaksi_model', 'trans');
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

    public function detail($id)
    {
        if ($this->session->userdata('level') != "user") {
            redirect('login/index', 'refresh');
        }
        $data['produk'] = $this->produk->getbyidProduk($id);
        $this->load->view('./template/header_home');
        $this->load->view('./home/detail', $data);
    }

    public function addCart($id)
    {

        // ambil total dari id produk
        $dataProduk = $this->db->get_where('produk', array('id_produk' => $id))->row();
        $getQty = $this->input->post('qty');
        $this->cart->product_name_rules = '[:print:]';

        $data = array(
            'id'      => $id,
            'qty'     => $getQty,
            'price'   => $dataProduk->harga * $getQty,
            'name'    => "$dataProduk->nama_produk", // $dataProduk->nama_produk
        );

        $this->cart->insert($data);

        redirect('katalog/checkout');
    }

    function checkout()
    {
        $this->load->view('./template/header_home');
        $this->load->view('home/checkout');
    }
    public function pesan_proses()
    {
        foreach ($this->cart->contents() as $key) {
            $data = [
                'id_user' => $this->session->userdata('id'),
                'id_produk' => $key['id'],
                'harga' => $key['price'],
                'qty' => $key['qty']
            ];
            $this->trans->insertTransaksi($data);
            redirect('home/index');
            
        }
    }

    public function deletCart($id)
    {
        $data = array(
            'rowid'   => $id,
            'qty'     => 0
        );
        $this->cart->update($data);
        redirect('home', 'refresh');
    }
}
    
    /* End of file Katalog.php */
