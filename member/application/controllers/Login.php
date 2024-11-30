<?php
class Login extends CI_Controller {

  public function index() {
    $inputan = $this->input->post();

    $this->form_validation->set_rules("nomor_telepon_member", "Nomor Telepon", "required");
    $this->form_validation->set_rules("password_member", "Password", "required");

    $this->form_validation->set_message("required", "%s Wajib Diisi");

    if ($this->form_validation->run() == TRUE) {
        $this->load->model('Mmember');
        
        $member = $this->Mmember->login($inputan);

        if ($member) {
            if ($member['status_langganan'] === 'aktif') {

                $this->session->set_userdata([
                    'id_member' => $member['id_member'],
                    'nama_lengkap_member' => $member['nama_lengkap_member'],
                    'status_langganan' => $member['status_langganan']
                ]);

                $this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
                redirect('dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Status langganan Anda tidak aktif.');
            }
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Nomor telepon atau password salah.');
        }

        redirect('dashboard', 'refresh'); 
    }

    $this->load->view('header');
    $this->load->view('login');
    $this->load->view('footer');
  }
}
