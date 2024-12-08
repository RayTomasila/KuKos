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
  }
?>
