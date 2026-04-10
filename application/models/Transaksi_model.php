<?php
class Transaksi_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('transaksi', $data);
    }

    public function getAll()
    {
        $this->db->select('transaksi.*, barang.nama_barang, barang.kode_barang, barang.stok, barang.satuan');
        $this->db->from('transaksi');
        $this->db->join('barang', 'barang.id = transaksi.id_barang');
        return $this->db->get()->result();
    }
}
