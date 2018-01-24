<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'CI Bootstrap 3',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
		),
		'foot'	=> array(
			'assets/dist/frontend/js/modernizr.js',
			'https://code.jquery.com/jquery-1.12.4.js',
			'assets/dist/frontend/js/bootstrap.min.js',
			'assets/dist/frontend/js/owl.carousel.min.js',
			'assets/dist/frontend/js/script.js',
		    'assets/dist/frontend/js/royalslider/jquery.royalslider.min.js',  
		    'assets/dist/frontend/js/responsiveslides/responsiveslides.js',
		    'assets/dist/frontend/js/main.js',  
		    'assets/dist/frontend/js/sliders.js', 
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/frontend/stylesheets/bootstrap.css',
			'assets/dist/frontend/stylesheets/font-awesome.css',
			'assets/dist/frontend/stylesheets/medical.css',
			'assets/dist/frontend/stylesheets/owl.carousel.css',
			'assets/dist/frontend/stylesheets/owl.theme.css',
			'assets/dist/frontend/stylesheets/global.css',
		    'assets/dist/frontend/js/royalslider/royalslider.css',
		    'assets/dist/frontend/js/royalslider/skins/minimal-white/rs-minimal-white.css',
		    'https://fonts.googleapis.com/css?family=Muli',
		    'assets/dist/frontend/stylesheets/style.css',
		    'assets/dist/frontend/css/style.css',
		)
	),

	// Default CSS class for <body> tag
	'body_class' => 'front',
	
	

	// Google Analytics User ID
	'ga_id' => '',

	// Menu items
	'menu' => array(),

	// Login page
	'login_url' => '',

	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
		'from_email'		=> '',
		'from_name'			=> '',
		'subject_prefix'	=> '',
		
		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';