<?php
class Fasilitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mfasilitas');
        $this->load->library('form_validation');
    }

    public function index() {
        $id_member = $this->session->userdata('id_member'); 
        $data['fasilitas'] = $this->Mfasilitas->tampil($id_member);

        $this->load->view('header');
        $this->load->view('fasilitas_tampil', $data);
        $this->load->view('footer');
    }

    public function tambah() {
      $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasiltias', 'required', [
        'required' => 'Nama Fasiltias Wajib Diisi.'
      ]);

      
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('fasilitas_tambah');
        $this->load->view('footer');

        } else {
        $inputan = $this->input->post();
    
        $config['upload_path'] = $this->config->item("assets_fasilitas");
        $config['allowed_types'] = 'jpeg|jpg|png';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_fasilitas')) {
          $data['error_upload'] = 'Foto Harus JPG, JPEG, Atau PNG';          
        
          $this->load->view('header');
          $this->load->view('fasilitas_tambah', $data);
          $this->load->view('footer');
          return;
        }

        $upload_data = $this->upload->data();
        $inputan['foto_fasilitas'] = $upload_data['file_name'];

        $this->Mfasilitas->tambah($inputan);
        $this->session->set_flashdata('pesan_sukses', 'Fasilitas berhasil ditambahkan.');
        redirect('fasilitas', 'refresh');
      }
    }

    public function detail($id_fasilitas) {
      $data['fasilitas'] = $this->Mfasilitas->detail($id_fasilitas); 
      $inputan = $this->input->post();
      
      if ($inputan) {
        if ($_FILES['foto_fasilitas']['name']) {
          $config['upload_path'] = $this->config->item("assets_fasilitas");
          $config['allowed_types'] = 'jpg|jpeg|png';
          $this->load->library('upload', $config);
    
          if ($this->upload->do_upload('foto_fasilitas')) {
            $upload_data = $this->upload->data();
            $inputan['foto_fasilitas'] = $upload_data['file_name'];
          }
        }
        
        $this->Mfasilitas->ubah($inputan, $id_fasilitas);
        $this->session->set_flashdata('pesan_sukses', 'Fasilitas Berhasil Diubah!');
        redirect('fasilitas/detail/' . $id_fasilitas, 'refresh');
      }
    
      $this->load->view('header');
      $this->load->view('fasilitas_detail', $data);
      $this->load->view('footer');
    }
    
    public function hapus($id_fasilitas) {
      $this->Mfasilitas->hapus($id_fasilitas);
      
      $this->session->set_flashdata('pesan_sukses', 'Fasilitas Berhasil dihapus');
      redirect('fasilitas', 'refresh');
    }
}
