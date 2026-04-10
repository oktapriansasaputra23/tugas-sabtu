<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Helpdesk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helpdesk_model');
  
    }

    // LIST TIKET
    public function index()
    {
        $data['title'] = "Helpdesk Tiket";
        $data['tiket'] = $this->Helpdesk_model->get_all();

        $this->load->view('templates/header', $data);
    $this->load->view('helpdesk/index', $data);
    $this->load->view('templates/footer');
    }

    // FORM TAMBAH
    public function tambah()
    {
        $data['title'] = "Buat Tiket Baru";
        $this->template->load('template', 'helpdesk/tambah', $data);
    }

    // SIMPAN TIKET
   public function simpan()
{
    $session = $this->session->userdata('login_session');

    if (!$session) {
        redirect('auth'); // atau halaman login kamu
    }

    $kode = 'TKT-' . date('YmdHis');

    // Konfigurasi upload
  $upload_path = FCPATH . 'uploads/helpdesk/';

if (!is_dir($upload_path)) {
    mkdir($upload_path, 0777, true);
}

$config['upload_path']   = $upload_path;
$config['allowed_types'] = 'jpg|jpeg|png|pdf';
$config['max_size']      = 2048;

$this->load->library('upload', $config);


    $lampiran = null;

    if (!empty($_FILES['lampiran']['name'])) {
        if ($this->upload->do_upload('lampiran')) {
            $lampiran = $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
            die;
        }
    }

    $data = [
        'kode_tiket' => $kode,
        'id_user'    => $session['id'], // ✅ ini yang benar
        'unit'       => $this->input->post('unit', true),
        'judul'      => $this->input->post('judul', true),
        'deskripsi'  => $this->input->post('deskripsi', true),
        'prioritas'  => $this->input->post('prioritas', true),
        'status'     => 'Open',
        'lampiran'   => $lampiran
    ];

    $this->Helpdesk_model->insert($data);

    $this->session->set_flashdata('success', 'Tiket berhasil dibuat!');
    redirect('helpdesk');
}


    // UPDATE STATUS (khusus admin/IT)
   public function update_status($id)
{
    $session = $this->session->userdata('login_session');
    $status = $this->input->post('status');
    $catatan = $this->input->post('catatan');

    // update tiket
    $this->db->where('id', $id);
    $this->db->update('helpdesk_tiket', [
        'status' => $status,
        'ditangani_oleh' => $session['id'],
        'tanggal_update' => date('Y-m-d H:i:s')
    ]);

    // insert log
    $this->Helpdesk_model->add_log([
        'id_tiket' => $id,
        'keterangan' => $catatan,
        'status' => $status,
        'created_by' => $session['id']
    ]);

    redirect('helpdesk');
}

}
