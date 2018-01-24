<?php

class News_model extends MY_Model {

	

	public function __construct()
	{
		parent::__construct();
	}

	public function get_blog($id = FALSE)
	{
		if ($id === FALSE) {
			$this->db->select('*');
		    $this->db->from('blog_posts');
		    $this->db->where('category_id !=', '7');
		    $this->db->where('status', 'active');
		    $query = $this->db->get();
	        return $query->result();
		}
    	$this->db->select('*');
	    $this->db->from('blog_posts');
	    $this->db->where('blog_posts.id', $id);
    	$query = $this->db->get();
    	return $query->row();
	}

	

	public function record_count($id = FALSE)
	{
		if ($id === FALSE) {
			$this->db->select('*');
		    $this->db->from('blog_posts');
			$this->db->where('category_id !=', '7');
			$this->db->where('status', 'active');
			return $this->db->count_all_results();
        }
    }

    public function fetch_blog($limit, $start, $id = FALSE)
    {
    	if ($id === FALSE) {
			$this->db->select('*');
			$this->db->from('blog_posts');
			$this->db->where('category_id !=', '7');
			$this->db->where('status', 'active');
			$this->db->order_by('id', 'desc');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
        }

        return false;
    }

}
