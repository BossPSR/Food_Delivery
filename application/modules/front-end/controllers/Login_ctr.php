<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
 
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
                redirect('index');
            }
            else
            {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> กรุณากรอก Email หรือ Password ให้ถูกต้อง !! </div>');
                redirect('LOgin','refresh');
            }
        }   
        else
        {
            redirect('LOgin','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();//ล้างsession

        redirect('LOgin');//กลับไปหน้า Login
    }



}
