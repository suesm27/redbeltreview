<?php 
class User extends CI_Model{
	function get_all_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function get_user($post)
	{
		$email = $post['email'];
		$password = $post['password'];
		$time = $this->db->query("SELECT created_at FROM users WHERE email = ?", array($email))->row_array();
		$encrypted_password = md5($time['created_at'].$password);
		return $this->db->query("SELECT * FROM users WHERE email = ? and password = ?", array($email, $encrypted_password))->row_array();
	}

	function get_user_by_id($id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}

	function add_user($user)
	{
		if($this->get_all_users()){
			$user_level = 0;
		}
		else{
			$user_level = 9;
		}
		date_default_timezone_set("America/Los_Angeles");
		$t = time();
		$now = date("Y-m-d H:i:s",$t);
		$encrypted_password = md5($now.$user['password']);
		$query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($user['first_name'], $user['last_name'], $user['email'], $encrypted_password, $user_level, $now, $now); 
		return $this->db->query($query, $values);
	} 

	function delete_user_by_id($user_id)
	{
		$this->db->query("DELETE FROM comments WHERE comments.user_id = ?", array($user_id));
		
		$result = $this->db->query("SELECT posts.id FROM posts WHERE posts.user_id = ?", array($user_id))->result_array(); 
		foreach($result as $r){
			foreach($r as $key=>$value){
				$this->db->query("DELETE FROM comments WHERE comments.post_id = ?", array($value));	
			}
		}
		$this->db->query("DELETE FROM posts WHERE posts.user_id = ?", array($user_id));
		return $this->db->query("DELETE FROM users WHERE id = ?", $user_id);	
	}
	
	function update_user($user_id, $info)
	{
		$userInfo = $this->get_user_by_id($user_id);
		foreach($info as $key => $value){
			$userInfo[$key] = $info[$key];
		}
		$time = $this->db->query("SELECT created_at FROM users WHERE id = ?", array($user_id))->row_array();
		if(array_key_exists('password', $info)){
			$encrypted_password = md5($time['created_at'].$userInfo['password']);
		}
		else{
			$encrypted_password = $userInfo['password'];
		}
		$query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, description = ?, user_level = ?, password = ?, updated_at = NOW() WHERE id = ?";
		$values = array($userInfo['first_name'], $userInfo['last_name'], $userInfo['email'], $userInfo['description'], $userInfo['user_level'], $encrypted_password, $userInfo['id']);
		return $this->db->query($query, $values);
	}

	function validate($post){
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|max_length[45]|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|max_length[45]|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[255]|is_unique[users.email]');
		$this->form_validation->set_message('email', 'The email has been registered by another user!');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}

	function validate_basic($post){
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|max_length[45]|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|max_length[45]}required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}

	function validate_password($post){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}
	function validate_description($post){
		$this->form_validation->set_rules('description', 'Description', 'trim|max_length[255]|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}
}
?>