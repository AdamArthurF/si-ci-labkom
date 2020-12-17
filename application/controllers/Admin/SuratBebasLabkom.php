<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\Exception\Exception as WordException;
use PhpOffice\PhpWord\PhpWord;

class SuratBebasLabkom extends CI_Controller {

    /**
     * SuratBebasLabkom constructor.
     */
    public function __construct()
    {
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
        //load the department_model
        $this->load->model('SuratBebasLabkom');
    }

    /**
     * index untuk menampilkan data dan layout
     * @return void
     */
    public function index(): void
    {
        // Konfigurasi pagination
        $config['base_url'] = site_url('Admin/SuratBebasLabkom/index'); //site url
        $config['total_rows'] = $this->db->count_all('surat_bebas_labkom'); //total row
        $config['per_page'] = 10;  //show record per halaman
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
        $data['data'] = $this->SuratBebasLabkom->get_data($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Surat Bebas Labkom';

        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/SuratBebasLabkom/index', $data);
        $this->load->view('Layouts/footer');
    }

    /**
     * @return void
     */
    public function insert(): void
    {
        $this->SuratBebasLabkom->insert([
            'nim' => $this->input->post('nim'),
            'tanggal' => $this->input->post('tanggal')
        ]);
        redirect('Admin/SuratBebasLabkom/index');
    }

    /**
     * @param string $id_surat
     * @return void
     */
    public function details(string $id_surat): void
    {
        $data['surat'] = $this->SuratBebasLabkom->getDetails(['id_surat'=> $id_surat])->row();
        $data['title'] = 'Surat Bebas Labkom | Details';
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/SuratBebasLabkom/details', $data);
        $this->load->view('Layouts/footer');

    }

    /**
     * @param string $id_surat
     * @return void
     */
    public function edit(string $id_surat): void
    {
        $data['surat'] = $this->SuratBebasLabkom->get_where(['id_surat' => $id_surat])->row();
        $data['title'] = 'Surat Bebas Labkom | Edit';
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/SuratBebasLabkom/edit', $data);
        $this->load->view('Layouts/footer');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $this->SuratBebasLabkom->update(['id_surat' => $this->input->post('id_surat')
        ],[ 'id_surat' => $this->input->post('id_surat'),
            'nim' => $this->input->post('nim'),
            'tanggal' => $this->input->post('tanggal')
        ]);
        redirect('Admin/SuratBebasLabkom/index');
    }

    /**
     * @param string $id_surat
     * @return void
     */
    public function delete(string $id_surat): void
    {
        $this->SuratBebasLabkom->delete(['id_surat' => $id_surat]);
        redirect('Admin/SuratBebasLabkom/index');
    }

    /**
     * @param string $id_surat
     * @throws WordException
     */
    public function word(string $id_surat): void
    {
        $data = $this->SuratBebasLabkom->get_where(['id_surat' => $id_surat])->row();
        $phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('./uploads/template/surat-bebas-labkom.docx');
        $template->setValue('nama_lengkap', $data->nama_lengkap);
        $template->setValue('nim', $data->nim);
        $template->setValue('prodi', $data->prodi);
        $template->setValue('tanggal', $data->tanggal);
        $temp_filename = 'SURAT BEBAS LABKOM.docx';
        $template->saveAs($temp_filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;    
    }
}
