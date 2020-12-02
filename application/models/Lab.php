<?php

class Lab extends CI_Model {
	private $table = 'lab';

	/**
	 * Mendapatkan data dari database
	 * @return mixed
	 */
	public function get()
    {
        return $this->db->get($this->table)->result_array();
    }

	/**
	 * Input data
	 * @param array $data
	 */
	public function insert(array $data): void
	{
        $this->db->insert($this->table, $data);
    }

	/**
	 * Edit data
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
	 */
	public function update(array $where, array $data): void
	{
        $this->db->update($this->table, $data, $where);
    }

	/**
	 * Hapus data
	 * @param array $where
	 */
	public function delete(array $where): void
	{
		$this->db->delete($this->table, $where);
	}
} 
