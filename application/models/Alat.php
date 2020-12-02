<?php

class Alat extends CI_Model {
	private $table = 'alat';

	/**
	 * Untuk mendapatkan data dari database
	 * @param int $limit
	 * @param int $start
	 * @return mixed
	 */
	public function get(int $limit, int $start)
	{
        return $this->db->get($this->table, $limit, $start);
    }

	/**
	 * Untuk input data
	 * @param array $data
	 * @return void
	 */
	public function insert(array $data): void
	{
        $this->db->insert($this->table, $data);
    }

	/**
	 * Untuk edit data
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
	 * Untuk hapus data
	 * @param array $where
	 */
	public function delete(array $where): void
	{
		$this->db->delete($this->table, $where);
	}
} 
