<?php 


class Dashboard extends CI_Controller {

    public function index(): void
    {
		$this->load->view('Admin/layouts/header', ['title' => 'Dashboard']);
		$this->load->view('Admin/layouts/navbar');
		$this->load->view('Admin/layouts/sidebar');
		$this->load->view('Admin/Dashboard/dashboard');
		$this->load->view('Admin/layouts/footer');
    }
}
