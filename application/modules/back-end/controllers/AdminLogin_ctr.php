<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
       
    $this->load->view('login');
          
  }
    
  public function forgot_password()
	{
       
    $this->load->view('forgot_password');
          
  }

  public function profile()
	{
       
    $this->load->view('option/header');
    $this->load->view('profile');
    $this->load->view('option/footer');
          
  }


}
