<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }

	public function index()
	{
		$data['title'] = "Dashboard";
        $data["barang"] = $this->Barang_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
	}
    public function tambah()
{
    if ($this->input->post()) {
        $dataInsert = [
            'kode_barang' => $this->input->post('kode'),
            'nama_barang' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'stok' => $this->input->post('stok')
        ];
        $this->Barang_model->insert($dataInsert);
        redirect('barang');
    }

    // Wajib ada!
    $data['title'] = "Tambah Barang";

    $this->load->view('templates/header', $data);
    $this->load->view('barang/tambah', $data);
    $this->load->view('templates/footer');
}

    public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'kode_barang' => $this->input->post('kode'),
                'nama_barang' => $this->input->post('nama'),
                'satuan' => $this->input->post('satuan')
            ];
            $this->Barang_model->update($id, $data);
            redirect('barang');
        }

        $data['barang'] = $this->Barang_model->getById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('barang/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->Barang_model->delete($id);
        redirect('barang');
    }
}
