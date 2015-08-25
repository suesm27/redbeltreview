<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Post');
		$this->load->model('Comment');
	}

	public function index()
	{
		$this->load->view('home');
	}
}