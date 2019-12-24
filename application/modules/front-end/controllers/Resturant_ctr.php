<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resturant_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		$this->load->model('Cart_model');
		
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

		if ($this->session->userdata('email') == '') {
			redirect('Login');
		} else {
		  $resturant_id = $this->input->get('resturant_id');
		  $data['resturant'] = $this->db->get_where('tbl_restaurant',['id' => $resturant_id])->row_array();
		  $data['menu'] = $this->db->get_where('tbl_menu',['id_restaurant' => $resturant_id])->result_array();
          $this->load->view('option/header'); 
          $this->load->view('food_resturant',$data);
          $this->load->view('option/footer');
  
		}
	}


	public function order()
	{
		$data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('option/header'); 
		$this->load->view('option/header_user');
		$this->load->view('order',$data);
		$this->load->view('option/footer');
	}


	public function cart()
	{


		$id_food = $this->input->get('id'); 
		$id_cart = $this->Cart_model->Cart($id_food);
		

		$data = array(
			'id'      		=> $id_cart->id,
			'qty'     		=> 1,
			'price'   		=> $id_cart->price_menu,
			'name'    		=> $id_cart->name_menu,
			'file_name'    	=> $id_cart->file_name
	);
	
	 	$test = $this->cart->insert($data);
	

		$this->load->view('option/header'); 
		$this->load->view('option/header_user');
        $this->load->view('cart');
        $this->load->view('option/footer');
  

	}

	public function destroy_cart()
	{

		$this->cart->destroy();

	}






}
