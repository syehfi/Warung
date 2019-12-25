<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getUser($id = null)
    {
        if ($id == null) {
            return $this->db->get('login')->result_array();
        } else {
            return $this->db->get_where('login', ['id_user' => $id])->result_array();
        }
    }

    public function updateUser($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('login', $data);
        return true;
    }

    public function deleteUser($id)
    {
        $this->db->delete('login', ['id_user' => $id]);
        return $this->db->affected_rows();  
    }

    public function register($data)
    {
        $this->db->insert('login', $data);
        return $this->db->affected_rows();
    }
}
    
    /* End of file user_model.php */
