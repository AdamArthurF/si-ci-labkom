<?php

class C_Search extends CI_Controller {


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
        $this->load->model('M_Search');
        $this->load->model('M_PinjamRuang');
        $this->load->model('M_PinjamAlat');
        $this->load->model('M_SuratBebas');
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        // $this->load->view('lab/V_List',$data);
        $this->load->view('layouts/footer');
    }

    public function search(){

        $nim = $this->input->get('nim');
        $where = array('nim'=>$nim);
        $mhs['mhs'] = $this->M_Search->get_mhs($where)->result();
        $ruang['p_ruang'] = $this->M_Search->get_pinjam_ruang($where,'peminjaman_ruang')->result();
        $alat['p_alat'] = $this->M_Search->get_pinjam_alat($where,'peminjaman_alat')->result();
        $surat['surat'] = $this->M_Search->get_surat($where,'surat_bebas_labkom')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('search/search_mhs',$mhs);
        $this->load->view('search/search_pinjam_ruang',$ruang);
        $this->load->view('search/search_pinjam_alat',$alat);
        $this->load->view('search/search_surat',$surat);
        $this->load->view('layouts/footer');
    }


    public function details1($id_pinjam_ruang){

        $where = array('id_pinjam_ruang'=>$id_pinjam_ruang);
        $data['p_ruang'] = $this->M_PinjamRuang->get_details($where,'peminjaman_ruang')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Search/details_ruang',$data);
        $this->load->view('layouts/footer');

    }


    public function details2($id_pinjam_alat){

        $where = array('id_pinjam_alat'=>$id_pinjam_alat);
        $data['p_alat'] = $this->M_PinjamAlat->get_details($where,'peminjaman_alat')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Search/details_alat',$data);
        $this->load->view('layouts/footer');
    }


    public function details3($id_surat){

        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->M_SuratBebas->get_details($where,'surat_bebas_labkom')->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Search/details_surat',$data);
        $this->load->view('layouts/footer');

    }




}