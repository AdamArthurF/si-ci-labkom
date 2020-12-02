<?php

class C_PinjamAlat extends CI_Controller {

    //index untuk menampilkan data dan menampilkan layout
    public function index(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PinjamAlat/V_Tahapan');
        $this->load->view('User/Layouts/footer');  
    }

    public function forms(){

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PinjamAlat/V_Form');
        $this->load->view('User/Layouts/footer');  
    }



    public function insert_entry(){
        
        $nim = $this->input->post('nim');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $prodi = $this->input->post('prodi');
        $angkatan = $this->input->post('angkatan');
        $no_wa = $this->input->post('no_wa');
        $email = $this->input->post('email');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $jam = $this->input->post('jam');
        $tempat = $this->input->post('tempat');
        $id_alat = $this->input->post('id_alat');
        
        //Jumlah Hari
        
        $diff = abs(strtotime($tanggal_kembali) - strtotime($tanggal_pinjam));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if($days==0){
            $days=1;
        }

        
        $where = array('id_alat'=>$id_alat);
        $harga=$this->M_PinjamAlat->get_harga($where,'alat');

        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = $jumlah_alat*$harga*$days;
        $keperluan = $this->input->post('keperluan');
        $status = $this->input->post('status');

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
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
                'jam' => $jam,
                'tempat' => $tempat,
                'id_alat' => $id_alat,
                'jumlah_alat' => $jumlah_alat,
                'total_harga' => $total_harga,
                'keperluan' => $keperluan,
                'status' => $status
            );

            
            $this->M_Mhs->insert_entry($data);
            $this->M_PinjamAlat->insert_entry($data1);
            
            $id = $this->M_PinjamAlat->get_id();
            redirect('User/C_PinjamAlat/details/'.$id);

        } else {
            $data1 = array(
            
                'nim' => $nim,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
                'jam' => $jam,
                'tempat' => $tempat,
                'id_alat' => $id_alat,
                'jumlah_alat' => $jumlah_alat,
                'total_harga' => $total_harga,
                'keperluan' => $keperluan,
                'status' => $status
            );

            $this->M_PinjamAlat->insert_entry($data1);

            $id = $this->M_PinjamAlat->get_id();
            redirect('User/C_PinjamAlat/details/'.$id);
        }


    }


    public function details($id_pinjam_alat){
        $where = array('id_pinjam_alat'=>$id_pinjam_alat);
        $data['p_alat'] = $this->M_PinjamAlat->get_details($where,'peminjaman_alat')->result();

        $this->load->view('User/Layouts/header');
        $this->load->view('User/Layouts/navbar');
        $this->load->view('User/PinjamAlat/V_Invoice',$data);
        $this->load->view('User/Layouts/footer');  

    }
}