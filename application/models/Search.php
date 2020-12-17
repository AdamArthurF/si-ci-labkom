<?php

class Search extends CI_Model {

    /**
     * @param array $where
     * @return mixed
     */
    public function get_mahasiswa(array $where)
    {
        return $this->db->get_where('mahasiswa', $where);
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function get_peminjaman_ruang(array $where)
    {
        $this->db->select('*');
        $this->db->join('lab','lab.id_lab = peminjaman_ruang.id_lab','LEFT');
        return $this->db->get_where('peminjaman_ruang', $where);
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function get_peminjaman_alat(array $where)
    {
        $this->db->select('*');
        $this->db->join('alat','alat.id_alat = peminjaman_alat.id_alat','LEFT');
        return $this->db->get_where('peminjaman_alat', $where);
    }

    /**
     * @param array $where
     * @return mixed
     */
    public function get_surat_bebas_labkom(array $where)
    {
        $this->db->select('*');
        return $this->db->get_where('surat_labkom_labkom', $where);
    }
} 
