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
      $this->load->library('form_validation');
      $this->load->helper('custom');
    }

    public function index() {      
      $data['penyewa'] = $this->Mpenyewa->tampil();
            
      $this->load->view('header');
      $this->load->view('penyewa_tampil', $data);
      $this->load->view('footer');
    }

    public function detail($id_penyewa) {
      $data['penyewa'] = $this->Mpenyewa->detail($id_penyewa);
  
      $inputan = $this->input->post();
  
      if ($inputan) {
          if (!empty($_FILES['foto_ktp']['name'])) {
              $config['upload_path'] = $this->config->item("assets_penyewa");
              $config['allowed_types'] = 'jpg|jpeg|png';
              $this->load->library('upload', $config);
  
              if ($this->upload->do_upload('foto_ktp')) {
                  $upload_data = $this->upload->data();
                  $inputan['foto_ktp'] = $upload_data['file_name'];
              } else {
                  $this->session->set_flashdata('pesan_gagal', 'Upload foto KTP gagal.');
                  redirect('penyewa/detail/' . $id_penyewa, 'refresh');
              }
          }
  
          $this->Mpenyewa->ubah($inputan, $id_penyewa);
          $this->session->set_flashdata('pesan_sukses', 'Penyewa berhasil diubah!');
          redirect('penyewa/detail/' . $id_penyewa, 'refresh');
      }
  
      $this->load->view('header');
      $this->load->view('penyewa_detail', $data);
      $this->load->view('footer');
    }
  

    public function tambah() {
      $this->form_validation->set_rules('nama_penyewa', 'Nama Penyewa', 'required', [
        'required' => 'Nama Penyewa Wajib Diisi.'
      ]);
      $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', [
        'required' => 'Nomor Telepon Wajib Diisi.'
      ]);
    
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('penyewa_tambah');
        $this->load->view('footer');
        } else {
          $inputan = $this->input->post();
      
          $config['upload_path'] = $this->config->item("assets_penyewa");
          $config['allowed_types'] = 'jpeg|jpg|png';
          $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('foto_ktp')) {        
          $data['error_upload'] = 'Foto Harus JPG, JPEG, Atau PNG';          
        
          $this->load->view('header');
          $this->load->view('penyewa_tambah', $data);
          $this->load->view('footer');
          return;
        }
    
        $upload_data = $this->upload->data();
        $inputan['foto_ktp'] = $upload_data['file_name'];
    
        $this->Mpenyewa->tambah($inputan);
        $this->session->set_flashdata('pesan_sukses', 'Penyewa berhasil ditambahkan.');
        redirect('penyewa', 'refresh');
      }
    }
    

    public function hapus($id_penyewa) {
      $this->Mpenyewa->hapus($id_penyewa);
      
      $this->session->set_flashdata('pesan_sukses', 'Penyewa Berhasil dihapus');
      redirect('penyewa', 'refresh');
    }

  }

?>