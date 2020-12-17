<?php

class SuratBebasLabkom extends CI_Model
{
    private $table = 'surat_bebas_labkom';

    /**
     * @param int $limit
     * @param int $start
     * @return mixed
     */
    public function get(int $limit, int $start)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim = surat_bebas_labkom.nim', 'LEFT');
        return $this->db->get('surat_bebas_labkom', $limit, $start);
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function getDetails(array $where)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim = surat_bebas_labkom.nim', 'LEFT');
        return $this->db->get_where($this->table, $where);
    }

    /**
     * @param array $data
     * @return void
     */
    public function insert(array $data): void
    {
        $this->db->insert('surat_bebas_labkom', $data);
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

}
