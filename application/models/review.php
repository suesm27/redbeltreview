<?php 
class Review extends CI_Model{
	function get_top_3_book_reviews(){
		return $this->db->query("select reviews.user_id, reviews.id, reviews.rating, reviews.review, reviews.created_at, books.id as book_id, books.title as book_title, users.name as user_name from books join reviews on books.id = reviews.book_id join users on reviews.user_id = users.id order by reviews.created_at DESC LIMIT 3;")->result_array();
	}

	function add_review($review, $rating, $book_id, $user_id){
		$query = "INSERT INTO reviews (review, rating, book_id, user_id, created_at) VALUES (?, ?, ?, ?, NOW())";
		$values = array($review, $rating, $book_id, $user_id);
		return $this->db->query($query, $values);
	}

	function delete_review($id){
		$query = "DELETE FROM reviews WHERE id = ?";
		return $this->db->query($query, array($id));
	}

	function get_review_count_by_user_id($user_id){
		$query = "select COUNT(reviews.id) as numReviews from reviews where user_id = {$user_id}";
		$result = $this->db->query($query, array($user_id))->row_array();
		return $result['numReviews'];
	}
}
?>