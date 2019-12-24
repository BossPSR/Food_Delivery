<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		$this->load->model('Login_model');
    }
  
	public function index()
	{
		
        $this->load->view('option/header'); 
        $this->load->view('register');
        $this->load->view('option/footer');
  

	}

	public function register_success()
	{
		$first_name          = $this->input->post('first_name');
		$last_name           = $this->input->post('last_name');
		$tel                 = $this->input->post('tel');
		$email               = $this->input->post('email');
		$c_password          = $this->input->post('c_password');
		$password            = $this->input->post('password');
		$created_at          = date('Y-m-d H:i:s');
		$username_check      = $this->Login_model->check_usre($email);

		if ($username_check) {
			echo "<script>";
			echo "alert('ขออภัย Email  นี้มีผู้อื่นใช้แล้ว กรุณาลองใหม่อีกครั้ง !!!');";
			echo "window.location='register';";
			echo "</script>";
		} else {
			if ($password != $c_password) {
				echo "<script>";
				echo "alert('กรุณากรอกรหัสผ่านให้ตรงกัน กรุณาลองใหม่อีกครั้ง !!!');";
				echo "window.location='register';";
				echo "</script>";
			} else {
				$data = array(
					'first_name'        => $first_name,
					'last_name'         => $last_name,
					'tel'               => $tel,
					'email'             => $email,
					'password'          => md5($password),
					'created_at'        => $created_at
				);

				$success = $this->db->insert('tbl_member', $data);

				if ($success > 0) {
					echo "<script>";
					echo "alert('สมัครสมาชิกเรียบร้อยแล้ว สามารถเข้าสู่ระบบได้เลย');";
					echo "window.location='Login';";
					echo "</script>";
				} else {
					echo "<script>";
					echo "alert('ไม่สามารถสมัครสมาชิกได้ กรุณาลองใหม่อีกครั้ง !!!');";
					echo "window.location='Login';";
					echo "</script>";
				}
			}
		}
	}

	

	


}
