<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	@author 	: Rindra RAZAFINJATOVO
 *	date		: 28 Fevrier, 2016
 *	UAZ System School
 *	http://www.zurcher.mg
 *	rindra.it@gmail.com
 */

class Departement extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model(array('departement_model', 'student_model'));
  }

	public function index()
	{
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

      $data['user'] = $this->session->userdata('dep_id');
      $resultat = $this->departement_model->getDep($data['user']);

      $data['countAllStd'] = $this->departement_model->count('etat', 1, 'etudiant');

      $array = array('sex' => 0, 'etat' => 1);
      $data['countMale'] = $this->departement_model->countC($array, 'etudiant');

      $array = array('sex' => 1, 'etat' => 1);
      $data['countFemale'] = $this->departement_model->countC($array, 'etudiant');

      switch ($resultat->permission) {
        case 1:
          $data['dep'] = 'Théologie';
          $dep= '10';
          $array = array('etude_envisage' => 'Théologie', 'etat' => 1);
          $data['countInscrit'] = $this->departement_model->countC('student_id like "10%" and student_session = 1', 'studentaccount');
          $data['countNInscrit'] = $this->departement_model->countC('student_id like "10%" and student_session = 0', 'studentaccount');
          break;
        case 2:
          $data['dep'] = 'Gestion';
          $array = array('etude_envisage' => 'Gestion', 'etat' => 1);
          $dep= '20';
          $data['countInscrit'] = $this->departement_model->countC('student_id like "20%" and student_session = 1', 'studentaccount');
          $data['countNInscrit'] = $this->departement_model->countC('student_id like "20%" and student_session = 0', 'studentaccount');
          break;
        case 3:
          $data['dep'] = 'Informatique';
          $array = array('etude_envisage' => 'Informatique', 'etat' => 1);
          $dep= '30';
          $data['countInscrit'] = $this->departement_model->countC('student_id like "30%" and student_session = 1', 'studentaccount');
          $data['countNInscrit'] = $this->departement_model->countC('student_id like "30%" and student_session = 0', 'studentaccount');
          break;
        case 6:
          $data['dep'] = 'Communication';
          $array = array('etude_envisage' => 'Communication', 'etat' => 1);
          $dep= '60';
          $data['countInscrit'] = $this->departement_model->countC('student_id like "60%" and student_session = 1', 'studentaccount');
          $data['countNInscrit'] = $this->departement_model->countC('student_id like "60%" and student_session = 0', 'studentaccount');
          break;
        default:
          $where = 'etat = 1';
          break;
      }

      $data['countDep'] = $this->departement_model->countC($array, 'etudiant');

      //$data['list'] = $this->departement_model->getStd('etudiant', $where);
      $data['list'] = $this->departement_model->getStdJoin($dep);

      //print_r($data['list']);

      $this->load->view('departement/static/header', $resultat);
      $this->load->view('departement/static/menu', $resultat);
      $this->load->view('departement/static/top', $resultat);
      $this->load->view('departement/dashboard', $data);
      $this->load->view('departement/static/footer', $resultat);
	}

  public function inscription()
  {
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user'] = $this->session->userdata('dep_id');
    $resultat = $this->departement_model->getDep($data['user']);

    $data['countAllStd'] = $this->departement_model->count('etat', 1, 'etudiant');

    $array = array('sex' => 0, 'etat' => 1);
    $data['countMale'] = $this->departement_model->countC($array, 'etudiant');

    $array = array('sex' => 1, 'etat' => 1);
    $data['countFemale'] = $this->departement_model->countC($array, 'etudiant');

    switch ($resultat->permission) {
      case 1:
        $data['dep'] = 'Théologie';
        $dep= '10';
        $array = array('etude_envisage' => 'Théologie', 'etat' => 1);
        $data['countInscrit'] = $this->departement_model->countC('student_id like "10%" and student_session = 1', 'studentaccount');
        $data['countNInscrit'] = $this->departement_model->countC('student_id like "10%" and student_session = 0', 'studentaccount');

        $data['countApp'] = $this->departement_model->countC('student_id like "10%" and app_dean = 1 and session_id = 23', 'std_sub_session');
        $data['countNApp'] = $this->departement_model->countC('student_id like "10%" and app_dean = 0 and session_id = 23', 'std_sub_session');
        break;
      case 2:
        $data['dep'] = 'Gestion';
        $array = array('etude_envisage' => 'Gestion', 'etat' => 1);
        $dep= '20';
        $data['countInscrit'] = $this->departement_model->countC('student_id like "20%" and student_session = 1', 'studentaccount');
        $data['countNInscrit'] = $this->departement_model->countC('student_id like "20%" and student_session = 0', 'studentaccount');

        $data['countApp'] = $this->departement_model->countC('student_id like "20%" and app_dean = 1 and session_id = 23', 'std_sub_session');
        $data['countNApp'] = $this->departement_model->countC('student_id like "20%" and app_dean = 0 and session_id = 23', 'std_sub_session');
        break;
      case 3:
        $data['dep'] = 'Informatique';
        $array = array('etude_envisage' => 'Informatique', 'etat' => 1);
        $dep= '30';
        $data['countInscrit'] = $this->departement_model->countC('student_id like "30%" and student_session = 1', 'studentaccount');
        $data['countNInscrit'] = $this->departement_model->countC('student_id like "30%" and student_session = 0', 'studentaccount');

        $data['countApp'] = $this->departement_model->countC('student_id like "30%" and app_dean = 1 and session_id = 23', 'std_sub_session');
        $data['countNApp'] = $this->departement_model->countC('student_id like "30%" and app_dean = 0 and session_id = 23', 'std_sub_session');
        break;
      case 6:
        $data['dep'] = 'Communication';
        $array = array('etude_envisage' => 'Communication', 'etat' => 1);
        $dep= '60';
        $data['countInscrit'] = $this->departement_model->countC('student_id like "60%" and student_session = 1', 'studentaccount');
        $data['countNInscrit'] = $this->departement_model->countC('student_id like "60%" and student_session = 0', 'studentaccount');

        $data['countApp'] = $this->departement_model->countC('student_id like "60%" and app_dean = 1 and session_id = 23', 'std_sub_session');
        $data['countNApp'] = $this->departement_model->countC('student_id like "60%" and app_dean = 0 and session_id = 23', 'std_sub_session');
        break;
      default:
        $where = 'etat = 1';
        break;
    }

    $data['countDep'] = $this->departement_model->countC($array, 'etudiant');

    //$data['list'] = $this->departement_model->getStd('etudiant', $where);
    $data['list'] = $this->departement_model->getStdJoin($dep);

    //print_r($data['list']);

    $this->load->view('departement/static/header', $resultat);
    $this->load->view('departement/static/menu', $resultat);
    $this->load->view('departement/static/top', $resultat);
    $this->load->view('departement/inscription', $data);
    $this->load->view('departement/static/footer', $resultat);
  }

  public function list_etudiant(){

    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user'] = $this->session->userdata('dep_id');
    $resultat = $this->departement_model->getDep($data['user']);

    switch ($resultat->permission) {
      case 1:
        $data['dep'] = 'Théologie';
        $where = 'etat = 1 and student_id like "10%"';
        break;

      case 2:
        $data['dep'] = 'Gestion';
        $where = 'etat = 1 and student_id like "20%"';
        break;

      case 3:
        $data['dep'] = 'Informatique';
        $where = 'etat = 1 and student_id like "30%"';
        break;

      case 4:
        $data['dep'] = 'Science infirmière';
        $where = 'etat = 1 and student_id like "40%"';
        break;

      case 6:
        $data['dep'] = 'Langue';
        $where = 'etat = 1 and student_id like "60%"';
        break;

      default:
        break;
    }

    $data['list'] = $this->departement_model->getStd('etudiant', $where);

    $this->load->view('departement/static/header', $resultat);
    $this->load->view('departement/static/menu', $resultat);
    $this->load->view('departement/static/top', $resultat);
    $this->load->view('departement/liste_etudiant', $data);
    $this->load->view('departement/static/footer', $resultat);
  }

  public function cours(){
    //get list of student
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['user'] = $this->session->userdata('dep_id');
    $resultat = $this->departement_model->getDep($data['user']);

    $data['list'] = $this->departement_model->getCours();
    $data['link'] = base_url() . 'index.php/departement';

    $this->load->view('departement/static/header', $resultat);
    $this->load->view('departement/static/menu', $resultat);
    $this->load->view('departement/static/top', $resultat);
    $this->load->view('departement/cours', $data);
    $this->load->view('departement/static/footer', $data);
  }

  public function checkCourse(){
    // delete all information and change it to new
    $this->departement_model->deleteStdCrs($this->input->post('student_id'), '23');

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
          'session' =>'23',
          'credit' => $final[1],
          'lab' => '0',
          'grade' => 0
        );

        //print_r($sub_data);
        //insert all information about the subjects taken
        $this->student_model->insertStdSub('std_subscription', $sub_data);

      }
    }
  }

  function popup($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student'] = $this->departement_model->getOneStd($id);
    $data['list'] = $this->departement_model->getStdCourse($id, '23');

    $this->load->view('departement/modal_student', $data);
  }

  function popupEdit($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['student'] = $this->departement_model->getOneStd($id);
    $data['std_course'] = $this->departement_model->getStdCourse($id, '23');
    $data['cours'] = $this->departement_model->getCours();

    $this->load->view('departement/modal_edit', $data);
  }

  function saveCourse(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');
  }

  function finalized($id){
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data = array(
      'app_dean' => $this->input->post('approuved')
    );

    //update the status after subscribing
    $this->departement_model->updateDepInfo($data, $id);

  }

  //PROFILE
  function profile(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

    $data['edit_data']  = $this->db->get_where('head_account', array(
            'head_id' => $this->session->userdata('dep_id')
        ))->result_array();

    $resultat = $this->departement_model->getDep($this->session->userdata('dep_id'));
    $this->load->view('departement/static/header', $resultat);
		$this->load->view('departement/static/menu', $resultat);
		$this->load->view('departement/static/top', $resultat);
		$this->load->view('departement/profile', $data);
		$this->load->view('departement/static/footer', $data);
  }

