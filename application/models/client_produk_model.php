<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class client_produk_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/warung/api/'
        ]);
    }

    public function getAllProduk()
    {
        $respone = $this->_client->request('GET', 'produk', [
            'query' => [
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getbyidProduk($id)
    {
        $respone = $this->_client->request('GET', 'produk', [
            'query' => [
                'id_produk' => $id,
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'][0];
    }
    public function deleteById($id)
    {
        $respone = $this->_client->request('DELETE', 'produk', [
            'form_params' => [
                'id_produk' => $id,
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function addNewProduk()
    {

        // Upload image
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 3000; // 3 mb
        $config['file_name']            = $_FILES['userfile']['name'];

        $this->load->library('upload', $config);

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);

        $file_gambar = "";

        if ($this->upload->do_upload('userfile')) {
            $file_gambar = $this->upload->data('file_name');
        }

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'gambar' => $file_gambar,
            'api' => 'pesenkopi'
        ];



        $respone = $this->_client->request('POST', 'produk', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function ubahProduk()
    {
        $data = [
            'id_produk' => $this->input->post('id_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'api' => 'pesenkopi'
        ];
        $respone = $this->_client->request('PUT', 'produk', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function inputPesanan($ko)
    {
        $data = [
            'id_user' => $ko['id_user'],
            'id_produk' => $ko['id_produk'],
            'total_harga' => $ko['total_harga'],
            'qty' => $ko['qty'],
            'api' => 'pesenkopi'
        ];
        $respone = $this->_client->request('POST', 'transaksi', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file welcome_model.php */
