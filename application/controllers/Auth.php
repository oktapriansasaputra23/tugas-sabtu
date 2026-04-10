<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['form_validation','session']);
    }

    public function index()
    {
        if ($this->session->userdata('login_session')) {
            redirect('dashboard');
        }

        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
            return;
        }

        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        // ambil user dari database
        $user = $this->User_model->getByUsername($username);

        if (!$user) {
            $this->session->set_flashdata('error','Username tidak ditemukan');
            redirect('auth');
        }

        // cek password hash
        if (password_verify($password, $user->password)) {

            $session = [
                'id'        => $user->id,
                'username'  => $user->username,
                'name'      => $user->name,
                'email'     => $user->email,
                'role'      => $user->role,
                'logged_in' => true
            ];

            $this->session->set_userdata('login_session', $session);

            redirect('dashboard');

        } else {

            $this->session->set_flashdata('error','Password salah');
            redirect('auth');

        }
    }


    public function create_admin()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'name'     => 'Administrator',
            'email'    => 'admin@mail.com',
            'role'     => 'admin'
        ];

        $cek = $this->db->get_where('user',['username'=>'admin'])->row();

        if ($cek) {
            $this->db->where('username','admin')->update('user',$data);
            echo "Admin diperbarui";
        } else {
            $this->db->insert('user',$data);
            echo "Admin dibuat";
        }

        echo "<br>Username: admin";
        echo "<br>Password: admin123";
    }


    public function logout()
    {
        $this->session->unset_userdata('login_session');
        redirect('auth');
    }

}