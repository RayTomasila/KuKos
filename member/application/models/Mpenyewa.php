<?php 
  class Mpenyewa extends CI_Model {

    private function queryTampilPenyewaJoin($id_penyewa = null) {
      $this->db->select('penyewa.*, kontrak.id_kamar, kamar.nomor_kamar, kamar.id_kamar, kontrak.tanggal_mulai, kontrak.status_pembayaran');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('penyewa.id_member', $this->session->userdata("id_member"));
  
      if ($id_penyewa !== null) {
        $this->db->where('penyewa.id_penyewa', $id_penyewa);
      }
  
      $query = $this->db->get();
      return $query->result_array();
    }

    public function tampil() {
      return $this->queryTampilPenyewaJoin(null);
    }
  
    public function detail($id_penyewa) {
      return $this->queryTampilPenyewaJoin($id_penyewa); 
    }
    
    function tambah($inputan) {
      $inputan['id_member'] = $this->session->userdata("id_member");
      $this->db->insert('penyewa', $inputan);
    }
  
    function ubah($inputan, $id_penyewa) {
      $inputan['id_member'] = $this->session->userdata("id_member"); 
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->where('id_member', $this->session->userdata("id_member")); 
      $this->db->update('penyewa', $inputan); 
    }
      
    function hapus($id_penyewa) {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->delete('penyewa');
    }

    public function get_penyewa($id_penyewa) {
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->get('penyewa')->row_array();
  }  

  }
?>