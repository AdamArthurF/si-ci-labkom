<?php

class PeminjamanAlat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Mahasiswa', 'PeminjamanAlat']);
    }

    /**
     * index untuk menampilkan data dan menampilkan layout
     * @return void
     */
    public function index(): void
    {
        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PeminjamanAlat/V_Tahapan');
        $this->load->view('User/Layouts/footer');  
    }

    /**
     * @return void
     */
    public function forms(): void
    {
        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PeminjamanAlat/V_Form');
        $this->load->view('User/Layouts/footer');  
    }

    /**
     * @return void
     */
    public function insert(): void
    {
        $diff = abs(strtotime($this->input->post('tanggal_kembali')) - strtotime($this->input->post('tanggal_pinjam')));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        if ($days === 0) {
            $days = 1;
        }
        $harga = $this->PeminjamanAlat->get_harga(['id_alat' => $this->input->post('id_alat')]);
        $check_data = $this->Mahasiswa->check_data($this->input->post('nim'));
        if (!$check_data) {
            $this->Mahasiswa->insert([
                'nim' => $this->input->post('nim'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'prodi' => $this->input->post('prodi'),
                'angkatan' => $this->input->post('angkatan'),
                'no_wa' => $this->input->post('no_wa'),
                'email' => $this->input->post('email'),
            ]);
            $this->PeminjamanAlat->insert([
                'nim' => $this->input->post('nim'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'jam' => $this->input->post('jam'),
                'tempat' => $this->input->post('tempat'),
                'id_alat' => $this->input->post('id_alat'),
                'jumlah_alat' => $this->input->post('jumlah_alat'),
                'total_harga' => $this->input->post('jumlah_alat') * $harga * $days,
                'keperluan' => $this->input->post('keperluan'),
                'status' => $this->input->post('status')
            ]);
            $id = $this->PeminjamanAlat->get_id();
            redirect('User/C_PinjamAlat/details/' . $id);
        } else {
            $this->PeminjamanAlat->insert([
                'nim' => $this->input->post('nim'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'jam' => $this->input->post('jam'),
                'tempat' => $this->input->post('tempat'),
                'id_alat' => $this->input->post('id_alat'),
                'jumlah_alat' => $this->input->post('jumlah_alat'),
                'total_harga' => $this->input->post('jumlah_alat') * $harga * $days,
                'keperluan' => $this->input->post('keperluan'),
                'status' => $this->input->post('status')
            ]);
            $id = $this->PeminjamanAlat->get_id();
            redirect('User/C_PinjamAlat/details/' . $id);
        }
    }


    /**
     * @param string $id_pinjam_alat
     */
    public function details(string $id_pinjam_alat): void
    {
        $data['p_alat'] = $this->PeminjamanAlat->get_details(['id_pinjam_alat' => $id_pinjam_alat])->result();
        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PeminjamanAlat/V_Invoice',$data);
        $this->load->view('User/Layouts/footer');
    }
}
