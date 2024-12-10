<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Mkamar extends CI_Model {
    
    public function get_kamar($id_kamar) {
      $this->db->where('id_kamar', $id_kamar);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->get('kamar')->row_array();
  }  

    public function tampil($id_member) {
        
      $this->db->where('kamar.id_member', $id_member);
      $q = $this->db->get('kamar');

      return $q->result_array();
    }
    public function tambah_kamar($data) {
      return $this->db->insert('kamar', $data);
  }
  public function get_kamar_by_id($id_kamar) {
    return $this->db->get_where('kamar', ['id_kamar' => $id_kamar])->row();
}

public function update_kamar($id_kamar, $data) {
    $this->db->where('id_kamar', $id_kamar);
    return $this->db->update('kamar', $data);
}

  
  }
?>
