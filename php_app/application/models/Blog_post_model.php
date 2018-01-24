<?php 

class Blog_post_model extends MY_Model {

	public $belongs_to = array(
		'category' => array(
			'model'			=> 'blog_category_model',
			'primary_key'	=> 'category_id'
		),
		'author' => array(
			'model'			=> 'admin_user_model',
			'primary_key'	=> 'author_id'
		)
	);
	
	protected $where = array('status' => 'active');
	protected $order_by = array('id', 'desc');
	protected $limit = 3;
	// Append tags
	protected function callback_after_get($result)
	{
		$this->load->model('blog_tag_model', 'tags');
		$result = parent::callback_after_get($result);

		if ( !empty($result) )
			$result->tags = $this->tags->get_by_post_id($result->id);
		
		return $result;
	}
}