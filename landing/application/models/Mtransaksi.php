<?php

class Mtransaksi extends CI_Model {

  public function cek_id_langganan_member($id_member) {
    $this->db->select('id_langganan');
    $this->db->from('transaksi');
    $this->db->where('id_member', $id_member);
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
        return $query->row()->id_langganan;
    }
    
    return null; 
  }

    public function tambah($data) {
        $this->db->insert('transaksi', $data);
    }

    public function id_order_transaksi($order_id) {
        $this->db->where('kode_transaksi', $order_id);
        $query = $this->db->get('transaksi');
        return $query->row();
    }

    public function update_status_transaksi($order_id, $status) {
        $this->db->where('kode_transaksi', $order_id);
        $this->db->update('transaksi', array('status_transaksi' => $status));
    }
}
