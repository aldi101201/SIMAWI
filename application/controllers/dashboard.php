<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function index() {
        $this->load->model('Dashboard_model');
    
        $data['recent_patient'] = $this->Dashboard_model->get_recent_patient();
        $data['top_icd_code'] = $this->Dashboard_model->get_top_icd_code();
    
        $this->load->view('dashboard/dashboard', $data);
    }
    
}