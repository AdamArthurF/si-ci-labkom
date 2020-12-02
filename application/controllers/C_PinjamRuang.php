<?php

class C_PinjamRuang extends CI_Controller {

    //index untuk menampilkan data dan menampilkan layout
    public function index(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PinjamRuang/V_Tahapan');
        $this->load->view('User/Layouts/footer');  
    }


    public function forms(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PinjamRuang/V_Form');
        $this->load->view('User/Layouts/footer');  
    }



    public function insert_entry(){
        
        $nim = $this->input->post('nim');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $prodi = $this->input->post('prodi');
        $angkatan = $this->input->post('angkatan');
        $no_wa = $this->input->post('no_wa');
        $email = $this->input->post('email');
        $tanggal = $this->input->post('tanggal');
        $id_lab = $this->input->post('id_lab');
        $jam_pinjam = $this->input->post('jam_pinjam');
        $jam_kembali = $this->input->post('jam_kembali');
        $keperluan = $this->input->post('keperluan');

        $check_data=$this->M_Mhs->check_data($nim);

        if($check_data==FALSE){
            $data = array(
            
                'nim' => $nim,
                'nama_lengkap' => $nama_lengkap,
                'prodi' => $prodi,
                'angkatan' => $angkatan,
                'no_wa' => $no_wa,
                'email' => $email,
            );

            $data1 = array(
            
                'nim' => $nim,
                'tanggal' => $tanggal,
                'id_lab' => $id_lab,
                'jam_pinjam' => $jam_pinjam,
                'jam_kembali' => $jam_kembali,
                'keperluan' => $keperluan
            );

            
            $this->M_Mhs->insert_entry($data);
            $this->M_PinjamRuang->insert_entry($data1);
            
            $id = $this->M_PinjamRuang->get_id();
            redirect('User/C_PinjamRuang/details/'.$id);

        } else {
            $data1 = array(
            
                'nim' => $nim,
                'tanggal' => $tanggal,
                'id_lab' => $id_lab,
                'jam_pinjam' => $jam_pinjam,
                'jam_kembali' => $jam_kembali,
                'keperluan' => $keperluan
            );

            $this->M_PinjamRuang->insert_entry($data1);

            $id = $this->M_PinjamRuang->get_id();
            redirect('User/C_PinjamRuang/details/'.$id);
        }


    }


    public function details($id_pinjam_ruang){
        $where = array('id_pinjam_ruang'=>$id_pinjam_ruang);
        $data['p_lab'] = $this->M_PinjamRuang->get_details($where,'peminjaman_ruang')->result();

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PinjamRuang/V_Invoice',$data);
        $this->load->view('User/Layouts/footer');  

    }



    




}