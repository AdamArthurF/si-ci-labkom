<?php

class Search extends CI_Controller {

    /**
     * Search constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Search', 'PeminjamanRuang', 'PeminjamanAlat', 'SuratBebasLabkom']);
    }

    /**
     * index untuk menampilkan data dan menampilkan layout
     * @return void
     */
    public function index(): void
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/footer');
    }

    /**
     * @return void
     */
    public function search(): void
    {
        $mhs['mhs'] = $this->Search->get_mahasiswa(['nim' => $this->input->get('nim')])->result();
        $ruang['p_ruang'] = $this->Search->get_pinjam_ruang(['nim' => $this->input->get('nim')])->result();
        $alat['p_alat'] = $this->Search->get_pinjam_alat(['nim' => $this->input->get('nim')])->result();
        $surat['surat'] = $this->Search->get_surat(['nim' => $this->input->get('nim')])->result();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Admin/Search/search_mhs', $mhs);
        $this->load->view('Admin/Search/search_pinjam_ruang', $ruang);
        $this->load->view('Admin/Search/search_pinjam_alat', $alat);
        $this->load->view('Admin/Search/search_surat', $surat);
        $this->load->view('layouts/footer');
    }

    /**
     * @param string $id_pinjam_ruang
     * @return void
     */
    public function details1(string $id_pinjam_ruang): void
    {
        $data['p_ruang'] = $this->PeminjamanRuang->get_where(['id_pinjam_ruang' => $id_pinjam_ruang])->row();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Search/details_ruang', $data);
        $this->load->view('layouts/footer');
    }

    /**
     * @param string $id_pinjam_alat
     * @return void
     */
    public function details2(string $id_pinjam_alat): void
    {
        $data['p_alat'] = $this->PeminjamanAlat->get_where(['id_pinjam_alat' => $id_pinjam_alat])->row();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Search/details_alat', $data);
        $this->load->view('layouts/footer');
    }


    /**
     * @param $id_surat
     * @return void
     */
    public function details3($id_surat): void
    {
        $data['surat'] = $this->SuratBebasLabkom->get_details(['id_surat' => $id_surat])->row();
        $this->load->view('layouts/header');
        $this->load->view('layouts/navbar');
        $this->load->view('layouts/sidebar');
        $this->load->view('Search/details_surat', $data);
        $this->load->view('layouts/footer');
    }
}
