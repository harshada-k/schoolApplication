<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	/* List of students */
	public function index(){		
		//load session library
		$this->load->library('session');

		$data['result'] = $this->users_model->getAllStudents();		

		$this->load->view('teacher/teacher_home');
		$this->load->view('teacher/students_list',$data);
	}

	/* Add student */
	public function addStudent(){
		//load session library
		$this->load->library('session');

		/* Insert record */
		$data = [];
		if($_POST){
			$data = $this->users_model->addUser($_POST);
		}
		if($data){
			$this->session->set_flashdata('success','Student added successfully.');
			redirect('teacher/myStud');
		}

		$this->load->view('teacher/teacher_home');
		$this->load->view('teacher/students_add');
	}

	/* Edit student */
	public function editStudent($studId){
		//load session library
		$this->load->library('session');

		/* Insert record */
		$data = [];
		if($studId){
			$data['edit_data'] = $this->users_model->getStudentInfoByID($studId);
		} else {
			$this->session->set_flashdata('error','Failed to update student information.');
			redirect('teacher/myStud');
		}
		// echo "<pre>";print_r($data);die;

		$this->load->view('teacher/teacher_home');
		$this->load->view('teacher/students_add',$data);
	}

	public function teacher_home(){
		//load session library
		$this->load->library('session');

		//restrict users to go to home if not logged in
		if($this->session->userdata('teacher')){
			$this->load->view('teacher/teacher_home');
		}
		else{
			$this->session->set_flashdata('error','Invalid login. User not found');
			redirect('teacher');
		}
		
	}

	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('teacher');
		redirect('/teacher');
	}

}
