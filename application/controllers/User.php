<?php
// ======================
// CONTROLLER: User.php
// ======================

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "User Management";
        $data['users'] = $this->User_model->getAll();
        $this->load->view('templates/header');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/add');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'name'     => $this->input->post('name', true),
                'email'    => $this->input->post('email', true),
                'role'     => $this->input->post('role', true)
            ];
            
            $this->User_model->insert($data);
            redirect('user');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->User_model->getById($id);

        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $update = [
                'username' => $this->input->post('username', true),
                'name'     => $this->input->post('name', true),
                'email'    => $this->input->post('email', true),
                'role'     => $this->input->post('role', true)
            ];

            if ($this->input->post('password')) {
                $update['password'] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            }

            $this->User_model->update($id, $update);
            redirect('user');
        }
    }

    public function delete($id)
    {
        $this->User_model->delete($id);
        redirect('user');
    }
}
