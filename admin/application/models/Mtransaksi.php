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

        function transaksi_member_jual($id_member){
            $this->db->where('id_member_jual', $id_member);

            $q = $this->db->get('transaksi');
            $d = $q ->result_array();

            return $d;
        }

        function transaksi_member_beli($id_member){
            $this->db->where('id_member_beli', $id_member);

            $q = $this->db->get('transaksi');
            $d = $q ->result_array();
            return $d;
        }
        
        function detail($id_transaksi) {
            $this->db->where('id_transaksi', $id_transaksi);

            $q = $this->db->get('transaksi');
            $d = $q->row_array();
    
            return $d;
        }
    
        function transaksi_detail($id_transaksi) {
            $this->db->where('id_transaksi', $id_transaksi);
            
            $q = $this->db->get('transaksi_detail');
            $d = $q->result_array();
    
            return $d;
        }

    }
?>