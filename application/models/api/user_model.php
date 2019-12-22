<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class user_model extends CI_Model {
    
        public function login($username, $password)
        {
            $this->db->select('username, password, level');
            $this->db->from('login');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->limit(1);
            
            $query = $this->db->get();
            if ($query->num_rows()==1) {
                return $query->result();
            } else {
                return false;
            }
        }
        public function register($data)
        {
            $this->db->insert('user', $data);
            return $this->db->affected_rows();
        }
        public function updateUser($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            return true;
        }
    
    }
    
    /* End of file user_model.php */
    
?>