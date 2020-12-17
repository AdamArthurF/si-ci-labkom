<?php

class PeminjamanAlat extends CI_Model {
	private $table = 'peminjaman_alat';

	/**
	 * @param int $limit
	 * @param int $start
	 * @return mixed
	 */
	public function get(int $limit, int $start)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
		return $this->db->get($this->table, $limit, $start);

    }

	/**
	 * @return mixed
	 */
	public function get_alat()
	{
		return $this->db->get('alat');
	}

	/**
	 * @return mixed
	 */
	public function insert_id()
    {
        return $this->db->insert_id();
    }


	/**
	 * @param array $where
	 * @return mixed
	 */
	public function get_details(array $where)
	{
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        return $this->db->get_where($this->table, $where);
    }

	/**
	 * Fungsi untuk input data
	 * @param array $data
	 * @return void
	 */
	public function insert(array $data): void
	{
        $this->db->insert($this->table, $data);
    }

	/**
	 * @param array $where
	 * @return bool
	 */
	public function get_harga(array $where): bool
	{
        $this->db->select('harga');
        $query = $this->db->get_where($this->table, $where);
        if ($query->num_rows() > 0) {
            return $query->row()->harga;
        }
        return false;
	}

	/**
	 * Fungsi untuk edit data
	 * @param array $where
	 * @return mixed
	 */
	public function get_where(array $where)
    {
        return $this->db->get_where($this->table, $where);
    }


	/**
	 * @param array $where
	 * @param array $data
	 * @return void
	 */
	public function update(array $where, array $data): void
	{
        $this->db->update($this->table, $data, $where);
    }

	/**
	 * Fungsi untuk hapus data
	 * @param array $where
	 * @return void
	 */
	public function delete(array $where): void
	{
		$this->db->delete($this->table, $where);
	}

	/**
	 * @return mixed
	 */
	public function export_excel()
     {
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_alat.nim','LEFT');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        return $this->db->get($this->table)->result();
     }


} 
