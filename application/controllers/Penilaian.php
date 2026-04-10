<?php
class Penilaian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_model');
        $this->load->database();
    }

    public function index()
    {
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
        $data['penilaian'] = $this->Penilaian_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('penilaian/index', $data);
        $this->load->view('templates/footer');
    }

    private function hitung_grade($nilai)
    {
        if ($nilai >= 80) return 'A';
        elseif ($nilai >= 75) return 'B';
        elseif ($nilai >= 65) return 'C';
        elseif ($nilai >= 55) return 'D';
        else return 'E';
    }

    public function simpan()
    {
        $absen = $this->input->post('absen');
        $tugas = $this->input->post('tugas');
        $uts   = $this->input->post('uts');
        $uas   = $this->input->post('uas');

        // Hitung bobot
        $nilai_akhir =
            ($absen * 0.10) +
            ($tugas * 0.20) +
            ($uts * 0.30) +
            ($uas * 0.40);

        $grade = $this->hitung_grade($nilai_akhir);

        $data = [
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'absen' => $absen,
            'tugas' => $tugas,
            'uts' => $uts,
            'uas' => $uas,
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade
        ];

        $this->Penilaian_model->simpan($data);
        redirect('penilaian');
    }
}
