<?php 

  class Penyewa extends CI_Controller {

    public function __construct() {
      parent::__construct();
      if (!$this->session->userdata("id_member")) {
          $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
          redirect('/', 'refresh'); 
      }

      // Cek status langganan
      if ($this->session->userdata("status_langganan") !== 'aktif') {
        $this->session->set_flashdata('pesan_gagal', 'Langganan Anda tidak aktif.');
        redirect('/', 'refresh'); 
      
      }
      $this->load->model('Mpenyewa'); 
    }


    public function index() {

      $data['penyewa'] = $this->Mpenyewa->tampil();
            
      $this->load->view('header');
      $this->load->view('penyewa_tampil', $data);
      $this->load->view('footer');
    }

  }

?>