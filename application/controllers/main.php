<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Book');
		$this->load->model('Review');
		$this->load->model('Author');
	}

	public function index()
	{
		$top_reviews = $this->Review->get_top_3_book_reviews();
		$all_books = $this->Book->get_remaining_books();
		$this->load->view('show_books', array("top_reviews" => $top_reviews,
												"all_books" => $all_books));
	}

	public function add(){
		$authors = $this->Author->get_all_authors();
		$this->load->view('add', array("authors" => $authors));
	}

	public function add_new_book_and_review(){
		if($this->input->post('new_author')){
			$author_name = $this->input->post('new_author');
			$author_id = $this->Author->add_author($author_name);
		}
		else{
			$author_id = $this->input->post('author');
		}
		$book_title = $this->input->post('book_title');
		$book_id = $this->Book->add_book($book_title, $author_id);
		$this->Review->add_review($this->input->post('review'), $this->input->post('rating'), $book_id, $this->session->userdata('current_user_id'));
		redirect('/main');
	}

	public function delete_review($id, $book_id){
		$this->Review->delete_review($id);
		redirect("/main/show_book/$book_id");
	}

	public function add_review_to_book($book_id){
		$review = $this->input->post('review');
		$rating = $this->input->post('rating');
		$user_id = $this->session->userdata('current_user_id');
		$this->Review->add_review($review, $rating, $book_id, $user_id);
		redirect("/main/show_book/$book_id");
	}

	public function show_book($book_id){
		$book = $this->Book->get_book_by_id($book_id);
		$reviews = $this->Book->get_all_reviews_by_book_id($book_id);
		$this->load->view('show_book_by_id', array("reviews" => $reviews,
											"book" => $book));
	}

	public function show_user($user_id){
		$userInfo = $this->User->get_user_by_id($user_id);
		$books = $this->Book->get_all_books_by_user_id($user_id);
		$numReviews = $this->Review->get_review_count_by_user_id($user_id);
		$this->load->view('user_profile', array("numReviews" => $numReviews,
												"books" => $books,
												"userInfo" => $userInfo));
	}

}