<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	public function index(){
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		// echo "<pre>";print_r($this->session->userdata('teacher'));die;
		if($this->session->userdata('teacher')){
			redirect('teacher/teacher_home');
		}
		else{
			$this->load->view('teacher/login_page');
		}
	}

	public function login(){
		//load session library
		$this->load->library('session');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $this->users_model->login($email, $password,'teacher');

		if($data){
			$this->session->set_userdata('teacher', $data);
			redirect('teacher/teacher_home');
		}
		else{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Invalid login. User not found');
			redirect('teacher/teacher_home');
		} 
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
