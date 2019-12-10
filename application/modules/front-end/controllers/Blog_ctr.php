<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
          $this->load->view('option/header'); 
          $this->load->view('blog');
          $this->load->view('option/footer');
    }
    
    public function blog_single()
	{
          $this->load->view('option/header'); 
          $this->load->view('blog-single');
          $this->load->view('option/footer');
	}

}
