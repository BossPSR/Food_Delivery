<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resturant_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
		  $data['resturant'] = $this->db->get('tbl_restaurant')->result_array();
          $this->load->view('option/header'); 
          $this->load->view('resturant',$data);
          $this->load->view('option/footer');
  

	}

	public function food()
	{
		  $resturant_id = $this->input->get('resturant_id');
		  $data['resturant'] = $this->db->get_where('tbl_restaurant',['id' => $resturant_id])->row_array();
		  $data['menu'] = $this->db->get_where('tbl_menu',['id_restaurant' => $resturant_id])->result_array();
          $this->load->view('option/header'); 
          $this->load->view('food_resturant',$data);
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
