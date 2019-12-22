<?php
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class Produk extends CI_Controller {
    
        use REST_Controller {
            REST_Controller::__construct as private __resTraitConstruct;
        }
    
        function __construct()
        {
            // Construct the parent class
            parent::__construct();
            $this->__resTraitConstruct();
            $this->load->model('api/produk_model', 'produk');
    
        }
        
        public function index_get()
        {
            $id = $this->get('id_produk');
            if ($id === null) {
                $produk = $this->produk->getProduk();
            } else {
                $produk = $this->produk->getProduk($id);
            }

            if ($produk) {
                $this->response([
                    'status' => "true", 
                    'data' => $produk
                ], 200);
            } else {
                $this->response([
                    'status' => "false", 
                    'massage' => 'id not found'
                ], 404);
            }
        }

        public function index_delete()
        {
            $id = $this -> delete('id_produk');
            if ($id === null) {
                $this->response([
                    'status' => "false",
                    'massage' => 'provide an id!'
                ], 404);
            } else {
                if ($this->produk->deleteProduk($id)>0) {
                    $this->response([
                        'status' => true,
                        'id' => $id,
                        'massage' => 'Deleted'
                    ], 200);
                } else {
                    $this->response([
                        'status' => false,
                        'massage' => 'id not found'
                    ], 400);
                }
            }
        }
        public function index_post()
        {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok')
            ];
            if ($this->produk->createProduk($data) > 0) {
                $this->response([
                    'status' => true,
                    'massage' => 'New produk has been added'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'massage' => 'Failed'
                ], 400);
            }
        }
        public function index_put()
        {
            $id = $this->put('id_produk');
            $data = [
                'id_produk' => $this->put('id_produk'),
                'nama_produk' => $this->put('nama_produk'),
                'deskripsi' => $this->put('deskripsi'),
                'kategori' => $this->put('kategori'),
                'harga' => $this->put('harga'),
                'stok' => $this->put('stok'),
            ];
            if ($this->produk->updateProduk($data, $id)) {
                $this->response([
                    'status' => true,
                    'massage' => 'produk has been updated'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'massage' => 'Failed'
                ], 400);
            }
        }
    
    }
    
    /* End of file produk.php */
    
?>