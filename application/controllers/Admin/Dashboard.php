<?php 


class Dashboard extends CI_Controller {

    public function index(){
		$this->load->view('Layouts/header', ['title' => 'Dashboard']);
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/sidebar');
		$this->load->view('Dashboard/dashboard');
		$this->load->view('Layouts/footer');
    }
}
