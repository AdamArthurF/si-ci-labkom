<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	// Index login
	public function index() {
		// Fungsi Login
		$valid = $this->form_validation;
		$id_admin = $this->input->post('id_admin');
		$pass = $this->input->post('pass');

		$password = $pass;
        $key = 5;
        for ($i = 0; $i < strlen($password); $i++) {
        $kode[$i] = ord($password[$i]); //rubah ASCII ke desimal
        $b[$i] = ($kode[$i] + $key) % 256; //proses enkripsi                
        $c[$i] = chr($b[$i]); //rubah desimal ke ASCII
        }

        $encrypt = '';
            for ($i = 0; $i < strlen($password); $i++) {
            echo $c[$i];
            $encrypt = $encrypt . $c[$i];
        }

		$valid->set_rules('id_admin','id_admin','required');
		$valid->set_rules('pass','Password','required');
		if($valid->run()) {
			$this->simple_login1->login($id_admin,$encrypt, base_url('Dashboard/admin'), base_url('login'));
		}
		// End fungsi login
		$data = array(	'title'	=> 'Halaman Login Administrator');
		$this->load->view('Login/login_view',$data);
	}
	
	// Logout di sini
	public function logout() {
		$this->simple_login1->logout();	
	}	
}