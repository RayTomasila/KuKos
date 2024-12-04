<?php
    class Mmember extends CI_Model {
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

        function Jumlah_member_distrik() {;
            $query = $this->db->query("SELECT COUNT(*) AS jumlah, nama_distrik_member FROM member GROUP BY nama_distrik_member;");
            $data  = $query->result_array();
            
            return $data;
        }

        function login($inputan) {
          $nomor_telepon_member = $this->db->escape_str($inputan['nomor_telepon_member']);
          $password_member = sha1($this->db->escape_str($inputan['password_member']));
      
          $this->db->where('nomor_telepon_member', $nomor_telepon_member);
          $this->db->where('password_member', $password_member);
          $query = $this->db->get('member');
      
          if ($query->num_rows() > 0) {
              $cekmember = $query->row_array();
      
              $this->session->set_userdata("id_member", $cekmember["id_member"]);
              $this->session->set_userdata("nomor_telepon_member", $cekmember["nomor_telepon_member"]);
              $this->session->set_userdata("nama_lengkap_member", $cekmember["nama_lengkap_member"]);
              $this->session->set_userdata("alamat_member", $cekmember["alamat_member"]);
              $this->session->set_userdata("kode_distrik_member", $cekmember["kode_distrik_member"]);
              $this->session->set_userdata("nama_distrik_member", $cekmember["nama_distrik_member"]);
      
              return $cekmember; 
          } else {
              return false;
          }
      }

				function ubah($inputan, $id_member) {

					if (!empty($inputan["password_member"])) {
						$inputan['password_member'] = sha1($inputan['password_member']);
					} else {
						unset($inputan['password_member']);
					}

					$this->db->where('id_member', $id_member);
					$this->db->update('member', $inputan);

					$this->db->where('id_member', $id_member);
					$q = $this->db->get('member');
					$cekmember = $q->row_array();
					
					$this->session->set_userdata("id_member", $cekmember["id_member"]);
					$this->session->set_userdata("nomor_telepon_member", $cekmember["nomor_telepon_member"]);
					$this->session->set_userdata("nama_lengkap_member", $cekmember["nama_lengkap_member"]);
					$this->session->set_userdata("alamat_member", $cekmember["alamat_member"]);
					$this->session->set_userdata("kode_distrik_member", $cekmember["kode_distrik_member"]);
					$this->session->set_userdata("nama_distrik_member", $cekmember["nama_distrik_member"]);
				}


				function register($m) {
					$this->db->insert('member', $m);
				}

    }

?>