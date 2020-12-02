<?php

class Alat extends CI_Controller {

	/**
	 * Alat constructor.
	 */
	public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination'); // Load libary pagination
        $this->load->model('Alat'); // Load the department_model
    }

	/**
	 * index untuk menampilkan data dan menampilkan layout
	 * @return void
	 */
	public function index(): void
	{
        // Konfigurasi pagination
        $config['base_url'] = site_url('Admin/Alat/index'); // site url
        $config['total_rows'] = $this->db->count_all('alat'); // total row
        $config['per_page'] = 5; // show record per halaman
        $config["uri_segment"] = 3; // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ?: 0;
 
        // Panggil function get_mahasiswa_list yang ada pada mmodel Alat.
        $data['data'] = $this->Alat->get_data($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('Layouts/header', ['title' => 'Alat']);
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/Alat/index', $data);
        $this->load->view('Layouts/footer');  
	}

	/**
	 * @return void
	 */
	public function insert(): void
	{
        $this->Alat->insert([
			'id_alat' => $this->input->post('id_alat'),
			'nama_alat' => $this->input->post('nama_alat'),
			'harga' => $this->input->post('harga')
		]);
        redirect('Admin/Alat/index');
    }

	/**
	 * @param int $id_alat
	 * @return void
	 */
	public function edit(int $id_alat): void
	{
        $data['alat'] = $this->Alat->get_where(['id_alat' => $id_alat])->first_row();
        $this->load->view('Layouts/header', ['title' => 'Alat']);
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/Alat/edit', $data);
        $this->load->view('Layouts/footer');
    }

	/**
	 * @return void
	 */
	public function update(): void
	{
        $this->Alat->update(
        	['id_alat' => $this->input->post('id_alat')],
			['id_alat' => $this->input->post('id_alat'),
			'nama_alat' => $this->input->post('nama_alat'),
			'harga' => $this->input->post('harga')]);
        redirect('Admin/Alat/index');
    }

	/**
	 * @param int $id_alat
	 * @return void
	 */
	public function delete(int $id_alat): void
	{
		$this->Alat->delete(['id_alat' => $id_alat]);
		redirect('Admin/Alat/index');
	}
}
