<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->library('pagination');
        $this->load->helper('date');
        
    }

    public function index($id = '')
    {
        if ($id=='') {
            $this->load->model('blog_post_model');
            $this->mViewData['recent_news'] = $this->blog_post_model->limit(5, 0)->get_all();
            $config = array();
            $config["base_url"] = base_url() . "news/halaman";
            $config["total_rows"] = $this->news_model->record_count();
            $config["per_page"] = 9;
            $config["uri_segment"] = 3;
            $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
            $config['full_tag_close'] = '</ul>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
            $config['last_link'] = '<span aria-hidden="true" class="fa fa-angle-double-right"></span>';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['first_link'] = '<span aria-hidden="true" class="fa fa-angle-double-left"></span>';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['next_link'] = '<span aria-hidden="true" class="fa fa-angle-right"></span>';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '<span aria-hidden="true" class="fa fa-angle-left"></span>';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            //pagination 1
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->mViewData["links"] = $this->pagination->create_links();

            $blog = $this->mViewData["blog"] = $this->news_model->fetch_blog($config["per_page"], $page);
            
            $this->mMetaData = array(
                'title' => 'News | AKAKOM',
                'description'   => ''
            );
            $this->mTitle = 'News | AKAKOM';
            $this->mViewData["title"] = 'News';
            $this->render('blog', 'full_width');
        }
        else{
            $this->load->model('blog_post_model');
            $this->mViewData['recent_news'] = $this->blog_post_model->limit(5, 0)->get_all();
            $this->mViewData['news'] = $this->news_model->get_blog($id);
            if(empty($this->mViewData['news'])){
                show_404();
            }
            $this->mMetaData = array(
                'title' => $this->mViewData['news']->title.' | AKAKOM',
                'description'   => character_limiter(strip_tags($this->mViewData['news']->content),150)
            );
            $this->mTitle = $this->mViewData['news']->title.' | AKAKOM';

            $this->render('news', 'full_width');
        }
    }

    public function halaman($halaman = 1)
    {
        $this->load->model('blog_post_model');
        $this->mViewData['recent_news'] = $this->blog_post_model->limit(5, 0)->get_all();
        $halaman_title = ($halaman / 9) + 1;
        $config = array();
        $config["base_url"] = base_url() . "news/halaman";
        $config["total_rows"] = $this->news_model->record_count();
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = '<span aria-hidden="true" class="fa fa-angle-double-right"></span>';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '<span aria-hidden="true" class="fa fa-angle-double-left"></span>';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['next_link'] = '<span aria-hidden="true" class="fa fa-angle-right"></span>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<span aria-hidden="true" class="fa fa-angle-left"></span>';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->mViewData["links"] = $this->pagination->create_links();

       
        $blog = $this->mViewData["blog"] = $this->news_model->fetch_blog($config["per_page"], $page);
        if(empty($this->mViewData['blog'])){
            show_404();
        }
        $this->mMetaData = array(
            'title' => 'News Page ' . $halaman_title.' | AKAKOM',
            'description'   => ''
        );
        $this->mTitle = 'News Page ' . $halaman_title.' | AKAKOM';
        $this->mViewData["title"] = 'News';
        $this->render('blog', 'full_width');
    }



}
