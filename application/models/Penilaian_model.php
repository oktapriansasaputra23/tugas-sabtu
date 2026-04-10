<?php
class Penilaian_model extends CI_Model
{
    public function simpan($data)
    {
        return $this->db->insert('penilaian_mahasiswa', $data);
    }

    public function get_all()
    {
        $this->db->select('p.*, m.nama_mahasiswa,m.nim,m.jurusan');
        $this->db->from('penilaian_mahasiswa p');
        $this->db->join('mahasiswa m', 'm.id = p.id_mahasiswa');
        return $this->db->get()->result();
    }
}
