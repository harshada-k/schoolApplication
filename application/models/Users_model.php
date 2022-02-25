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

	}
?>