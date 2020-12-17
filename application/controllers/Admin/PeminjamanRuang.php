<?php

use PhpOffice\PhpSpreadsheet\Writer\Exception as ExcelException;
use PhpOffice\PhpWord\Exception\Exception as WordException;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PeminjamanRuang extends CI_Controller {

    /**
     * PeminjamanRuang constructor.
     */
    public function __construct()
    {
        parent::__construct();
        // load libary pagination
        $this->load->library('pagination');
        // load the department_model
        $this->load->model('PeminjamanRuang');
    }

    /**
     * index untuk menampilkan data dan menampilkan layout
     * @return void
     */
    public function index(): void
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('Admin/PeminjamanRuang/index'); //site url
        $config['total_rows'] = $this->db->count_all('peminjaman_ruang'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
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
        //panggil function get_mahasiswa_list yang ada pada mmodel PeminjamanRuang.
        $data['data'] = $this->PeminjamanRuang->get($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Peminjaman Ruang';

        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/PeminjamanRuang/index', $data);
        $this->load->view('Layouts/footer');
    }

    /**
     * @return void
     */
    public function insert(): void
    {
        $this->PeminjamanRuang->insert([
            'nim' => $this->input->post('nim'),
            'tanggal' => $this->input->post('tanggal'),
            'id_lab' => $this->input->post('id_lab'),
            'jam_pinjam' => $this->input->post('jam_pinjam'),
            'jam_kembali' => $this->input->post('jam_kembali'),
            'keperluan' => $this->input->post('keperluan')
        ]);
        redirect('Admin/PeminjamanRuang/index');
    }

    /**
     * @param string $id_pinjam_ruang
     * @return void
     */
    public function details(string $id_pinjam_ruang): void
    {
        $data['p_ruang'] = $this->PeminjamanRuang->get_details(['id_pinjam_ruang' => $id_pinjam_ruang])->row();
        $data['title'] = 'Peminjaman Ruang | Details';
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/PeminjamanRuang/details', $data);
        $this->load->view('Layouts/footer');
    }

    /**
     * @param string $id_pinjam_ruang
     * @return void
     */
    public function edit(string $id_pinjam_ruang): void
    {
        $data['p_ruang'] = $this->PeminjamanRuang->get_where([['id_pinjam_ruang' => $id_pinjam_ruang]])->row();
        $data['title'] = 'Peminjaman Ruang | Edit';
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Admin/PeminjamanRuang/edit',$data);
        $this->load->view('Layouts/footer');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $this->PeminjamanRuang->update(['id_pinjam_ruang' => $this->input->post('id_pinjam_ruang')
        ],[
            'id_pinjam_ruang' => $this->input->post('id_pinjam_ruang'),
            'nim' => $this->input->post('nim'),
            'tanggal' => $this->input->post('tanggal'),
            'id_lab' => $this->input->post('id_lab'),
            'jam_pinjam' => $this->input->post('jam_pinjam'),
            'jam_kembali' => $this->input->post('jam_kembali'),
            'keperluan' => $this->input->post('keperluan')
        ]);
        redirect('Admin/PeminjamanRuang/details/'. $this->input->post('id_pinjam_ruang'));
    }

    /**
     * @param string $id_pinjam_ruang
     * @return void
     */
    public function delete(string $id_pinjam_ruang): void
    {
        $this->PeminjamanRuang->delete(['id_pinjam_ruang' => $id_pinjam_ruang]);
        redirect('Admin/PeminjamanRuang/index');
    }

    /**
     * @param string $id_pinjam_ruang
     * @throws WordException
     */
    public function word(string $id_pinjam_ruang): void
    {
        $data = $this->PeminjamanRuang->get_where(['id_pinjam_ruang' => $id_pinjam_ruang])->result();
        $phpWord = new PhpWord();
        $template = $phpWord->loadTemplate('./uploads/template/surat-peminjaman-lab.docx');
        foreach ($data as $row) {
            setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
            $tanggal = strftime( "%d %B %Y" , strtotime($row->tanggal));
            $jam_pinjam = date("H.i", strtotime($row->jam_pinjam));
            $jam_kembali = date("H.i", strtotime($row->jam_kembali));
            $today = strftime( "%d %B %Y" , time());
            $template->setValue('nama_lengkap', $row->nama_lengkap);
            $template->setValue('nim', $row->nim);
            $template->setValue('no_wa', $row->no_wa);
            $template->setValue('keperluan', $row->keperluan);
            $template->setValue('nama_lab', $row->nama_lab);
            $template->setValue('tanggal', $tanggal);
            $template->setValue('jam_pinjam', $jam_pinjam);
            $template->setValue('jam_kembali', $jam_kembali);
            $template->setValue('today', $today);
        }
        $temp_filename = 'SURAT PEMINJAMAN LAB.docx';
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

    /**
     * @throws ExcelException
     */
    public function excel(): void
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Peminjaman Ruang');
        $sheet->setCellValue('C1', 'NIM');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'prodi');
        $sheet->setCellValue('F1', 'no_wa');
        $sheet->setCellValue('G1', 'id_lab');
        $sheet->setCellValue('H1', 'nama_lab');
        $sheet->setCellValue('I1', 'tanggal');
        $sheet->setCellValue('J1', 'jam_pinjam');
        $sheet->setCellValue('K1', 'jam_kembali');
        $sheet->setCellValue('L1', 'keperluan');
        $data = $this->PeminjamanRuang->excel();
        $no = 1;
        $x = 2;
        foreach($data as $row)
        {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, $row->id_pinjam_ruang);
            $sheet->setCellValue('C'.$x, $row->nim);
            $sheet->setCellValue('D'.$x, $row->nama_lengkap);
            $sheet->setCellValue('E'.$x, $row->prodi);
            $sheet->setCellValue('F'.$x, $row->no_wa);
            $sheet->setCellValue('G'.$x, $row->id_lab);
            $sheet->setCellValue('H'.$x, $row->nama_lab);
            $sheet->setCellValue('I'.$x, $row->tanggal);
            $sheet->setCellValue('J'.$x, $row->jam_pinjam);
            $sheet->setCellValue('K'.$x, $row->jam_kembali);
            $sheet->setCellValue('L'.$x, $row->keperluan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-peminjaman-ruang-lab.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename);
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
