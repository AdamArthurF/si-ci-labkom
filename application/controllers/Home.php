<?php

class Home extends CI_Controller {

    public function index(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Layouts/cover');
        $this->load->view('User/Layouts/footer');  
    }



    public function services(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Services/services');
        $this->load->view('User/Layouts/footer');  
    }

    public function contact(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Kontak/kontak');
        $this->load->view('User/Layouts/footer');  
    }

    public function about(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/Tentang/tentang');
        $this->load->view('User/Layouts/footer');  
    }
    

}
