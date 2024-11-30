<?php

	class Logout extends CI_Controller {

		public function index()
		{
			$this->session->unset_userdata("id_member");
			$this->session->unset_userdata("nomor_telepon_member");
			$this->session->unset_userdata("nama_lengkap_member");
			$this->session->unset_userdata("alamat_member");
			$this->session->unset_userdata("kode_distrik_member");
			$this->session->unset_userdata("nama_distrik_member");

			redirect('login');
		}

	}
?>