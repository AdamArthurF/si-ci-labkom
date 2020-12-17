<?php if(! defined('BASEPATH')) {
    exit('Akses langsung tidak diperbolehkan');
}

class Simple_login1 {
	public $CI;

    /**
     * Simple_login1 constructor.
     */
    public function __construct() {
		$this->CI =& get_instance();
	}

    /**
     * @param string $id_admin
     * @param string $pass
     * @return bool
     */
    public function login(string $id_admin, string $pass): bool
    {
		$query = $this->CI->db->get_where('user_admin', ['id_admin' => $id_admin, 'pass' => $pass]);
		if ($query->num_rows() === 1) {
			$row = $this->CI->db->query("SELECT id_admin FROM user_admin where id_admin = '$id_admin'");
			$admin = $row->row();
			$id = $admin->id_admin;
			$this->CI->session->set_userdata('id_admin', $id_admin);
			$this->CI->session->set_userdata('id_login', uniqid(mt_rand(), true));
			$this->CI->session->set_userdata('id', $id);
			redirect(base_url('Admin/Dashboard/index'));
		} else {
			$this->CI->session->set_flashdata('sukses','Oops... username atau password kamu salah');
			redirect(base_url('login'));
		}
		return false;
	}

    /**
     * Proteksi halaman
     * @return void
     */
    public function cek_login(): void
    {
		if ($this->CI->session->userdata('id_admin') === '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			redirect(base_url('login'));
		}
	}

    /**
     * @return void
     */
    public function logout(): void
    {
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'));
	}
}
