<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getDep($head_id = ''){
    $query = $this->db->get_where('head_account', array('head_id' => $head_id));
    return $query->row();
  }


  public function count($column, $value,  $table){
    $this->db->like($column, $value);
    $this->db->from($table);
    return $this->db->count_all_results();
  }

  public function countC($data, $table){
    $this->db->where($data);
    $this->db->from($table);
    return $this->db->count_all_results();
  }

  public function getStd($table, $where)
  {
    $query = $this->db->get_where($table, $where);
    return $query->result_array();
  }

  public function getStdJoin($dep){
    //$this->db->select(array('etudiant.student_nom', 'etudiant.student_prenom', 'etudiant.student_id', 'std_inscription.app_dean'));
    $this->db->select('*');
    $this->db->from('etudiant');
    $this->db->join('std_sub_session', 'etudiant.student_id = std_sub_session.student_id');
    //$this->db->like('std_inscription.student_id', '10');
    $this->db->like('std_sub_session.student_id', $dep, 'after');
    $this->db->where(array(
      'std_sub_session.app_dean' => 0,
      'std_sub_session.session_id' =>23
    ));

    $query = $this->db->get();

    return $query->result_array();
  }

  public function getCours()
  {
    $query = $this->db->get_where('cours', 'semester = 1');
    return $query->result_array();
  }

  public function getOneStd($student_id){
    $query = $this->db->get_where('etudiant', array('student_id' => $student_id));
    return $query->row();
  }

  public function getStdCourse($student_id, $session){
    $query = $this->db->query('select a.id_cours, a.Sigle, a.title, a.nb_crd, a.dep_desc from cours a,
    std_subscription b where a.id_cours = b.id_cours and b.student_id = ' . $student_id . ' and b.session = ' . $session);
    // $this->db->from('cours');
    //$this->db->join('std_subscription', 'cours.id_cours = std_subscription.id_cours');
    // $this->db->where('b.student_id', $student_id);
    // $this->db->where('b.session', $session);
    // $query = $this->db->get();

    // $query = $this->db->get_where('std_subscription', array('student_id' => $student_id, 'session' => $session));
    return $query->result_array();
  }

  public function updateDepInfo($data, $id){
    $this->db->where('student_id', $id);
    $this->db->update('std_inscription', $data);
  }

  public function deleteStdCrs($id, $session){
    $this->db->delete('std_subscription', array('student_id' => $id, 'session' =>$session));
  }

  public function do_update($id, $data)
  {
    $this->db->where('head_id', $id);
    $this->db->update('head_account', $data);
  }

}
