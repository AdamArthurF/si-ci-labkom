<?php

class Home extends CI_Controller {

    /**
     * @return void
     */
    public function index(): void
    {
        $this->load->view('User/layouts/header');
        $this->load->view('User/layouts/navbar');
        $this->load->view('User/layouts/cover');
        $this->load->view('User/layouts/footer');
    }

    /**
     * @return void
     */
    public function services(): void
    {
        $this->load->view('User/layouts/header');
        $this->load->view('User/layouts/navbar');
        $this->load->view('User/Services/services');
        $this->load->view('User/layouts/footer');
    }

    /**
     * @return void
     */
    protected function contact(): void
    {

        $this->load->view('User/layouts/header');
        $this->load->view('User/layouts/navbar');
        $this->load->view('User/Kontak/kontak');
        $this->load->view('User/layouts/footer');
    }

    /**
     * @return void
     */
    public function about(): void
    {
        $this->load->view('User/layouts/header');
        $this->load->view('User/layouts/navbar');
        $this->load->view('User/Tentang/tentang');
        $this->load->view('User/layouts/footer');
    }
}
