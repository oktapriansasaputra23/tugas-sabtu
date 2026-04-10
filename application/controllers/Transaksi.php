<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
        $this->load->model(['Transaksi_model','Barang_model']);
    }

	public function index()
	{
		$data['title'] = "Dashboard";
        $data['transaksi'] = $this->Transaksi_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
	}
    public function tambah()
{
    if ($this->input->post()) {

        $id_barang = $this->input->post('id_barang');
        $jumlah    = $this->input->post('jumlah');
        $jenis     = $this->input->post('jenis');

        // Cek wajib
        if (!$id_barang || !$jumlah || !$jenis) {
            show_error("Data tidak lengkap. id_barang / jumlah / jenis kosong!");
        }

        // Insert transaksi
        $dataInsert = [
            'id_barang' => $id_barang,
            'jumlah'    => $jumlah,
            'jenis'     => $jenis,
            'tanggal'   => $this->input->post('tanggal'),
        ];
        $this->Transaksi_model->insert($dataInsert);

        // Update stok
        $this->Barang_model->updateStok($id_barang, $jumlah, $jenis);

        redirect('transaksi');
    }

    // Kirim data barang ke form
    $data['barang'] = $this->Barang_model->getAll();
    $data['title'] = "Tambah Transaksi";

    $this->load->view('templates/header', $data);
    $this->load->view('transaksi/tambah', $data);
    $this->load->view('templates/footer');
}

}
