<?php

class Lab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lab');
	}

	/**
	 * Menampilkan data dan menampilkan layout
	 * @return void
	 */
	public function index(): void
	{
        $data['lab'] = $this->Lab->get_data();
        $this->load->view('Layouts/header', ['title' => 'Laboratorium']);
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/Lab/index', $data);
        $this->load->view('Layouts/footer');
    }

	/**
	 * @return void
	 */
	public function insert(): void
	{
        $this->Lab->insert([
			'nama_lab' => $this->input->post('id_lab'),
			'id_lab' => $this->input->post('nama_lab'),
		]);
        redirect('Admin/Lab/index');
    }

	/**
	 * @param int $id_lab
	 */
	public function edit(int $id_lab): void
	{
        $data['lab'] = $this->Lab->get_where(['id_lab' => $id_lab], 'lab')->first_row();
        $this->load->view('Layouts/header', ['title' => 'Laboratorium']);
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/Lab/edit', $data);
        $this->load->view('Layouts/footer');
    }

	/**
	 * @return void
	 */
	public function update(): void
	{
        $this->Lab->update(['id_lab' => $this->input->post('id_lab')], [
			'id_lab' => $this->input->post('id_lab'),
			'nama_lab' => $this->input->post('nama_lab'),
		]);
        redirect('Admin/Lab/index');
    }

	/**
	 * @param int $id_lab
	 */
	public function delete(int $id_lab): void
	{
		$this->Lab->delete(['id_lab' => $id_lab]);
		redirect('Admin/Lab/index');
	}
}
