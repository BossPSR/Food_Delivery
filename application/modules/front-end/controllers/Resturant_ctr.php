<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resturant_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
 
          $this->load->view('option/header'); 
          $this->load->view('resturant');
          $this->load->view('option/footer');
  

	}

	public function food()
	{
 
          $this->load->view('option/header'); 
          $this->load->view('food_resturant');
          $this->load->view('option/footer');
  

	}

	public function order()
	{
		$data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('option/header'); 
		$this->load->view('option/header_user');
		$this->load->view('order',$data);
		$this->load->view('option/footer');
	}


}
