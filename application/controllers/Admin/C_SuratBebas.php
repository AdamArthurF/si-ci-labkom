<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class C_SuratBebas extends CI_Controller {

    function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
 
        //load the department_model
        $this->load->model('M_SuratBebas');
    }

    //index untuk menampilkan data dan menampilkan layout
    public function index(){
                //konfigurasi pagination
                $config['base_url'] = site_url('C_SuratBebas/index'); //site url
                $config['total_rows'] = $this->db->count_all('surat_bebas_labkom'); //total row
                $config['per_page'] = 10;  //show record per halaman
                $config["uri_segment"] = 3;  // uri parameter
                $choice = $config["total_rows"] / $config["per_page"];
                $config["num_links"] = floor($choice);
         
                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']         = 'First';
                $config['last_link']        = 'Last';
                $config['next_link']        = 'Next';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
         
                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
                //panggil function get_mahasiswa_list yang ada pada mmodel M_SuratBebas. 
                $data['data'] = $this->M_SuratBebas->get_data($config["per_page"], $data['page']);           
         
                $data['pagination'] = $this->pagination->create_links();

                $this->load->view('Layouts/header');
                $this->load->view('Layouts/navbar');
                $this->load->view('Layouts/sidebar');
                $this->load->view('SuratBebas/V_list',$data);
                $this->load->view('Layouts/footer');  
    }

    public function insert_entry(){
        $nim = $this->input->post('nim');
        $tanggal = $this->input->post('tanggal');

        $data = array(

            'nim' => $nim,
            'tanggal' => $tanggal
        );

        $this->M_SuratBebas->insert_entry($data);
        redirect('C_SuratBebas/index');
    }

    public function delete_entry($id_surat){
        $where = array('id_surat'=>$id_surat);
        $this->M_SuratBebas->delete_entry($where,'surat_bebas_labkom');
        redirect('C_SuratBebas/index');
    }

    public function edit($id_surat){

        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->M_SuratBebas->edit_data($where,'surat_bebas_labkom')->result();
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('SuratBebas/V_edit',$data);
        $this->load->view('Layouts/footer');
    }

    public function update(){
        
        $id_surat = $this->input->post('id_surat');
        $nim = $this->input->post('nim');
        $tanggal = $this->input->post('tanggal');


        $data = array(

            'id_surat' => $id_surat,
            'nim' => $nim,
            'tanggal' => $tanggal
        );

        $where = array (
            'id_surat' =>$id_surat
        );

        $this->M_SuratBebas->update_data($where,$data,'surat_bebas_labkom'); 
        redirect('C_SuratBebas/index');
    }

    public function details($id_surat){

        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->M_SuratBebas->get_details($where,'surat_bebas_labkom')->result();
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('SuratBebas/V_details',$data);
        $this->load->view('Layouts/footer');

    }

    public function word($id_surat){
        $where = array('id_surat'=>$id_surat);
        $data= $this->M_SuratBebas->get_details($where,'surat_bebas_labkom')->result();
        
        $phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('./uploads/template/surat-bebas-labkom.docx');

        

        foreach ($data as $row) { 
            $nama_lengkap = $row->nama_lengkap;
            $nim = $row->nim;
            $prodi = $row->prodi;
            $tanggal = $row->tanggal;
           
            $template->setValue('nama_lengkap', $nama_lengkap);
            $template->setValue('nim', $nim);
            $template->setValue('prodi', $prodi);
            $template->setValue('tanggal', $tanggal);
        }

        $temp_filename = 'SURAT BEBAS LABKOM .docx';
        $template->saveAs($temp_filename);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
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