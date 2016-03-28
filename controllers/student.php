<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */

class Student extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('student_model');
  }

	public function index()
	{
    if ($this->session->userdata('student_login') != 1)
    {
      redirect(base_url() . 'index.php/login', 'refresh');
    }
    if ($this->session->userdata('student_login') == 1)
          redirect(base_url() . 'index.php/student/inscription', 'refresh');

	}


  function inscription($student_id = ''){
    if ($this->session->userdata('student_login') != 1 || $this->session->userdata('student_id') != $student_id)
      redirect(base_url() . 'index.php/login', 'refresh');

      $data['list'] = $this->student_model->getCours();
      $data['student'] = $this->student_model->getStdWhere($student_id);
      $data['path'] = base_url() . 'assets/images/id_card/' . $student_id . '.jpg';

      $this->load->view('student/inscription/static/header', $data);
      $this->load->view('student/inscription/static/top', $data);
      $this->load->view('student/inscription/stepTitle', $data);
      $this->load->view('student/inscription/step1', $data);
      $this->load->view('student/inscription/step2', $data);
      $this->load->view('student/inscription/step3', $data);
      $this->load->view('student/inscription/step4', $data);
      $this->load->view('student/inscription/static/footer', $data);
  }

  function finalized(){
    if ($this->session->userdata('student_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');
    $data = array(
      'student_id' => $this->input->post('student_id'),
      'student_nom' => $this->input->post('student_prenom'),
      'student_prenom' => $this->input->post('student_prenom'),
      'dateNaissance' => $this->input->post('dateNaissance'),
      'lieuNaissance' => $this->input->post('lieuNaissance'),
      'student_tel' => $this->input->post('student_tel'),
      'religion' => $this->input->post('religion'),
      'etat_civil' => $this->input->post('etat_civil'),
      'nom_conjoint' => $this->input->post('nom_conjoint'),
      'nb_enfant' => $this->input->post('nb_enfant'),
      'father_name' => $this->input->post('father_name'),
      'father_prof' => $this->input->post('father_prof'),
      'mother_name' => $this->input->post('mother_name'),
      'mother_prof' => $this->input->post('mother_prof'),
      'parent_adresse' => $this->input->post('parent_adresse'),
      'parent_tel' => $this->input->post('parent_tel'),
      'nationalite' => $this->input->post('nationalite'),
      'num_cin' => $this->input->post('num_cin'),
      'pays_origine' => $this->input->post('pays_origine'),
      'cin_date_delivre' => $this->input->post('cin_date_delivre'),
      'cin_region' => $this->input->post('cin_region'),
      'num_visa' => $this->input->post('num_visa'),
      'pers_contact_name' => $this->input->post('pers_contact_name'),
      'pers_adresse' => $this->input->post('pers_adresse'),
      'pers_tel' => $this->input->post('pers_tel'),
      'etude_envisage' => $this->input->post('etude_envisage'),
      'etude_option' => $this->input->post('etude_option'),
      'sponsor_nom' => $this->input->post('sponsor_nom'),
      'sponsor_prenom' => $this->input->post('sponsor_prenom'),
      'sponsor_tel' => $this->input->post('sponsor_tel'),
      'sponsor_adresse' => $this->input->post('sponsor_adresse'),
      'sponsor_dure_f' => $this->input->post('sponsor_dure_f'),
      'externe' => $this->input->post('endroit')
    );

    //divide the information to get the course id and its credit
    if ($this->input->post('cours') != null){
      $cours['cours'] = $this->input->post('cours');
      $test = explode(':', $cours['cours'], -1);
      // $cours['cours'] = getCours($cours['cours']);

      $count = count($test);


      for ($x = 0; $x < $count; $x++) {
        $final = explode(',', $test[$x]);

        $sub_data = array(
          'id_cours' => $final[0],
          'student_id' => $this->input->post('student_id'),
          'session_id' =>'23',
          'credit' => $final[1],
          'lab' => '0',
          'grade' => 0
        );

        $std_inscripiton = array(
          'session_id' => '23',
          'student_id' => $this->input->post('student_id')
        );

        print_r($sub_data);
        //insert all information about the subjects taken
        $this->student_model->insertStdSub('std_inscription', $sub_data);

        //update the status after subscribing
        $this->student_model->updateStdSession($this->input->post('student_id'));
      }
      //insert information about the subscription steps
      $this->student_model->insertStdSub('std_sub_session', $std_inscripiton);
    }
    //update personal information
    $this->student_model->updateStdInfo($data,  $this->input->post('student_id'));

  }


  function logout(){
    $this->session->unset_userdata('student_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