//update profile utilisateur
  function update_profile(){
    if ($this->session->userdata('dep_login') != 1)
      redirect(base_url() . 'index.php/login', 'refresh');

      $resultat = $this->departement_model->getDep($this->session->userdata('dep_id'));
      if (isset($_POST['enregistrer'])) {

          $config = array(
            'upload_path' => "./assets/uploads/head/",
            'allowed_types' => "jpg|png",
            'overwrite' => TRUE,
            'max_size' => "2048000",
            'max_height' => "4000",
            'max_width' => "4000",
            'file_name' => $this->input->post('id')
            );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
              $result_data = array('upload_data' => $this->upload->data());

              $data = array(
                'head_name' => $this->input->post('head_name'),
                'email' => $this->input->post('email'),
                'position' => $this->input->post('position'),
                'departement' => $this->input->post('departement'),
                'permission' => $this->input->post('permission')
              );

              $this->departement_model->do_update($this->session->userdata('dep_id'), $data);
              redirect(base_url() . 'index.php/departement/profile', 'refresh');
            }
            else
            {
              $error = array('error' => $this->upload->display_errors());
              //redirect(base_url() . 'index/admin/profile', 'refresh');
              //print_r($error);

              $data = array(
                'head_name' => $this->input->post('head_name'),
                'email' => $this->input->post('email'),
                'position' => $this->input->post('position'),
                'departement' => $this->input->post('departement'),
                'permission' => $this->input->post('permission')
              );

              $this->departement_model->do_update($this->session->userdata('dep_id'), $data);
              redirect(base_url() . 'index.php/departement/profile', 'refresh');
            }
        }
        else if(isset($_POST['update'])){
          $current_password = md5($this->input->post('current_password'));
          $new_password = $this->input->post('new_password');
          $confirm_password = $this->input->post('confirm_password');

          if ($current_password == $resultat->head_password && $new_password == $confirm_password)
          {
            $data = array(
              'head_password' => md5($confirm_password)
            );

            $this->departement_model->do_update($this->session->userdata('dep_id'), $data);
            redirect(base_url() . 'index.php/departement/profile', 'refresh');
          }
          else {
            redirect(base_url() . 'index.php/departement/profile', 'refresh');
          }
        }
  }


  function logout(){
    $this->session->unset_userdata('dep_login');
    $this->session->sess_destroy();
    redirect(base_url() . 'index.php/login', 'refresh');
  }

}
