<?php
class Mahasiswa_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('mahasiswa')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('mahasiswa', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('mahasiswa', ['id' => $id]);
    }
}
