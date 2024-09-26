<?php

	class Welcome extends CI_Controller {

		public function index()
		{
			$inputan = $this->input->post();

			$this->form_validation->set_rules("email_member","Email","required");
			$this->form_validation->set_rules("password_member","Password","required");

			$this->form_validation->set_message("required","%s Wajib Diisi");

			if ($this->form_validation->run()==TRUE) {
					$this->load->model('Mmember');
					
					$output = $this->Mmember->login($inputan);

				if ($output=="ada") {
					$this->session->set_flashdata('pesan_sukses','Berhasil Login');
					redirect('home','refresh');

				} else {
					$this->session->set_flashdata('pesan_gagal','Gagal Login');
					redirect('/','refresh');
				}
			}


			$this->load->view('header');
			$this->load->view('welcome');
			$this->load->view('footer');
		}
	}
?>