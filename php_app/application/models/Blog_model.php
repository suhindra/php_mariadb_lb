<?php

class Blog_model extends MY_Model {

	

	public function __construct()
	{
		parent::__construct();
	}

	public function get_blog($slug = FALSE)
	{
		if ($slug === FALSE) {
			$this->db->select('*');
		    $this->db->from('blog_posts');
		    $this->db->where('category_id', '4');
		    $query = $this->db->get();
	        return $query->result();
		}
    	$this->db->select('*');
	    $this->db->from('blog_posts');
	    $this->db->where('blog_posts.slug', $slug);
    	$query = $this->db->get();
    	return $query->row();
	}

	

	public function record_count($slug = FALSE)
	{
		if ($slug === FALSE) {
			$this->db->select('*');
		    $this->db->from('blog_posts');
			$this->db->where('category_id', '4');
			return $this->db->count_all_results();
        }
    }

    public function fetch_blog($limit, $start, $slug = FALSE)
    {
    	if ($slug === FALSE) {
			$this->db->select('*');
			$this->db->from('blog_posts');
			$this->db->where('category_id', '4');
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
