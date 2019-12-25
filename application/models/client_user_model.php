<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class client_user_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/warung/api/'
        ]);
    }

    public function getAllUser()
    {
        $respone = $this->_client->request('GET', 'user', [
            'query' => [
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getbyidUser($id)
    {
        $respone = $this->_client->request('GET', 'user', [
            'query' => [
                'id_user' => $id,
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'][0];
    }
    public function deleteById($id)
    {
        $respone = $this->_client->request('DELETE', 'user', [
            'form_params' => [
                'id_user' => $id,
                'api' => 'pesenkopi'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }

    public function addNewUser()
    {

        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'api' => 'pesenkopi'
        ];

        $respone = $this->_client->request('POST', 'user', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;

    }

    public function ubahUser()
    {
        $data = [
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
            'api' => 'pesenkopi'
        ];
        $respone = $this->_client->request('PUT', 'user', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file welcome_model.php */
