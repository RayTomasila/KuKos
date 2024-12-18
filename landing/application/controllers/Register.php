<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mongkir');
    $this->load->model('Mmember');
  }

  public function index()
  {
    $data["distrik"] = $this->Mongkir->tampil_distrik();

    // Validation rules
    $this->form_validation->set_rules(
      "nomor_telepon_member",
      "Nomor Telepon",
      "required|is_unique[member.nomor_telepon_member]|numeric|max_length[15]"
    );

    $this->form_validation->set_rules("nama_lengkap_member", "Nama Lengkap", "required");
    $this->form_validation->set_rules(
      "password_member",
      "Password Member",
      "required|min_length[8]|callback_validate_password"
    );

    // Custom error messages
    $this->form_validation->set_message("required", "%s wajib diisi");
    $this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan");
    $this->form_validation->set_message("numeric", "%s harus berupa angka");
    $this->form_validation->set_message("max_length", "%s maksimal 15 digit");
    $this->form_validation->set_message("min_length", "%s minimal 8 karakter");
    $this->form_validation->set_message("distrik", "%s minimal 8 karakter");

    if ($this->form_validation->run() == TRUE) {
      $city_id = $this->input->post("city_id");
      $detail = $this->Mongkir->detail_distrik($city_id);

      $m['nomor_telepon_member'] = $this->input->post("nomor_telepon_member");
      $m['nama_lengkap_member'] = $this->input->post("nama_lengkap_member");
      $m['password_member'] = sha1($this->input->post("password_member"));
      $m['alamat_member'] = $this->input->post("alamat_member");
      $m['kode_distrik_member'] = $this->input->post("city_id");
      $m['nama_distrik_member'] = $detail['type'] . " " . $detail["city_name"] . " " . $detail["province"];

      $this->Mmember->register($m);
      $this->session->set_flashdata('pesan_sukses', 'Registrasi Berhasil, Silahkan login.');

      redirect('/', 'refresh');
    }

    $this->load->view('header');
    $this->load->view('register', $data);
    $this->load->view('footer');
  }

  // Callback function to validate password
  public function validate_password($password)
  {
    if (preg_match('/[A-Za-z]/', $password) && preg_match('/[0-9]/', $password)) {
      return TRUE;
    } else {
      $this->form_validation->set_message(
        'validate_password',
        'Password harus mengandung minimal 6 huruf dan satu angka.'
      );
      return FALSE;
    }
  }
}
