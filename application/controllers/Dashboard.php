<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login_session')) {
            redirect('auth');
        }

        $this->load->model('Helpdesk_model');



    }

    public function index()
    {
        // $data['count_open'] = $this->Helpdesk_model->count_open();
        $data['title'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

}
