<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getStd()
  {
      $query = $this->db->get('etudiant');
      return $query->result_array();
  }

  public function getCours(){
    $query = $this->db->get('cours');
    return $query->result_array();
  }

  public function getStdWhere($student_id = ''){
    $query = $this->db->get_where('etudiant', array('student_id' => $student_id));
    return $query->row();
  }


  public function insertStd($data){
    $this->db->insert('etudiant', $data);
  }

  public function updateStdInfo($data, $id){
    $this->db->where('student_id', $id);
    $this->db->update('etudiant', $data);
  }

  public function insertStdSub($table, $data){
    $this->db->insert($table, $data);
  }

  public function updateStdSession($id){
    $this->db->set('student_session', '1');
    $this->db->where('student_id', $id);
    $this->db->update('studentaccount');
  }

}
