<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function signin_action(){
		$user = $this->User->get_user($this->input->post());
		if($user){
			$this->session->set_userdata('user_level', $user['user_level']);
			$this->session->set_userdata('LoggedIn', true);
			$this->session->set_userdata('current_user_id', $user['id']);
			$success[] = 'Login successful!';
			$this->session->set_userdata('success', $success);
			// redirect('/users/show_users');
		}
		else{
			$error[] = 'No matching record found!';
			$this->session->set_userdata('errors', $error);
			$this->signin();
		}
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function register_action()
	{
		$result = $this->User->validate($this->input->post());
		if($result == "valid") {
			$success[] = 'Registration successful!';
			$this->session->set_userdata('success', $success);
			$this->User->add_user($this->input->post());
			// redirect("/users/signin");
		} 
		else {
			$errors = array(validation_errors());
			$this->session->set_userdata('errors', $errors);
			$this->register();
		}
	}
	
	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}