<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTypeFood_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
       
        $this->load->view('option/header');
        $this->load->view('type_food');
        $this->load->view('option/footer');
          
    }
    
  

}
