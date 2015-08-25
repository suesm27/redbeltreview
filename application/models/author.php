<?php 
class Author extends CI_Model{
	function get_all_authors(){
		return $this->db->query("SELECT * FROM authors")->result_array();
	}

	function add_author($name)
	{
		$query = "INSERT INTO authors (name) VALUES (?)";
		$this->db->query($query, array($name));
		$author_id = $this->db->insert_id();
		return $author_id;
	}
}
?>