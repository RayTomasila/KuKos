<?php
class Welcome extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Mslider');
    $this->load->model('Mmember'); 
  }

  public function index() {
    $inputan = $this->input->post();

    $this->form_validation->set_rules("nomor_telepon_member", "Nomor Telepon", "required");
    $this->form_validation->set_rules("password_member", "Password", "required");
    $this->form_validation->set_message("required", "%s wajib diisi");

    if ($this->form_validation->run() == TRUE) {
      $output = $this->Mmember->login($inputan);

      if ($output) {
        $this->session->set_userdata('logged_in', $output); 
        $this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
        redirect('/', 'refresh');

      } else {
        $this->session->set_flashdata('pesan_gagal', 'Nomor telepon atau password salah.');
        redirect('/', 'refresh');
      }
    }

    $data['slider'] = $this->Mslider->tampil();
    $this->load->view('header');
    $this->load->view('welcome', $data);
    $this->load->view('footer');
  }
}
?>
