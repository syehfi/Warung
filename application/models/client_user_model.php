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
}
    
    /* End of file welcome_model.php */
