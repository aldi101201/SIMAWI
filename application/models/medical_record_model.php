<?php
class Medical_record_model extends CI_Model {
    public function getAllMr() {
        return $this->db->get('patient_history')->result();
    }

    public function get_medical_record($id) {
        return $this->db->get_where('patient_history', array('Id' => $id))->row();
    }

    public function create_medical_record($data) {
        $this->db->insert('patient_history', $data);
    }

    public function updateMr($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('patient_history', $data);
    }


    public function hapusMr($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('patient_history');
    }
}