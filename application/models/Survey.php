<?php

class Survey extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getSurvey($survey_id)
    {
        $query = $this->db->query("SELECT * FROM survey WHERE survey_id=" . $survey_id);
        return $query->row();
    }

    public function getSurveys($surveyor_id)
    {
        $query = $this->db->query("SELECT * FROM survey WHERE surveyor_id =" . $surveyor_id);
        return $query->result();
    }

    public function getSurveyAll()
    {
        $query = $this->db->query("SELECT * FROM survey");
        return $query->result();
    }

    public function insertSurvey($surveyor_id, $survey_title, $survey_description, $start_date, $end_date, $status, $access_code)
    {
        $data = array(
            'surveyor_id' => $surveyor_id,
            'survey_title' => $survey_title,
            'survey_description' => $survey_description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
            'access_code' => $access_code
        );
        $this->db->insert('survey', $data);
    }

    public function editSurvey($survey_id, $toChange, $inputChange)
    {
        $this->db->where(array('survey_id' => $survey_id));
        $this->db->set($toChange, $inputChange);
        $this->db->update('survey');
    }

    public function deleteSurvey($survey_id)
    {
        $this->db->delete('survey', array('survey_id' => $survey_id));
    }
}
