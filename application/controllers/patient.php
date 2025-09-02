<?php 

class patient extends CI_Controller 
{
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Patient';
        $data['patient'] = $this->Patient_model->getAllPatient();
        $this->load->view('layout/header', $data);
        $this->load->view('patient/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Registrasi Pasien';
        
        $this->form_validation->set_rules('record_number', 'Record_Number', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('birth', 'Birth', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('blood_type', 'Blood_Type', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required');
        $this->form_validation->set_rules('height', 'Height', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('layout/header', $data);
            $this->load->view('patient/tambah_patient');
            $this->load->view('layout/footer');
        }else{
            $this->Patient_model->tambah_patient();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('patient');
        }
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Pasien";
        $data['patient'] = $this->Patient_model->getPatientById($id);
        $this->load->view('layout/header', $data);
        $this->load->view('patient/detail', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data Pasien';
        $data['patient'] = $this->Patient_model->getPatientById($id);
        
        $this->form_validation->set_rules('record_number', 'Record_Number', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('birth', 'Birth', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('blood_type', 'Blood_Type', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required');
        $this->form_validation->set_rules('height', 'Height', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('layout/header', $data);
            $this->load->view('patient/edit_patient', $data);
            $this->load->view('layout/footer');
        }else{
            $this->Patient_model->ubah_patient();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('patient');
        }
    }

    public function hapus($id)
    {
        $this->Patient_model->hapus_patient($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('patient');
    }

}