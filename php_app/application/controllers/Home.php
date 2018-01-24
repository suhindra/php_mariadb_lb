<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{
		$this->load->model('cover_photo_model');
		$this->load->model('blog_post_model');
		$this->mViewData['slider'] = $this->cover_photo_model->get_all();
		$this->mViewData['blog'] = $this->blog_post_model->limit(3, 0)->get_all();
		$this->mMetaData = array(
			'title' => 'Akakom',
			'description'	=> 'Akakom'
		);
		$this->mTitle = 'Akakom';
		$this->render('home', 'full_width');
	}
}
