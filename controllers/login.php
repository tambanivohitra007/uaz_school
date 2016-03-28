<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /*
   *	@author 	: Rindra RAZAFINJATOVO
   *	date		: 28 Fevrier, 2016
   *	UAZ System School
   *	http://www.zurcher.mg
   *	rindra.it@gmail.com
   */

  class Login extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      //Codeigniter : Write Less Do More

      $this->load->model(array('student_model', 'login_model'));
      $this->load->library('form_validation');
    }

    function index()
    {
      if ($this->session->userdata('admin_login') != 1)
      {
        $data['error'] = false;
        $this->load->view('login', $data);
      }
      if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php/admin', 'refresh');
    }

    function validate(){
      $permission = $this->input->post('permission');
      $username = $this->input->post('username');

      if ($permission == 1) {
        $password = md5($this->input->post('password'));
        $query = $this->login_model->check($username, $password);
      }
      else if ($permission == 2) {
        $password = $this->input->post('password');
        $query = $this->login_model->checkStd($username, $password);
      }
      else if ($permission == 3) {
        $password = md5($this->input->post('password'));
        $query = $this->login_model->checkDep($username, $password);
      }
      else {
        $password = $this->input->post('password');
        $query = $this->login_model->check($username, $password);
      }

      if ($query == NULL) {
        $data['error'] = true;
        $this->load->view('login', $data);
      }
      else {
        switch ($permission) {
          case '1':
            # code...
            $data['error'] = false;
            $name = $query->fullName;
            $pseudo = $query->username;
            $id = $query->id;

            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_name', $name);
            $this->session->set_userdata('admin_username', $pseudo);
            $this->session->set_userdata('admin_id', $id);

            redirect(base_url() . 'index.php/admin', 'refresh');
            break;

          case '2':
            $data['error'] = false;

            $check = $this->login_model->checkPermission($username);

            if ($check->student_session == 0) {
              $this->session->set_userdata('student_login', '1');
              $this->session->set_userdata('student_id', $username);
              redirect(base_url() . 'index.php/student/inscription/' . $username, 'refresh');
            }
            else redirect(base_url());

            break;

          case '3':
          $data['error'] = false;

          $this->session->set_userdata('dep_login', '1');
          $this->session->set_userdata('dep_id', $username);
          redirect(base_url() . 'index.php/departement', 'refresh');
          break;

          default:
            # code...
            break;
        }

      }
    }

      function dashboard(){
        $data['list'] = $this->student_model->getStd();
        $data['link'] = base_url() . 'index.php/admin/detail/';

    		$this->load->view('Static/header');
    		$this->load->view('Static/menu');
    		$this->load->view('Static/top');
    		$this->load->view('admin/liste', $data);
    		$this->load->view('Static/footer');
      }
  }
 ?>
