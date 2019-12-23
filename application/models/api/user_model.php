<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

    public function register($data)
    {
        $this->db->insert('login', $data);
        return $this->db->affected_rows();
    }
}
    
    /* End of file user_model.php */
