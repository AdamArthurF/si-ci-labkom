<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_PinjamAlat extends CI_Controller {

    function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
 
        //load the department_model
        $this->load->model('M_PinjamAlat');
    }


    //index untuk menampilkan data dan menampilkan layout
    public function index(){
                //konfigurasi pagination
                $config['base_url'] = site_url('C_PinjamAlat/index'); //site url
                $config['total_rows'] = $this->db->count_all('peminjaman_alat'); //total row
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
         
                //panggil function get_mahasiswa_list yang ada pada mmodel M_PinjamAlat. 
                $data['data'] = $this->M_PinjamAlat->get_data($config["per_page"], $data['page']);           
         
                $data['pagination'] = $this->pagination->create_links();

                $this->load->view('Layouts/header');
                $this->load->view('Layouts/navbar');
                $this->load->view('Layouts/sidebar');
                $this->load->view('PinjamAlat/V_list',$data);
                $this->load->view('Layouts/footer');  
    }

    public function insert_entry(){

        $nim = $this->input->post('nim');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $jam = $this->input->post('jam');
        $tempat = $this->input->post('tempat');
        $id_alat = $this->input->post('id_alat');
        
        $where = array('id_alat'=>$id_alat);
        $harga=$this->M_PinjamAlat->get_harga($where,'alat');

        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = $jumlah_alat*$harga;
        $keperluan = $this->input->post('keperluan');
        $status = $this->input->post('status');


        $data = array(

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

        $this->M_PinjamAlat->insert_entry($data);
        redirect('C_PinjamAlat/index');
    }

    public function delete_entry($id_pinjam_alat){
        $where = array('id_pinjam_alat'=>$id_pinjam_alat);
        $this->M_PinjamAlat->delete_entry($where,'peminjaman_alat');
        redirect('C_PinjamAlat/index');
    }

    public function edit($id_pinjam_alat){

        $where = array('id_pinjam_alat'=>$id_pinjam_alat);
        $data['p_alat'] = $this->M_PinjamAlat->edit_data($where,'peminjaman_alat')->result();
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('PinjamAlat/V_edit',$data);
        $this->load->view('Layouts/footer');
    }

    public function update(){
        
        $id_pinjam_alat = $this->input->post('id_pinjam_alat');
        $nim = $this->input->post('nim');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $jam = $this->input->post('jam');
        $tempat = $this->input->post('tempat');
        $id_alat = $this->input->post('id_alat');

        $where = array('id_alat'=>$id_alat);
        $harga=$this->M_PinjamAlat->get_harga($where,'alat');

        $jumlah_alat = $this->input->post('jumlah_alat');
        $total_harga = $jumlah_alat*$harga;
        $keperluan = $this->input->post('keperluan');
        $status = $this->input->post('status');

        $data = array(

            'id_pinjam_alat' => $id_pinjam_alat,
            'nim' => $nim,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali,
            'jam' => $jam,
            'tempat' => $tempat,
            'id_alat' => $id_alat,
            'jumlah_alat' => $jumlah_alat,
            'keperluan' => $keperluan,
            'total_harga' => $total_harga,
            'keperluan' => $keperluan,
            'status' => $status
        );

        $where = array (
            'id_pinjam_alat' =>$id_pinjam_alat
        );

        $this->M_PinjamAlat->update_data($where,$data,'peminjaman_alat'); 
        redirect('C_PinjamAlat/index');
    }


        public function details($id_pinjam_alat){

            $where = array('id_pinjam_alat'=>$id_pinjam_alat);
            $data['p_alat'] = $this->M_PinjamAlat->get_details($where,'peminjaman_alat')->result();
            $this->load->view('Layouts/header');
            $this->load->view('Layouts/navbar');
            $this->load->view('Layouts/sidebar');
            $this->load->view('PinjamAlat/V_details',$data);
            $this->load->view('Layouts/footer');
        }

        public function word($id_pinjam_alat){
            $where = array('id_pinjam_alat'=>$id_pinjam_alat);
            $data= $this->M_PinjamAlat->get_details($where,'peminjaman_alat')->result();
            
            $phpWord = new PhpWord();
            $template = $phpWord->loadTemplate('./uploads/template/surat-peminjaman-alat.docx');
    
            

            foreach ($data as $row) { 
                $nama_lengkap = $row->nama_lengkap;
                $nim = $row->nim;
                $prodi = $row->prodi;
                $nama_alat = $row->nama_alat;
                $jumlah_alat = $row->jumlah_alat;
                $keperluan = $row->keperluan;
                setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                $today = strftime( "%d %B %Y" , time());
                $tanggal_pinjam = strftime( "%d %B " , strtotime($row->tanggal_pinjam));
                $hari_pinjam = strftime( "%A" , strtotime($row->tanggal_pinjam));
                $tanggal_kembali = strftime( "%d %B %Y" , strtotime($row->tanggal_kembali));
                $hari_kembali = strftime( "%A" , strtotime($row->tanggal_kembali));
                $d=strtotime($row->jam);
                $jam = date("H.i", $d);
                $tempat = $row->tempat;
               
                $template->setValue('nama_lengkap', $nama_lengkap);
                $template->setValue('nim', $nim);
                $template->setValue('prodi', $prodi);
                $template->setValue('nama_alat', $nama_alat);
                $template->setValue('jumlah_alat', $jumlah_alat);
                $template->setValue('keperluan', $keperluan);
                $template->setValue('today', $today);
                $template->setValue('tanggal_pinjam', $tanggal_pinjam);
                $template->setValue('hari_pinjam', $hari_pinjam);
                $template->setValue('tanggal_kembali', $tanggal_kembali);
                $template->setValue('hari_kembali', $hari_kembali);
                $template->setValue('jam', $jam);
                $template->setValue('tempat', $tempat);
            }
    
            $temp_filename = 'SURAT PEMINJAMAN ALAT.docx';
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
    
        
        public function export_excel()
		{
			$this->load->model('M_PinjamAlat');
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'ID Peminjaman Alat');
			$sheet->setCellValue('C1', 'NIM');
			$sheet->setCellValue('D1', 'Nama');
			$sheet->setCellValue('E1', 'Prodi');
			$sheet->setCellValue('F1', 'ID Alat');
			$sheet->setCellValue('G1', 'Tanggal Pinjam');
			$sheet->setCellValue('H1', 'Tanggal Kembali');
			$sheet->setCellValue('I1', 'Waktu Mulai');
			$sheet->setCellValue('J1', 'Tempat');
			$sheet->setCellValue('K1', 'Nama Alat');
			$sheet->setCellValue('L1', 'Harga Sewa');
			$sheet->setCellValue('M1', 'Jumlah Alat Disewa');
			$sheet->setCellValue('N1', 'Keperluan');
			$sheet->setCellValue('O1', 'Total Harga Sewa(Per Hari)');
			$sheet->setCellValue('P1', 'Status');
			
			$data = $this->M_PinjamAlat->export_excel();
			$no = 1;
			$x = 2;
			foreach($data as $row)
			{
				$sheet->setCellValue('A'.$x, $no++);
				$sheet->setCellValue('B'.$x, $row->id_pinjam_alat);
				$sheet->setCellValue('C'.$x, $row->nim);
				$sheet->setCellValue('D'.$x, $row->nama_lengkap);
				$sheet->setCellValue('E'.$x, $row->prodi);
				$sheet->setCellValue('F'.$x, $row->id_alat);
				$sheet->setCellValue('G'.$x, $row->tanggal_pinjam);
				$sheet->setCellValue('H'.$x, $row->tanggal_kembali);
				$sheet->setCellValue('I'.$x, $row->jam);
				$sheet->setCellValue('J'.$x, $row->tempat);
				$sheet->setCellValue('K'.$x, $row->nama_alat);
				$sheet->setCellValue('L'.$x, $row->harga);
				$sheet->setCellValue('M'.$x, $row->jumlah_alat);
				$sheet->setCellValue('N'.$x, $row->keperluan);
				$sheet->setCellValue('O'.$x, $row->total_harga);
				$sheet->setCellValue('P'.$x, $row->status);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan-peminjaman-alat';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
		}


}