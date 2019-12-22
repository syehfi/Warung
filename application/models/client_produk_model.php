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

    public function _uploadImage(){
        $config['upload_path']          = './assets/product';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
    public function _deleteImage($id){
        $produk = $this->getbyidProduk($id);
        var_dump($produk['image']);
        if ($produk['image'] != "default.jpg") {
            $filename = explode(".", $produk['image'])[0];
            return array_map('unlink', glob(FCPATH . "assets/product/$filename.*"));
        }
    }

    public function getAllProduk()
    {
        $respose = $this->_client->request('GET', 'produk', [
            'query' => [
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respose->getBody()->getContents(), true);
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
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
            'kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'image' => $this->_uploadImage(),
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
            'image' => $this->_uploadImage(),
            'api' => 'pesenkopi'
        ];
        $respone = $this->_client->request('PUT', 'produk', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file welcome_model.php */
