<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
  }
  
	public function index()
	{
		$this->cart->destroy();
		$data['resturant'] = $this->db->get('tbl_restaurant')->result_array();
		$data['menu'] = $this->db->get('tbl_menu')->result_array();
		$data['promotion'] = $this->db->get('tbl_promotion')->result_array();
		$data['contact_comment'] = $this->db->get('tbl_contact')->result_array();
		
		
        $this->load->view('option/header'); 
        $this->load->view('index',$data);
        $this->load->view('option/footer');
  

	}

	public function coming_soon()
	{
		

        $this->load->view('coming_soon');

  

	}


}
