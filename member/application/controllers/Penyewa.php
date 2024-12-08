<?php 

  class Penyewa extends CI_Controller {

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
      $data['penyewa'] = $this->Mpenyewa->tampil();
            
      $this->load->view('header');
      $this->load->view('penyewa_tampil', $data);
      $this->load->view('footer');
    }

    public function detail($id_penyewa) {
      $data['penyewa'] = $this->Mpenyewa->detail($id_penyewa);
      
      $data['kamar'] = $this->Mkamar->tampil($id_penyewa);

      $inputan = $this->input->post();

      if ($inputan) {
        $this->Mpenyewa->ubah($inputan, $id_penyewa);
        $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil Diubah!');
        redirect('penyewa/detail/' . $id_penyewa, 'refresh');
      }
      
      $this->load->view('header');
      $this->load->view('penyewa_detail', $data);
      $this->load->view('footer');
    }

    public function tambah() {

      $inputan = $this->input->post();

      if ($inputan) {
        $this->Mpenyewa->tambah($inputan);
        $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil Ditambah!');
        redirect('penyewa', 'refresh');     
      }

      $this->load->view('header');
      $this->load->view('penyewa_tambah');
      $this->load->view('footer');
  }

    public function hapus($id_penyewa) {
      $this->Mpenyewa->hapus($id_penyewa);
      
      $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil dihapus');
      redirect('penyewa', 'refresh');
    }

    public function get_penyewa($id_penyewa) {
      $this->db->where('id_penyewa', $id_penyewa);
      $this->db->where('id_member', $this->session->userdata("id_member"));
      return $this->db->get('penyewa')->row_array();
  }

  }

?>