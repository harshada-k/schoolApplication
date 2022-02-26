<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function login($email, $password,$role){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password, 'role' => $role));
			return $query->row_array();
		}

		/* Add user */
		public function addUser($post){
			// echo "<pre>";print_r($post);die;
			if(!empty($post)){
				$data = array(
			        'email'		=>isset($post['txt_stud_email']) ? $post['txt_stud_email'] : "",
			        'password'	=>isset($post['txt_stud_pass']) ? $post['txt_stud_pass'] : "",
			        'fname'		=>isset($post['txt_stud_name']) ? $post['txt_stud_name'] : "",
			        'role'		=>'student',
			        'address'	=>isset($post['txt_stud_address']) ? $post['txt_stud_address'] : "",
			        'mark'		=>isset($post['txt_stud_mark']) ? $post['txt_stud_mark'] : 0,
			        'assigned_teacher_id'=>isset($post['txt_stud_teacher_assign']) ? $post['txt_stud_teacher_assign'] : "",
			    );

				if(isset($post['hid_stud_id']))
				{
					$this->db->where('id', $post['hid_stud_id']);
					$this->db->update('users',$data);
				} else {
			    	$this->db->insert('users',$data);
			    }
			}
			return true;
		}

		/* Get all student */
		public function getAllStudents(){
				$query = $this->db->query("SELECT * FROM `users` WHERE `is_deleted` =0 AND `role` = 'student'");
				return $query->result_array();
		}

		/* Get student information by its ID  */
		public function getStudentInfoByID($studId){
				$query = $this->db->query("SELECT * FROM `users` WHERE `is_deleted` =0 AND `role` = 'student' AND id = ".$studId);
				return $query->row_array();
		}

		/* Get teacher name  */
		public function getTeachers($studId){
				$query = $this->db->query("SELECT * FROM `users` WHERE `is_deleted` =0 AND `role` = 'teacher' AND fname like '{$_GET['term']}%'");
				return $query->row_array();
		}
	}
?>