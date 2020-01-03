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
		  $this->cart->destroy();
          $this->load->view('option/header'); 
          $this->load->view('resturant',$data);
          $this->load->view('option/footer');
	}

	public function food()
	{

		if ($this->session->userdata('email') != '' || $this->session->userData['email'] != '') {
		  $data['user'] = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
		  $resturant_id = $this->input->get('resturant_id');
		  $data['resturant'] = $this->db->get_where('tbl_restaurant',['id' => $resturant_id])->row_array();
		  $data['menu'] = $this->db->get_where('tbl_menu',['id_restaurant' => $resturant_id])->result_array();
          $this->load->view('option/header'); 
          $this->load->view('food_resturant',$data);
          $this->load->view('option/footer');
		} else {

			redirect('user_authentication');

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
			$this->load->view('option/header'); 
			$this->load->view('option/header_user');
			$this->load->view('cart');
			$this->load->view('option/footer');
		
	}

	public function save_cart()
	{
		$user_f = $this->db->get_where('users', ['email' => $this->session->userData['email']])->row_array();
		if (empty($user_f)) {
			$user_f = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
			$data = array(
				'id_member'     => $this->input->post('id'),
				'id_facebook'   => "",
				'address' 		=> $this->input->post('address'),
				'province' 		=> $this->input->post('province'),
				'amphur' 		=> $this->input->post('amphur'),
				'district' 		=> $this->input->post('district'),
				'zipcode' 		=> $this->input->post('zipcode'),
				'zip_price' 	=> '15',
				'total' 		=> $this->cart->total() + 15 ,
				'created_at' 	=> date('Y-m-d H:i:s')
			);
		}else{
			$data = array(
				'id_member'     => 0,
				'id_facebook'   => $user_f['oauth_uid'],
				'address' 		=> $this->input->post('address'),
				'province' 		=> $this->input->post('province'),
				'amphur' 		=> $this->input->post('amphur'),
				'district' 		=> $this->input->post('district'),
				'zipcode' 		=> $this->input->post('zipcode'),
				'zip_price' 	=> '15',
				'total' 		=> $this->cart->total() + 15 ,
				'created_at' 	=> date('Y-m-d H:i:s')
			);
		}
		
		$this->db->insert('tbl_order', $data);
		$id = $this->db->insert_id();
		
		foreach ($this->cart->contents() as $items)
		{
			$data_item = array(
				'id_order' 			=> $id,
				'id_restaurant' 	=> $items['id_restaurant'],
				'name_item' 		=> $items['name'],
				'qty' 				=> $items['qty'],
				'price_item' 		=> $items['price'],
				'file_name' 		=> $items['file_name'],
				'sumtotal' 			=> $this->cart->format_number($items['subtotal']),
				'created_at' 		=> date('Y-m-d H:i:s')
			);
			$success = $this->db->insert('tbl_order_detail', $data_item);

		}

			//config email settings
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'smtp.gmail.com';
			$config['smtp_port'] = '587';
			$config['smtp_user'] = 'deejungd@deejungdelivery.com';
			$config['smtp_pass'] = '1@dvlsrPY24';  //sender's password
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = 'TRUE';
			$config['smtp_crypto'] = 'tls';
			$config['newline'] = "\r\n";
	 
		//$file_path = 'uploads/' . $file_name;
		   $this->load->library('email', $config);
		   $this->email->set_newline("\r\n");
		   $this->email->from('deejungd@deejungdelivery.com');
		   $this->email->to($user_f['email']);
		   $this->email->subject($subject);
		   $this->email->message($message);
		

		if ($success > 0) {
			
			$data_update = array(
				'code' => 'FD-'.date('Ymd').rand(100,999).$id 
			);
			$this->db->where('id', $id);
			$this->db->update('tbl_order', $data_update);
			
			$this->cart->destroy();
			$this->session->set_flashdata('save_ss2', 'สั่งซื้ออาหารเรียบร้อย กรุณารอไรเดอร์ของเราไปรับอาหารค่ะ !');
			redirect('OrderList');
		}
		else
		{
			$this->cart->destroy();
			$this->session->set_flashdata('del_ss2', 'ไม่สามารถสั่งอาหารได้ กรุณาลองอีกครั้ง!!');
			redirect('OrderList');
		}
		
		
	}


	public function delet_cart()
	{
		$rowid = $this->input->get('rowid');
		$this->cart->update(array('rowid' => $rowid , 'qty' => 0));
		redirect('Cart');
	}

	public function destroy_cart()
	{
		$this->cart->destroy();
		redirect('index');
	}


	// Boss

	public function add_cart()
	{
		$id_food = $this->input->get('id');
		$id_cart = $this->Cart_model->Cart($id_food);
		
			$data = array(
				'id'      			=> $id_cart->id,
				'qty'     			=> 1,
				'price'   			=> $id_cart->price_menu,
				'name'    			=> $id_cart->name_menu,
				'file_name'    		=> $id_cart->file_name,
				'id_restaurant'    	=> $id_cart->id_restaurant
			);
		
			$this->cart->insert($data);
			redirect('Cart');
	}

	public function update_cart()
	{
		// print_r($_POST);
		// die();
		$type = $this->input->post('type');
		$amount = $this->input->post('amount');
		$row_id = $this->input->post('row_id');
		$price = $this->input->post('price');
		if ($type == 'minus') {
			if ($amount <= 1) {
				$amount = 1;
			}else{
				$amount = $amount - 1;
			}
		}

		if ($type == 'plus') {
			$amount = $amount + 1;
		}

		$data = array(
			'rowid' => $row_id,
			'qty'   => $amount
		);
		
		$this->cart->update($data);
		$result = [];
		$result['status'] = "success";
		$result['amount'] = $amount;
		$result['sub_total'] = number_format($price * $amount,2);
		echo json_encode($result);

	}

	public function total_cart_item()
	{
		echo $this->cart->total_items();
	}

	public function total_cart()
	{
		echo number_format($this->cart->total(),2);
	}

}
