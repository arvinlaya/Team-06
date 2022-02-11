<?php

class Choice extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getChoice($choice_id)
    {
        $query = $this->db->query("SELECT * FROM choice WHERE choice_id=" . $choice_id);
        return $query->row();
    }

    public function getChoices($question_id)
    {
        $query = $this->db->query("SELECT * FROM choice WHERE question_id=" . $question_id);
        return $query->result_array();
    }

    public function getChoiceFrequency($choice_id)
    {
        $query = $this->db->query("SELECT * FROM response WHERE answer=" . $choice_id);
        return $query->num_rows();
    }

    public function insertChoice($question_id, $choice_text, $choice_order)
    {
        $data = array(
            'question_id' => $question_id,
            'choice_text' => $choice_text,
            'choice_order' => $choice_order
        );
        $this->db->insert('choice', $data);
    }

    public function editChoice($choice_id, $toChange, $inputChange)
    {
        $this->db->where(array('choice_id' => $choice_id));
        $this->db->set($toChange, $inputChange);
        $this->db->update('choice');
    }

    public function deleteChoice($choice_id)
    {
        $this->db->delete('choice', array('choice_id' => $choice_id));
    }
}
