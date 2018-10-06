<?php
class User {
	private $CI;
	private $user_id = 0;
	private $username;

  	public function __construct() {
  		$this->CI =& get_instance();

		$this->CI->load->library('input');
		$this->CI->load->library('session');
  	}

  	public function login($email, $password) {
    	$user_query = $this->CI->db->query("SELECT u.* FROM user u WHERE u.user_email = '" . $this->CI->db->escape_str($email) . "' AND u.user_password = '" . $this->CI->db->escape_str(md5($password)) . "' LIMIT 1");
		$result = $user_query->result();

    	if ($user_query->num_rows) {
			$this->CI->session->set_userdata('user_id', $result[0]->id);

			$this->user_id = $result[0]->id;
			$this->username = $result[0]->user_name;
      		return true;
    	} else {
      		return false;
    	}
  	}

  	public function logout() {
		$this->CI->session->unset_userdata('user_id');

		$this->user_id = '';
		$this->username = '';

		$this->CI->session->sess_destroy();
  	}

  	public function isLogged() {
    	return $this->user_id;
  	}

  	public function getId() {
    	return $this->user_id;
  	}
  	
  	public function getUserName() {
  	    return $this->username;
  	}
}
?>