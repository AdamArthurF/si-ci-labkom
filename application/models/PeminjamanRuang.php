<?php

class PeminjamanRuang extends CI_Model {
    private $table = 'peminjaman_ruang';

    /**
     * @param int $limit
     * @param int $start
     * @return mixed
     */
    public function get(int $limit, int $start)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_ruang.nim','LEFT');
        $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
        return $this->db->get('peminjaman_ruang', $limit, $start);

    }

    /**
     * @return mixed
     */
    public function get_lab()
    {
        return $this->db->get('lab');
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
    public function get_details(array $where){
        $this->db->select('*');
        $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_ruang.nim','LEFT');
        $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
        return $this->db->get_where($this->table, $where);
    }

    /**
     * @param array $data
     * @return void
     */
    public function insert(array $data): void
    {
        $this->db->insert($this->table, $data);
    }

    /**
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
    public function excel()
    {
       $this->db->select('*');
       $this->db->join('mahasiswa','mahasiswa.nim = peminjaman_ruang.nim','LEFT');
       $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
       return $this->db->get($this->table)->result();
    }
} 
