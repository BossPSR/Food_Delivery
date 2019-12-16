<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBlog_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function promotion()
	{
       
        $this->load->view('option/header');
        $this->load->view('promotion');
        $this->load->view('option/footer');
          
    }

    public function add_promotion()
	{
       
        $this->load->view('option/header');
        $this->load->view('add_promotion');
        $this->load->view('option/footer');
          
    }

    public function comment()
	{
       
        $this->load->view('option/header');
        $this->load->view('comment');
        $this->load->view('option/footer');
          
    }
    
  

}
