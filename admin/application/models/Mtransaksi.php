<?php
  class Mtransaksi extends CI_Model {

    function tampil() {
      $this->db->select('langganan.status_langganan, member.nama_lengkap_member, transaksi.*');
      $this->db->from('langganan');
      $this->db->join('transaksi', 'langganan.id_langganan = transaksi.id_langganan', 'left');
      $this->db->join('member', 'transaksi.id_member = member.id_member', 'left');
      $query = $this->db->get();
      
      $d = $query ->result_array();

      return $d;
    }
  }
?>