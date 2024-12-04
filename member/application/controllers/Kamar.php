<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata("id_member")) {
        $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
        redirect('/', 'refresh'); 
    }

    if ($this->session->userdata("status_langganan") !== 'aktif') {
      $this->session->set_flashdata('pesan_gagal', 'Langganan Anda tidak aktif.');
      redirect('/', 'refresh'); 
    
    }
    $this->load->model('Mpenyewa'); 
    $this->load->model('Mmember'); 
    $this->load->model('Mkamar');
  }

    public function index() {
      $id_member = $this->session->userdata("id_member");

      $data['kamar'] = $this->Mkamar->tampil($id_member);

      $this->load->view('header');
      $this->load->view('kamar_tampil', $data);
      $this->load->view('footer');
    }
}
?>
