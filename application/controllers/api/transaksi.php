<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class transaksi extends CI_Controller
{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('api/transaksi_model', 'trans');
    }
    public function index_get()
    {
        $id = $this->get('id_user');
        if ($id == null) {
            $produk = $this->trans->getTrans();
        } else {
            $produk = $this->trans->getTrans($id);
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
    public function index_post()
    {
        $data = [
            'id_user' => $this->post('id_user'),
            'id_produk' => $this->post('id_produk'),
            'qty' => $this->post('qty'),
            'total_harga' => $this->post('total_harga')
        ];
        $produk = $this->trans->insertTrans($data);
        if ($produk) {
            $this->response([
                'status' => "true",
                'data' => "Inserted"
            ], 200);
        } else {
            $this->response([
                'status' => "false",
                'massage' => 'id not found'
            ], 404);
        }
    }
    public function index_put()
    {
        $id = $this->put('id_transaksi');
        $data = [
            'id_transaksi' => $this->put('id_transaksi'),
            'id_user' => $this->put('id_user'),
            'id_produk' => $this->put('id_produk'),
            'qty' => $this->put('qty'),
            'total_harga' => $this->put('total_harga')
        ];
        $produk = $this->trans->updateTrans($data, $id);
        if ($produk) {
            $this->response([
                'status' => "true",
                'data' => "edited"
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
        $id = $this->delete('id_transaksi');
        if ($id === null) {
            $this->response([
                'status' => "false",
                'massage' => 'provide an id!'
            ], 404);
        } else {
            if ($this->trans->deleteTrans($id) > 0) {
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
    public function join_get()
    {
        $id = $this->get('id_user');
        if ($id == null) {
            $produk = $this->trans->selectJoin();
        } else {
            $produk = $this->trans->selectJoin($id);
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
}
    
    /* End of file transaksi.php */
