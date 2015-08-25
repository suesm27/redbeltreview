<?php 
class Book extends CI_Model{
	function get_all_books(){
		return $this->db->query("SELECT * FROM books")->result_array();
	}

	function get_remaining_books(){
		$top_3_books = $this->db->query("select books.title from books join reviews on books.id = reviews.book_id join users on reviews.user_id = users.id order by reviews.created_at DESC limit 3;")->result_array();
		$query = "select * from reviews join books on reviews.book_id = books.id where title NOT in (?, ?, ?) group by books.id";
		$newArray = array();
		foreach($top_3_books as $book){
			array_push($newArray, $book['title']);
		}
		return $this->db->query($query, $newArray)->result_array();
	}

	function get_book_by_id($book_id){
		return $this->db->query("SELECT books.id, books.title, authors.name as author_name  FROM books JOIN authors on books.author_id = authors.id WHERE books.id = ?", array($book_id))->row_array();
	}

	function add_book($book_title, $author_id)
	{
		$query = "INSERT INTO books (title, author_id) VALUES (?,?)";
		$values = array($book_title, $author_id); 
		$this->db->query($query, $values);
		$book_id = $this->db->insert_id();
		return $book_id;
	}

	function get_all_reviews_by_book_id($book_id){
		return $this->db->query("SELECT reviews.id as review_id, books.title, books.author_id, reviews.review, reviews.rating, reviews.created_at, books.id as book_id, users.id as user_id, users.name, users.alias, users.email FROM books JOIN reviews on books.id = reviews.book_id JOIN users on reviews.user_id = users.id WHERE books.id = ?", array($book_id))->result_array();
	}

	function get_all_books_by_user_id($user_id){
		return $this->db->query("SELECT * FROM books JOIN reviews on books.id = reviews.book_id where reviews.user_id = ? group by books.id", array($user_id))->result_array();
	}
}
?>