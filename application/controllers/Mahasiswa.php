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
            'jurusan' => $this->input->post('jurusan'),
            'matakuliah' => $this->input->post('matakuliah'),
            'kelas' => $this->input->post('kelas')
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
            'jurusan' => $this->input->post('jurusan'),
            'matakuliah' => $this->input->post('matakuliah'),
            'kelas' => $this->input->post('kelas')
        ];

        $this->Mahasiswa_model->update($id, $data);
        redirect('mahasiswa');
    }

    public function delete($id)
    {
        $this->Mahasiswa_model->delete($id);
        redirect('mahasiswa');
    }

    public function import_excel()
{

$this->load->library('excel');

$file = $_FILES['file_excel']['tmp_name'];

$objPHPExcel = PHPExcel_IOFactory::load($file);

$data_excel = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

$data = [];

$no = 1;

foreach ($data_excel as $row)
{

if($no == 1)
{
$no++;
continue;
}

$data[] = [

'nim' => $row['A'],
'nama_mahasiswa' => $row['B'],
'jurusan' => $row['C'],
'matakuliah' => $row['D'],
'kelas' => $row['E']

];

}

// $this->Mahasiswa_model->insert_batch($data);
        $this->Mahasiswa_model->insert($data);



redirect('mahasiswa');

}
}
