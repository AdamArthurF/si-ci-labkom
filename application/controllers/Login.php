<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index login
	 * @return void
	 */
	public function index(): void
	{
		$valid = $this->form_validation;
		$key = 5;
		$encrypt = '';
		for ($i = 0, $iMax = strlen($this->input->post('pass')); $i < $iMax; $i++) {
			$kode[$i] = ord($this->input->post('pass')[$i]); // ubah ASCII ke desimal
			$b[$i] = ($kode[$i] + $key) % 256; // proses enkripsi
			$c[$i] = chr($b[$i]); // ubah desimal ke ASCII
			$encrypt .= $c[$i];
        }
		$valid->set_rules('id_admin','id_admin','required');
		$valid->set_rules('pass','Password','required');
		if($valid->run()) {
			$this->simple_login1->login($this->input->post('id_admin'),$encrypt);
		}
//		 End fungsi login
		$this->load->view('Admin/Login/index',  ['title' => 'Halaman Login Administrator']);
	}

	/**
	 * Logout di sini
	 * @return void
	 */
	public function logout(): void
	{
		$this->simple_login1->logout();	
	}	
}
