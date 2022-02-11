<?php

class Question extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getQuestion($id)
    {
        $query = $this->db->query("SELECT * FROM question WHERE question_id=" . $id);
        return $query->row();
    }

    public function getQuestions($survey_id)
    {
        $query = $this->db->query("SELECT * FROM question WHERE survey_id=" . $survey_id);
        return $query->result_array();
    }

    public function insertQuestion($survey_id, $question_type, $question_text, $question_order)
    {
        $data = array(
            'survey_id' => $survey_id,
            'question_type' => $question_type,
            'question_text' => $question_text,
            'question_order' => $question_order
        );

        $this->db->insert("question", $data);
    }

    public function editQuestion($id, $toChange, $inputChange)
    {
        $this->db->where(array('question_id' => $id));

        $this->db->set($toChange, $inputChange);

        $this->db->update('question');
    }

    public function deleteQuestion($survey_id)
    {
        $query = $this->db->query("DELETE FROM question WHERE survey_id=" . $survey_id);
    }
}
