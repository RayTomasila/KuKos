<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

    class Register extends MY_Controller {
      public function __construct() {
          parent::__construct();
          $this->load->model('Mongkir');
          $this->load->model('Mmember');
      }


        public function index() {

            $data["distrik"] = $this->Mongkir->tampil_distrik();
            
            $this->form_validation->set_rules("nomor_telepon_member","Nomor Telepon Member","required|is_unique[member.nomor_telepon_member]");
            $this->form_validation->set_rules("nama_lengkap_member","Nama Lengkap Member","required");
            $this->form_validation->set_rules("alamat_member","Alamat Lengkap Member","required");
            $this->form_validation->set_rules("city_id","city id","required");

            $this->form_validation->set_message("required", "%s wajib diisi");
            $this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan");

            if ($this->form_validation->run() == TRUE) {

                $city_id = $this->input->post("city_id");
                $detail = $this->Mongkir->detail_distrik($city_id);

                

                $m['nomor_telepon_member'] = $this->input->post("nomor_telepon_member");
                $m['nama_lengkap_member'] = $this->input->post("nama_lengkap_member");
                $m['password_member'] = sha1($this->input->post("password_member")); 
                $m['alamat_member'] = $this->input->post("alamat_member");
                $m['kode_distrik_member'] = $this->input->post("city_id");
                $m['nama_distrik_member'] = $detail['type']." ".$detail["city_name"]." ".$detail["province"];

                $this->Mmember->register($m);
                $this->session->set_flashdata('pesan_sukses', 'Registrasi Berhasil, Silahkan login.');

                redirect('welcome', 'refresh');
            }

            $this->load->view('header');
            $this->load->view('register', $data);
            $this->load->view('footer');
            
        }
    }
        