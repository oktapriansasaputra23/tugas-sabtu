<?php
class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all();
       

           $this->load->view('templates/header', $data);
    $this->load->view('mahasiswa/index', $data);
    $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan')
        ];

        $this->Mahasiswa_model->insert($data);
        redirect('mahasiswa');
    }

    public function update()
    {
        $id = $this->input->post('id');

        $data = [
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan')
        ];

        $this->Mahasiswa_model->update($id, $data);
        redirect('mahasiswa');
    }

    public function delete($id)
    {
        $this->Mahasiswa_model->delete($id);
        redirect('mahasiswa');
    }
}
