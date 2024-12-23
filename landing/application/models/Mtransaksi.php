<?php

class Mtransaksi extends CI_Model {

  public function get_langganan_id_by_member($id_member) {
    $this->db->select('id_langganan');
    $this->db->from('transaksi');
    $this->db->where('id_member', $id_member);
    $query = $this->db->get();
    
    // Check if there is any record
    if ($query->num_rows() > 0) {
        return $query->row()->id_langganan;
    }
    
    return null; // Return null if no record found
}


    public function insert_transaction($data) {
        $this->db->insert('transaksi', $data);
    }

    public function get_transaction_by_order_id($order_id) {
        $this->db->where('kode_transaksi', $order_id);
        $query = $this->db->get('transaksi');
        return $query->row();
    }

    public function update_transaction_status($order_id, $status) {
        $this->db->where('kode_transaksi', $order_id);
        $this->db->update('transaksi', array('status_transaksi' => $status));
    }
}
