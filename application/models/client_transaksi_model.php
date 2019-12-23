<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class client_transaksi_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/warung/api/'
        ]);
    }
    public function getAllTransaksi()
    {
        $respone = $this->_client->request('GET', 'transaksi', [
            'query' => [
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getAllJoin()
    {
        $respone = $this->_client->request('GET', 'transaksi/join', [
            'query' => [
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getIDTransaksi($id)
    {
        $respone = $this->_client->request('GET', 'transaksi', [
            'query' => [
                'api' => 'pesenkopi',
                'id_user' => $id
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }

    public function deleteIdTransaksi($id)
    {
        $respone = $this->_client->request('DELETE', 'transaksi', [
            'form_params' => [
                'id_transaksi' => $id,
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }

    public function getJoinIDTransaksi($id)
    {
        $respone = $this->_client->request('GET', 'transaksi/join', [
            'query' => [
                'api' => 'pesenkopi',
                'id_user' => $id
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }
    public function insertTransaksi($s)
    {
        $data = [
            'id_user' => $s['id_user'],
            'id_produk' => $s['id_produk'],
            'qty' => $s['qty'],
            'total_harga' => $s['harga'],
            'api' => 'pesenkopi'
        ];
        $respone = $this->_client->request('POST', 'transaksi', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }
}
    
    /* End of file client_transaksi_model.php */
