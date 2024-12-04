<?php 

    class Mslider extends CI_Model {

      public function tampil() {
          $query = $this->db->get('slider');
          $database = $query->result_array();
          
          return $database;
      }

    }

?>