<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin_ctr extends CI_Controller {

	public function __construct()
  	{
    parent::__construct();
    $this->load->model('Login_model');
		
    }
  
	public function index()
	{
       
    $this->load->view('login');
          
  }

  public function admin_loginMe()
    {
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if ($this->form_validation->run())
        {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->load->model('Login_model');
            
            if ($this->Login_model->login($username, $password))
            {
                $user_data = array(
                    'username' => $username
                );
                
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('save_ss2', 'ล็อกอินเรียบร้อยแล้ว');
                redirect('Admin_Order');
            }
            
            elseif ($this->Login_model->login_rider($username, $password))
            {
                $user_data = array(
                    'username' => $username
                );
                
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('save_ss2', 'ล็อกอินเรียบร้อยแล้ว');
                redirect('Admin_Order_rider');
            }
            else
            {
                $this->session->set_flashdata('del_ss2', 'รหัสผ่านผิดกรุณา ตรวจสอบ!!');
                redirect('Admin_Login','refresh');
            }
        }   
       
    }

    public function admin_logout()
    {$this->session->set_flashdata('save_ss2', 'ล็อกเอาท์เรียบร้อยแล้ว');
        $this->session->sess_destroy();//ล้างsession
        
        redirect('Admin_Login');//กลับไปหน้า Login
    }

    
  public function forgot_password()
	{
       
    $this->load->view('forgot_password');
          
  }

  public function profile()
  {

     if ($this->session->userdata('username') == '') {
            redirect('Admin_Login');
        } else {
        $data = [];
        $data['profile'] = $this->db->get_where('tbl_admin',['username'=>$this->session->userdata('username')])->row_array();

        $this->load->view('option/header');
        $this->load->view('profile',$data);
        $this->load->view('option/footer');
        }


          
  }


}
