<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{

    public function getTrans($id = null)
    {
        if ($id === null) {
            return $this->db->get('transaksi')->result_array();
        } else {
            return $this->db->get_where('transaksi', ['id_user' => $id])->result_array();
        }
    }
    public function insertTrans($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->affected_rows();
    }
    public function updateTrans($data, $id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
        return true;
    }
    public function deleteTrans($data)
    {
        $this->db->delete('transaksi', ['id_transaksi' => $data]);
        return $this->db->affected_rows();
    }
    public function selectJoin($id = null)
    {
        $this->db->select('transaksi.id_transaksi, login.username, produk.nama_produk, transaksi.Qty, transaksi.total_harga');
        $this->db->from('transaksi');
        $this->db->join('login', 'transaksi.id_user=login.id_user');
        $this->db->join('produk', 'transaksi.id_produk=produk.id_produk');
        // $this->db->where('tbl_usercategory', 'admin');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }
}
    
    /* End of file transaksi_model.php */
