<?php

class Mahasiswa extends CI_Model {
	private $table = 'mahasiswa';

	/**
	 * @param int $limit
	 * @param int $start
	 * @return mixed
	 */
	public function get(int $limit, int $start)
	{
        return $this->db->get($this->table, $limit, $start);
    }

	/**
	 * Input data
	 * @param array $data
	 * @return void
	 */
	public function insert(array $data): void
	{
        $this->db->insert($this->table, $data);
    }

	/**
	 * Hapus data
	 * @param array $where
	 * @return void
	 */
	public function delete(array $where): void
	{
        $this->db->delete($this->table, $where);
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
	 * @param string $nim
	 * @return bool
	 */
	public function check(string $nim): bool
	{
        $query = $this->db->get_where($this->table, ['nim' => $nim]);
		return $query->num_rows() > 0;
	}
} 
