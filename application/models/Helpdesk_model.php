<?php
class Helpdesk_model extends CI_Model {

   public function get_all()
{
    $session = $this->session->userdata('login_session');

    $this->db->select('t.*, u.name as pelapor, it.name as nama_it');
    $this->db->from('helpdesk_tiket t');
    $this->db->join('users u', 'u.id = t.id_user', 'left');
    $this->db->join('users it', 'it.id = t.ditangani_oleh', 'left');

    // 🔒 Kalau bukan admin → hanya lihat tiket miliknya
    if ($session['role'] != 'admin') {
        $this->db->where('t.id_user', $session['id']);
    }

    $this->db->order_by('t.tanggal_buat','DESC');

    return $this->db->get()->result();
}


public function add_log($data)
{
    return $this->db->insert('helpdesk_tiket_log', $data);
}

public function get_log($id_tiket)
{
    $this->db->select('l.*, u.name');
    $this->db->from('helpdesk_tiket_log l');
    $this->db->join('users u', 'u.id = l.created_by', 'left');
    $this->db->where('id_tiket', $id_tiket);
    $this->db->order_by('created_at','ASC');
    return $this->db->get()->result();
}

public function count_open()
{
    $session = $this->session->userdata('login_session');

    // Kalau bukan admin → jangan tampilkan apa-apa
    if ($session['role'] != 'admin') {
        return 0;
    }

    return $this->db
                ->where('status','Open')
                ->count_all_results('helpdesk_tiket');
}


    public function insert($data)
    {
        return $this->db->insert('helpdesk_tiket', $data);
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('helpdesk_tiket', [
            'status' => $status,
            'tanggal_update' => date('Y-m-d H:i:s')
        ]);
    }
}
