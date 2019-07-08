<?php

class Books_Model extends CI_Model
{

     public function get_books()
     {
       	$this->db->select('*');
    	$this->db->where('is_deleted', 0);
    	$query = $this->db->get('books');
    	if ($query->num_rows() > 0) {
        	return $query->result_array();
    	} else {
        	return array();
    	}
     }

     public function get_books_by_id($id)
     {
       	$this->db->select('*');
    	$this->db->where('ID', $id);
    	$query = $this->db->get('books');
    	if ($query->num_rows() > 0) {
        	return $query->result_array();
    	} else {
        	return array();
    	}
     }

}

?>