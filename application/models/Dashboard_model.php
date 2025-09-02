<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard_model extends CI_Model {
        public function get_total_patient() {
            return $this->db->count_all('patient');
        }

        public function get_recent_patient() {
            $this->db->select('name, record_number, created_at');
            $this->db->from('patient');
            $this->db->order_by('created_at', 'DESC'); // Ambil data terbaru terlebih dahulu
            $this->db->limit(5);
            return $this->db->get()->result();

            // $query = mysql_query("SELECT name, medical_record_number, created_at FROM patient ORDER BY created_at DESC 5");
            // return $this->db->get()->result();
        }

         public function get_top_icd_code() {
        $this->db->select('icd10_code, MAX(symptoms) AS icd_description, COUNT(icd10_code) as count');
        $this->db->from('patient_history');
        $this->db->where('icd10_code IS NOT NULL');
        $this->db->group_by('icd10_code');  // Gabungkan berdasarkan kode ICD
        $this->db->order_by('count', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }
    // public function get_top_icd_code_by_doctor($doctor_id) {
    //     $this->db->select('icd10_code, MAX(symptoms) AS icd_description, COUNT(icd10_code) as count');
    //     $this->db->from('patient_history');
    //     $this->db->where('doctor_id', $doctor_id);
    //     $this->db->where('icd10_code IS NOT NULL');
    //     $this->db->group_by('icd10_code');  // Gabungkan berdasarkan kode ICD
    //     $this->db->order_by('count', 'DESC');
    //     $this->db->limit(5);
    //     return $this->db->get()->result();
    // }   
}
    
?>