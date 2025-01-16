<?php
  class Mkontrak extends CI_Model {

    function tampil() {
      $this->db->select('penyewa.*, kontrak.*, kamar.*');
      $this->db->from('penyewa');
      $this->db->join('kontrak', 'penyewa.id_penyewa = kontrak.id_penyewa', 'left');
      $this->db->join('kamar', 'kontrak.id_kamar = kamar.id_kamar', 'left');
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));

      $this->db->order_by('kontrak.id_kontrak', 'desc'); 

      $query = $this->db->get();
      return $query->result_array();
    }
  
    function detail($id_kontrak) {
      $this->db->select('kontrak.*, penyewa.nama_penyewa, kamar.nomor_kamar, kamar.harga_kamar');
      $this->db->from('kontrak');
      $this->db->join('penyewa', 'penyewa.id_penyewa = kontrak.id_penyewa');
      $this->db->join('kamar', 'kamar.id_kamar = kontrak.id_kamar');
      $this->db->where('kontrak.id_kontrak', $id_kontrak);
      $this->db->where('kontrak.id_member', $this->session->userdata("id_member"));

      $query = $this->db->get();
      return $query->row_array(); 
    }

    function tambah($inputan) {
      $inputan['id_member'] = $this->session->userdata("id_member");
  
      $this->db->where('id_kamar', $inputan['id_kamar']);
      $query = $this->db->get('kamar');
      $kamar = $query->row();
  
      $tanggal_mulai = new DateTime($inputan['tanggal_mulai']);
      $tanggal_selesai = new DateTime($inputan['tanggal_selesai']);
      $interval = $tanggal_mulai->diff($tanggal_selesai);
  
      $lama_kontrak = $interval->y * 12 + $interval->m + ($interval->d > 0 ? 1 : 0);
  
      $inputan['jumlah_pembayaran'] = $kamar->harga_kamar * $lama_kontrak;
  
      $this->db->insert('kontrak', $inputan);
  
      $this->db->set('status_kamar', 'digunakan');
      $this->db->where('id_kamar', $inputan['id_kamar']);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kamar');
    }
  

    function ubah($inputan, $id_kontrak) {
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));
  
      $kontrakLama = $this->db->get('kontrak')->row_array();
  
      if ($kontrakLama['id_kamar'] != $inputan['id_kamar']) {
          $this->db->set('status_kamar', 'siap huni');
          $this->db->where('id_kamar', $kontrakLama['id_kamar']);
          $this->db->where('id_member', $this->session->userdata("id_member"));
          $this->db->update('kamar');
      }
  
      $this->db->where('id_kamar', $inputan['id_kamar']);
      $query = $this->db->get('kamar');
      $kamar = $query->row();
  
      $tanggal_mulai = new DateTime($inputan['tanggal_mulai']);
      $tanggal_selesai = new DateTime($inputan['tanggal_selesai']);
      $lama_kontrak = $tanggal_mulai->diff($tanggal_selesai)->m;
  
      if ($lama_kontrak == 0) {
          $lama_kontrak = 1;  
      }
      $inputan['jumlah_pembayaran'] = $kamar->harga_kamar * $lama_kontrak;
  
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kontrak', $inputan);
  
      $this->db->set('status_kamar', 'digunakan');
      $this->db->where('id_kamar', $inputan['id_kamar']);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kamar');
    }
  
    function hapus($id_kontrak) {
      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));

      $kontrak = $this->db->get('kontrak')->row_array();

      $this->db->where('id_kontrak', $id_kontrak);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->delete('kontrak');

      $this->db->set('status_kamar', 'siap huni');
      $this->db->where('id_kamar', $kontrak['id_kamar']);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->update('kamar');
    }
  

    public function getEnumValues($table, $column) {
      $query = $this->db->query("SHOW COLUMNS FROM $table WHERE Field = '$column'");
      $row = $query->row();
      preg_match("/^enum\((.*)\)$/", $row->Type, $matches);
      $enumValues = str_getcsv($matches[1], ',', "'");
      return $enumValues;
    }


    function count_penyewa() {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->where('id_penyewa IS NOT NULL', null, false)->count_all_results('penyewa');
    }
  
    function count_kamar() {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->where('id_kamar IS NOT NULL', null, false)->count_all_results('kontrak');
    }

    function count_pembayaran_lunas_bulan_ini() {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('status_pembayaran', 'lunas');
      $this->db->where('MONTH(tanggal_mulai)', date('m'));
      $this->db->where('YEAR(tanggal_mulai)', date('Y'));
      return $this->db->count_all_results('kontrak');
    }

    function count_total_pembayaran_bulan_ini() {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('MONTH(tanggal_mulai)', date('m')); 
      $this->db->where('YEAR(tanggal_mulai)', date('Y'));  
      return $this->db->count_all_results('kontrak');
    }

    function count_pembayaran_belum_lunas_bulan_ini() {
      $this->db->where('id_member', $this->session->userdata("id_member"));
      $this->db->where('status_pembayaran', 'belum bayar'); 
      $this->db->where('MONTH(tanggal_mulai)', date('m'));
      $this->db->where('YEAR(tanggal_mulai)', date('Y'));
      return $this->db->count_all_results('kontrak');
    }
  

    function count_pembayaran_lunas_6_bulan_terakhir() {
      $result = [];
      $current_month = date('m');
      $current_year = date('Y');

      for ($i = 5; $i >= 0; $i--) { 
          $month = date('m', strtotime("-$i months", strtotime("$current_year-$current_month-01")));
          $year = date('Y', strtotime("-$i months", strtotime("$current_year-$current_month-01")));

          $this->db->where('id_member', $this->session->userdata("id_member"));
          $this->db->where('status_pembayaran', 'lunas');
          $this->db->where('MONTH(tanggal_mulai)', $month);
          $this->db->where('YEAR(tanggal_mulai)', $year);
          $result[] = $this->db->count_all_results('kontrak');
      }
      return $result;
    }


    public function count_pembayaran_6_bulan_terakhir() {
      $result = [];
      $current_month = date('m');
      $current_year = date('Y');
      

      for ($i = 5; $i >= 0; $i--) { 
          $month = date('m', strtotime("-$i months", strtotime("$current_year-$current_month-01")));
          $year = date('Y', strtotime("-$i months", strtotime("$current_year-$current_month-01")));

        
          $this->db->select('jumlah_pembayaran');
          $this->db->where('status_pembayaran', 'lunas');
          $this->db->where('MONTH(tanggal_mulai)', $month);
          $this->db->where('YEAR(tanggal_mulai)', $year);
          $this->db->where('id_member', $this->session->userdata("id_member"));
          $query = $this->db->get('kontrak');
          
          $result[] = $query->result_array();
      }

      return $result;
    }  
  
  }
?>