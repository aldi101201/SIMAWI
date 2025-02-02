<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_login();
        // check_role('doctor');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'User';
        $data['user'] = $this->User_model->getAllUser();
        $this->load->view('layout/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data User';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('layout/header', $data);
            $this->load->view('user/tambah_user');
            $this->load->view('layout/footer');
        }else{
            $this->userModel->tambahUser();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('user');
        }
    }

    public function hapus($id)
    {
        $this->userModel->hapusUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user');
    }

    public function detail($id)
    {
        $data['judul'] = "Detail User";
        $data['user'] = $this->userModel->getUserById($id);
        $this->load->view('layout/header', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data User';
        $data['user'] = $this->userModel->getUserById($id);
        $role = $this->userModel->getAllRole();
        $data['role'] = array_column($role, 'role');
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('layout/header', $data);
            $this->load->view('user/edit_user', $data);
            $this->load->view('layout/footer');
        }else{
            $this->userModel->ubahUser();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user');
        }
    }
}