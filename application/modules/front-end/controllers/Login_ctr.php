<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
          $this->cart->destroy();
          $this->load->view('option/header'); 
          $this->load->view('login');
          $this->load->view('option/footer');
  

	}
	public function loginMe()
    {
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if ($this->form_validation->run())
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $this->load->model('Login_model');
            
            if ($this->Login_model->login($email, $password))
            {
                $user_data = array(
                    'email' => $email
                );
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('save_ss2', 'ล็อกอินเรียบร้อยแล้ว');
                redirect('Profile');
            }
            else
            {
                $this->session->set_flashdata('del_ss2', 'รหัสผ่านผิดกรุณา ตรวจสอบ!!');
                redirect('Login','refresh');
            }
        }   
       
    }

    public function logout()
    {
        $this->session->sess_destroy();//ล้างsession
        $this->cart->destroy();
        redirect('index');//กลับไปหน้า Login
    }


}
