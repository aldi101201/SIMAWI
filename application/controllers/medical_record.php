<?php
class medical_record extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('medical_record_model');
        $this->load->model('ICD10_Model');
        $this->load->library('form_validation');
    }

    public function search_icd10() {
        $query = $this->input->get('query');
        $data = $this->ICD10_Model->search_icd10($query);

        if (isset($data['error'])) {
            echo json_encode(["error" => $data['error']]);
        } else {
            $result = [];
            if (!empty($data['destinationEntities'])) {
                foreach ($data['destinationEntities'] as $entry) {
                    $result[] = [
                        'code' => $entry['code'],
                        'name' => $entry['title']
                    ];
                }
            }
            echo json_encode($result);
        }
    }

    public function check_api_connection() {
        $token = $this->ICD10_Model->get_token();
        echo "OAuth Token: " . $token;
    }

    public function index(){
        $data['judul'] = 'Rekam Medis';
        $data['patient_history'] = $this->medical_record_model->getAllMr();
        $this->load->view('layout/header', $data);
        $this->load->view('medical_record/index', $data);
        $this->load->view('layout/footer');
    }


    public function create() {
        $data['judul'] = "Tambah Rekam Medis";
        $this->load->view('layout/header', $data);
        $this->load->view('medical_records/create');
        $this->load->view('layout/footer');
    }

    public function store() {
        $data = array(
            'record_number' => $this->input->post('record_number'),
            'date_visit' => $this->input->post('date_visit'),
            'registered_by' => $this->input->post('registered_by'),
            'consultation_by' => $this->input->post('consultation_by'),
            'symptoms' => $this->input->post('symptoms'),
            'doctor_diagnose' => $this->input->post('doctor_diagnose'),
            'icd10_code' => $this->input->post('icd10_code'),
            'icd10_name' => $this->input->post('icd10_name'),
            'is_done' => $this->input->post('is_done')
        );
        $this->mrModel->create_medical_record($data);
        redirect('medical_record');
    }

    public function tambah()
    {
        $data['judul'] = 'Rekam Medis';
        $this->form_validation->set_rules('record_number', 'Record_number', 'required');
        $this->form_validation->set_rules('date_visit', 'Date_Visit', 'required');
        $this->form_validation->set_rules('registered_by', 'Registered_By', 'required');
        $this->form_validation->set_rules('consultation_by', 'Consultation_By', 'required');
        $this->form_validation->set_rules('symptoms', 'Symptoms', 'required');
        $this->form_validation->set_rules('doctor_diagnose', 'Doctor_Diagnose', 'required');
        $this->form_validation->set_rules('icd10_code', 'Icd10_Code', 'required');
        $this->form_validation->set_rules('icd10_name', 'Icd10_Name', 'required');
        $this->form_validation->set_rules('is_done', 'Is_Done', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('layout/header', $data);
            $this->load->view('medical_records/tambah');
            $this->load->view('layout/footer');
        }else{
            $this->medical_record_model->tambahMr();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('patient_history');
        }
    }

    public function hapus($id)
    {
        $this->medical_record_model->hapusMr($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('medical_record');
    }

}