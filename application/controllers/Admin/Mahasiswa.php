<?php

use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Mahasiswa extends CI_Controller {

	/**
	 * Mahasiswa constructor.
	 */
	public function __construct()
	{
        parent::__construct();
        $this->load->library('pagination'); // Load libary pagination
		$this->load->library('upload');
		$this->load->helper('form');
        $this->load->model('Mahasiswa'); // Load the department_model
    }

	/**
	 * Menampilkan data dan menampilkan layout
	 * @return void
	 */
	public function index(): void
	{
		// Konfigurasi pagination
		$config['base_url'] = site_url('Admin/Mahasiswa/index'); // site url
		$config['total_rows'] = $this->db->count_all('mahasiswa'); // total row
		$config['per_page'] = 15;  // show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
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

		// Panggil function get yang ada pada model mahasiswa
		$data['data'] = $this->Mahasiswa->get_data($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('Layouts/header', ['title' => 'Mahasiswa']);
		$this->load->view('Layouts/navbar');
		$this->load->view('Layouts/sidebar');
		$this->load->view('Admin/Mahasiswa/index', $data);
		$this->load->view('Layouts/footer');
    }

	/**
	 * @return void
	 */
	public function insert(): void
	{
		$this->Mahasiswa->insert([
			'nim' => $this->input->post('nim'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'angkatan' => $this->input->post('angkatan'),
			'prodi' => $this->input->post('prodi'),
			'no_wa' => $this->input->post('no_wa'),
			'email' => $this->input->post('email')
		]);
        redirect('Admin/Mahasiswa/index');
    }

	/**
	 * @param string $nim
	 * @return void
	 */
	public function delete(string $nim): void
	{
        $this->Mahasiswa->delete(['nim' => $nim],'mahasiswa');
        redirect('Admin/Mahasiswa/index');
    }

	/**
	 * @param string $nim
	 * @return void
	 */
	public function edit(string $nim): void
	{
        $data['mhs'] = $this->Mahasiswa->edit_data(['nim' => $nim],'mahasiswa')->result();
        $this->load->view('Layouts/header', ['title' => 'Mahasiswa']);
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/Mahasiswa/edit',$data);
        $this->load->view('Layouts/footer');
    }

	/**
	 * @return void
	 */
	public function update(): void
	{
        $this->Mahasiswa->update_data(
        	['nim' => $this->input->post('nim')],
			['nim' => $this->input->post('nim'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'prodi' => $this->input->post('prodi'),
			'angkatan' => $this->input->post('angkatan'),
			'no_wa' => $this->input->post('no_wa'),
			'email' => $this->input->post('email')]);
        redirect('Admin/Mahasiswa/index');
    }

	/**
	 * @return void
	 */
	public function upload(): void
	{
        $config['upload_path'] = './uploads/mahasiswa-excel';
        $config['allowed_types'] = 'xlsx';
		$this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
        	$error = $this->upload->display_errors();
			$this->load->view('Admin/Mahasiswa/index', compact('error'));
        } else {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            if('csv' === $extension) {
                $reader = new Csv();
            } else {
                $reader = new Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 1, $iMax = count($sheetData); $i < $iMax; $i++) {
				$this->Mahasiswa->insert([
					'nim' => $sheetData[$i]['1'],
					'nama_lengkap' => $sheetData[$i]['2'],
					'angkatan' => $sheetData[$i]['3'],
					'prodi' => $sheetData[$i]['4'],
					'no_wa' => $sheetData[$i]['5'],
					'email' => $sheetData[$i]['6'],
				]);
            }
            redirect('Admin/Mahasiswa/index');
        }
    }

	/**
	 * @return void
	 */
	public function download(): void
	{
        force_download('./downloads/data_excel.xlsx',NULL);
    }
}
