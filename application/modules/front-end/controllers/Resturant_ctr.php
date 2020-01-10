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
			$user = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array();
			$data = array(
				'id_member'     => $this->input->post('id'),
				'id_facebook'   => null,
				'tel' 		    => $this->input->post('tel'),
				'address' 		=> $this->input->post('address'),
				'province' 		=> $this->input->post('province'),
				'amphur' 		=> $this->input->post('amphur'),
				'district' 		=> $this->input->post('district'),
				'zipcode' 		=> $this->input->post('zipcode'),
				'zip_price' 	=> $this->input->post('zip_priceValue'),
				'total' 		=> $this->cart->total(),
				'coupon' 		=> $this->input->post('coupon'),
				'lat' 		    => $this->input->post('lat'),
				'lng' 		    => $this->input->post('lng'),
				'created_at' 	=> date('Y-m-d H:i:s')
			);
		}else{
			$data = array(
				'id_member'     => 0,
				'id_facebook'   => $user_f['oauth_uid'],
				'tel' 		    => $this->input->post('tel'),
				'address' 		=> $this->input->post('address'),
				'province' 		=> $this->input->post('province'),
				'amphur' 		=> $this->input->post('amphur'),
				'district' 		=> $this->input->post('district'),
				'zipcode' 		=> $this->input->post('zipcode'),
				'zip_price' 	=> $this->input->post('zip_priceValue'),
				'total' 		=> $this->cart->total(),
				'coupon' 		=> $this->input->post('coupon'),
				'lat' 		    => $this->input->post('lat'),
				'lng' 		    => $this->input->post('lng'),
				'created_at' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->insert('tbl_order', $data);
		$id = $this->db->insert_id();
		
		foreach ($this->cart->contents() as $items)
		{
			$resturant = $this->db->get_where('tbl_restaurant',['id' => $items['id_restaurant']])->row_array();
			$data_item = array(
				'id_order' 				=> $id,
				'restaurant' 	    	=> $resturant['restaurant_name'],			
				'restaurant_address' 	=> $this->input->post('address').' '.$this->input->post('district').' '.$this->input->post('amphur').' '.$this->input->post('province').' '.$this->input->post('zipcode'),
				'restaurant_tel' 	    => $this->input->post('tel'),
				'name_item' 			=> $items['name'],
				'qty' 					=> $items['qty'],
				'price_item' 			=> $items['price'],
				'file_name' 			=> $items['file_name'],
				'sumtotal' 				=> $items['subtotal'],
				'created_at' 			=> date('Y-m-d H:i:s')
			);
			$success = $this->db->insert('tbl_order_detail', $data_item);

		}

		

		if (empty($user_f)) {
			$this->sendEmail($user['email'],$id);
			if ($this->input->post('coupon_id') > 0) {
				
				$data_cou = [
					'coupon_id'         =>$this->input->post('coupon_id'),
					'member_id'         =>$this->input->post('id'),
					'create_date'       => date('Y-m-d'),
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s')
				];
				$this->db->insert('tbl_user_coupon', $data_cou);
			}
		}else{
			$this->sendEmail($user_f['email'],$id);
			if ($this->input->post('coupon_id') > 0) {
				$data_cou = [
					'coupon_id'         =>$this->input->post('coupon_id'),
					'facebook_id'       =>$user_f['oauth_uid'],
					'create_date'       => date('Y-m-d'),
					'created_at' 		=> date('Y-m-d H:i:s'),
					'updated_at' 		=> date('Y-m-d H:i:s')
				];
				$this->db->insert('tbl_user_coupon', $data_cou);
			}
		}
		

		if ($success > 0) {
			
			$data_update = array(
				'code' => 'FD-'.date('Ymd').rand(100,999).$id 
			);
			$this->db->where('id', $id);
			$this->db->update('tbl_order', $data_update);
			
			$this->cart->destroy();
			$this->session->set_flashdata('save_ss2', 'สั่งซื้ออาหารเรียบร้อย กรุณารอไรเดอร์ของเราไปรับอาหารค่ะ !');
			$this->lineNotify();
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
		$menuDetail = $this->db->get_where('tbl_menu',['id' => $id_food])->row_array();

		$resturantCheckOpen = $this->db->get_where('tbl_restaurant',['id' => $menuDetail['id_restaurant']])->row_array();
		$current_timeMenu = date('H:i A');
		$sunriseMenu = $resturantCheckOpen['restaurant_open'];
		$sunsetMenu = $resturantCheckOpen['restaurant_close'];
		$date1Menu = DateTime::createFromFormat('H:i a', $current_timeMenu);
		$date2Menu = DateTime::createFromFormat('H:i a', $sunriseMenu);
		$date3Menu = DateTime::createFromFormat('H:i a', $sunsetMenu);

		$check = false;

		if ($date1Menu > $date2Menu && $date1Menu < $date3Menu) {
			$check = true;
		}else{
			redirect('index');
		}

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

	private function sendEmail($userEmail,$id)
	{
		$subject = 'รายการสั่งอาหารของคุณ';
		$message = 'https://deejungdelivery.com/OrderDetail?id='.$id;
		 
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
			$this->email->to($userEmail);
			$this->email->subject($subject);
			$this->email->message($message);
		  
			if($this->email->send()==true)
			{
				echo 'เข้าแล้วนะครับ';
			}
			else
			{
				echo 'ยังไม่เข้าครับ';
			}
		   
	}

	private function lineNotify()
	{
		$this->load->view('line_notify');
	}

	public function checkCoupon()
	{
		$user_f = $this->db->get_where('users', ['email' => $this->session->userData['email']])->row();
		$result = [];
		$coupon = $this->db->get_where('tbl_coupon',['code_coupon' => $this->input->get('coupon')])->row();
		if (isset($coupon)) {
			//User Facebook
			if (isset($user_f)) {
				$user_f_coupon = $this->db->get_where('tbl_user_coupon',['coupon_id' => $coupon->id,'facebook_id' => $user_f->email])->row();
				if (isset($user_f_coupon)) {
					$result['status'] = '<span style="color:red">คูปองนี้ ท่านใช้งานไปแล้วค่ะ</span>';
					$result['coupon_id'] = 0;
					$result['price'] = 0;
					$result['zip_priceValue'] = $this->input->get('zip_priceValue');
				}else{	
					$result['status'] = '<span style="color:green">คูปองนี้ สามารถใช้งานได้ค่ะ</span>';
					$result['coupon_id'] = $coupon->id;
					$result['price'] = $coupon->price;	
					$result['zip_priceValue'] = $this->input->get('zip_priceValue');
				}
			// User
			}else{
				$user_coupon = $this->db->get_where('tbl_user_coupon',['coupon_id' => $coupon->id,'member_id' => $this->input->get('user_id')])->row();
				if (isset($user_coupon)) {
					$result['status'] = '<span style="color:red">คูปองนี้ ท่านใช้งานไปแล้วค่ะ</span>';
					$result['coupon_id'] = 0;
					$result['price'] = 0;
					$result['zip_priceValue'] = $this->input->get('zip_priceValue');
				}else{
					$result['status'] = '<span style="color:green">คูปองนี้ สามารถใช้งานได้ค่ะ</span>';
					$result['coupon_id'] = $coupon->id;
					$result['price'] = $coupon->price;	
					$result['zip_priceValue'] = $this->input->get('zip_priceValue');
				}
			}
		}else{
			$result['status'] = '<span style="color:red">ไม่พบคูปองนี้ค่ะ</span>';
			$result['coupon_id'] = 0;
			$result['price'] = 0;
			$result['zip_priceValue'] = $this->input->get('zip_priceValue');
		}

		
		
		echo json_encode($result);
		
	}

	public function newTotal()
	{
		$result = [];
		if ($this->input->get('coupon') == 0) {
			$coupon = 0;
			$coupon_id = 0;
		}else{
			$coupon = $this->input->get('coupon');
			$coupon_id = $this->input->get('coupon_id');
		}
		$total = $this->cart->total() - $coupon;
		$total += $this->input->get('zip_priceValue');

		$result['total'] = number_format($total,2);
		$result['coupon'] = $coupon;
		$result['coupon_id'] = $coupon_id;
		echo json_encode($result);
	}

	public function zipPrice_value()
	{
		$zip_priceValue = $this->input->get('zip_priceValue');
		if (empty($zip_priceValue)) {
			$zip_priceValue = 0;
		}
		$total = $this->cart->total() + $zip_priceValue;
		echo number_format($total,2);

		
	}

	public function checkLatLng()
	{
		
		$lat = $this->input->get('lat');
		$lng = $this->input->get('lng');
		$adminLatLng = $this->db->get('tbl_admin')->row_array();

		$get_data = $this->callAPI('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$adminLatLng['lat'].','.$adminLatLng['lng'].'&destinations='.$lat.','.$lng.'&key=AIzaSyBXknkzDUafgeyQ3WFBEHjHQUKoHfJ-og0', false);
		$response = json_decode($get_data, true);
		$dataKm = $response['rows'][0]['elements'][0]['distance']['text'];
		$dataKmNum = $response['rows'][0]['elements'][0]['distance']['value'];
		$result = [];
		$result['dataKm'] = $dataKm;
		$result['dataKmNum'] = $dataKmNum;
		echo json_encode($result);
		
	}

	private function callAPI($method, $url, $data){
		$curl = curl_init();
	
		switch ($method){
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;
		case "PUT":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
			break;
		default:
			if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
		}
	
		// OPTIONS:
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'APIKEY: 111111111111111111111',
		'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	
		// EXECUTE:
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return $result;
	}


}
