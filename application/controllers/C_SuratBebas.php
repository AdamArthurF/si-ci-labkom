<?php

class C_SuratBebas extends CI_Controller {

    //index untuk menampilkan data dan menampilkan layout
    public function index(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/SuratBebas/V_Tahapan');
        $this->load->view('User/Layouts/footer');  
    }

    public function forms(){
        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/SuratBebas/V_Form');
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

        $check_data=$this->M_Mhs->check_data($nim);

        if($check_data==FALSE){
            $data = array(
            
                'nim' => $nim,
                'nama_lengkap' => $nama_lengkap,
                'prodi' => $prodi,
                'angkatan' => $angkatan,
                'no_wa' => $no_wa,
                'email' => $email
            );

            $data1 = array(
            
                'nim' => $nim,
                'tanggal' => $tanggal
            );

            
            $this->M_Mhs->insert_entry($data);
            $this->M_SuratBebas->insert_entry($data1);
            
            $id = $this->M_SuratBebas->get_id();
            redirect('User/C_SuratBebas/details/'.$id);

        } else {
            $data1 = array(
            
                'nim' => $nim,
                'tanggal' => $tanggal
            );

            $this->M_SuratBebas->insert_entry($data1);

            $id = $this->M_SuratBebas->get_id();
            redirect('User/C_SuratBebas/details/'.$id);
        }


    }


    public function details($id_surat){
        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->M_SuratBebas->get_details($where,'surat_bebas_labkom')->result();

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/SuratBebas/V_Invoice',$data);
        $this->load->view('User/Layouts/footer');  

    }



    




}