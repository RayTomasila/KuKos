<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Mkamar extends CI_Model {
    
    public function tampil($id_member) {
        
      $this->db->where('kamar.id_member', $id_member);
      $q = $this->db->get('kamar');

      return $q->result_array();
    }
  }
?>
