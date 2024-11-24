<?php

	class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mslider');
    }


		public function index()
		{

			$data['slider'] = $this->Mslider->tampil();

			$this->load->view('welcome', $data);
		}
	}
?>