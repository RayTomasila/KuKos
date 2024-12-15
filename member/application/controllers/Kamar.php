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
    public function tambah() {
        if ($this->session->userdata("status_langganan") !== 'aktif') {
            $this->session->set_flashdata('pesan_gagal', 'Langganan Anda tidak aktif.');
            redirect('kamar', 'refresh');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required');
        $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'required');
        $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            $id_member = $this->session->userdata('id_member');
            $data['fasilitas'] = $this->Mkamar->get_fasilitas_by_member($id_member); // Ambil fasilitas
            $this->load->view('header');
            $this->load->view('kamar_tambah', $data);
            $this->load->view('footer');
        } else {
            // Konfigurasi upload gambar
            $config['upload_path'] = './uploads/kamar/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('foto_kamar')) {
                $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
                redirect('kamar/tambah', 'refresh');
            } else {
                $upload_data = $this->upload->data();
                $foto_kamar = $upload_data['file_name'];
    
                $data = [
                    'nomor_kamar' => $this->input->post('nomor_kamar'),
                    'status_kamar' => $this->input->post('status_kamar'),
                    'harga_kamar' => $this->input->post('harga_kamar'),
                    'foto_kamar' => $foto_kamar,
                    'id_fasilitas' => implode(',', $this->input->post('id_fasilitas')), // Simpan fasilitas terpilih
                    'id_member' => $this->session->userdata('id_member'),
                ];
    
                $this->Mkamar->tambah_kamar($data);
                $this->session->set_flashdata('pesan_sukses', 'Kamar berhasil ditambahkan.');
                redirect('kamar', 'refresh');
            }
        }
    }
    
  public function ubah($id_kamar) {
    if ($this->session->userdata("status_langganan") !== 'aktif') {
        $this->session->set_flashdata('pesan_gagal', 'Langganan Anda tidak aktif.');
        redirect('kamar', 'refresh');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('nomor_kamar', 'Nomor Kamar', 'required');
    $this->form_validation->set_rules('status_kamar', 'Status Kamar', 'required');
    $this->form_validation->set_rules('harga_kamar', 'Harga Kamar', 'required|numeric');
    $this->form_validation->set_rules('id_fasilitas', 'ID Fasilitas', 'required');

    // Ambil data kamar berdasarkan ID
    $data['kamar'] = $this->Mkamar->get_kamar_by_id($id_kamar);

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('header');
        $this->load->view('kamar_ubah', $data);
        $this->load->view('footer');
    } else {
        $config['upload_path'] = './uploads/kamar/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        $foto_kamar = $data['kamar']->foto_kamar; // Default foto lama
        if ($_FILES['foto_kamar']['name']) { // Jika ada upload baru
            if ($this->upload->do_upload('foto_kamar')) {
                // Hapus foto lama
                if ($foto_kamar && file_exists('./uploads/kamar/' . $foto_kamar)) {
                    unlink('./uploads/kamar/' . $foto_kamar);
                }
                $foto_kamar = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
                redirect('kamar/ubah/' . $id_kamar, 'refresh');
            }
        }

        $data_update = [
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'status_kamar' => $this->input->post('status_kamar'),
            'harga_kamar' => $this->input->post('harga_kamar'),
            'foto_kamar' => $foto_kamar,
            'id_fasilitas' => $this->input->post('id_fasilitas'),
        ];

        $this->Mkamar->update_kamar($id_kamar, $data_update);
        $this->session->set_flashdata('pesan_sukses', 'Kamar berhasil diperbarui.');
        redirect('kamar', 'refresh');
    }
}

  
}
?>
