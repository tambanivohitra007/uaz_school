<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function check($username, $password){
    $query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
    return $query->row();
  }

  public function checkStd($id, $password){
    $query = $this->db->get_where('studentaccount', array('student_id' => $id, 'student_password' => $password));
    return $query->row();
  }

  public function checkDep($id, $password){
    $query = $this->db->get_where('head_account', array('head_id' => $id, 'head_password' => $password));
    return $query->row();
  }

  public function getStd($id){
    $query = $this->db->get_where('etudiant', array('student_id' => $id));
    return $query->row();
  }

  public function checkPermission($id){
    $query = $this->db->get_where('studentaccount', array('student_id'=> $id));
    return $query->row();
  }

}
