<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminOrder_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
        $data['order'] = $this->db->get('tbl_order')->result_array();
        $this->load->view('option/header');
        $this->load->view('order',$data);
        $this->load->view('option/footer');
          
    }
    
  

}
