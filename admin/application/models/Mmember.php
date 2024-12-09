<?php
    class Mmember extends CI_Model {
      function Jumlah_member_distrik() {;
          $query = $this->db->query(
            "SELECT COUNT(*) AS jumlah, nama_distrik_member 
            FROM member GROUP BY nama_distrik_member;");
          $data  = $query->result_array();
          
          return $data;
      }
      
        function tampil() {
            $q = $this->db->get('member');
            $d = $q->result_array();
            return $d;
        }
        
        function detail($id_member) {
            $this->db->where('id_member', $id_member);

            $q = $this->db->get('member');
            $d = $q->row_array();

            return $d;
        }

    }
?>

