<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
          $data['promotion'] = $this->db->get('tbl_promotion')->result_array();
          $this->cart->destroy();
          $this->load->view('option/header'); 
          $this->load->view('promotion',$data);
          $this->load->view('option/footer');
    }
    
    public function promotion_single()
	{
          $id = $this->input->get('id');
          $data['promotion'] = $this->db->get_where('tbl_promotion',['id' => $id])->row_array();
          $this->cart->destroy();
          $this->load->view('option/header'); 
          $this->load->view('promotion-single',$data);
          $this->load->view('option/footer');
	}

}
