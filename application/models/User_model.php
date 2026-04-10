<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'user';

    public function getByUsername($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row();
    }

    public function getAll()
    {
        return $this->db->get('user')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('user', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('user', ['id' => $id]);
    }


}
