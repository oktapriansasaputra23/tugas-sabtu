<?php
class Barang_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('barang')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('barang', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('barang', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('barang', ['id' => $id]);
    }

    public function updateStok($id_barang, $qty, $jenis)
    {
        if ($jenis == 'masuk') {
            $this->db->set('stok', 'stok + '.$qty, FALSE);
        } else {
            $this->db->set('stok', 'stok - '.$qty, FALSE);
        }
        return $this->db->where('id', $id_barang)->update('barang');
    }
}
