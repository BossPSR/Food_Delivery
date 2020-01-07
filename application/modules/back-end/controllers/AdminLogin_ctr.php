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

  public function editProfile()
  {
    if($this->session->userdata('username') == '') {
        redirect('Admin_Login');
    }else{
        $profile = $this->db->get_where('tbl_admin',['username'=>$this->session->userdata('username')])->row_array();
        if (!empty($profile)) {
           
            $this->load->library('upload');
      
            // |xlsx|pdf|docx
            $config['upload_path'] = './uploads/admin';
            $config['allowed_types'] = '*';
            $config['max_size']     = '200480';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';
            $name_file = "Admin-".time();
            $config['file_name'] = $name_file;
    
            $this->upload->initialize($config);     
    
            if (empty($_FILES['file_name']['name'])) 
            {
                $data = [
                    'full_name' => $this->input->post('full_name')
                ];

            }else{

                if ($_FILES['file_name']['name']) {           
                    if ($this->upload->do_upload('file_name')){
    
                        $gamber     = $this->upload->data();
                        $data = [
                            'full_name' => $this->input->post('full_name'),
                            'file_name' => $gamber['file_name'],
                        ];
    
                    }
                }
            }
            $this->db->where('id', $profile['id']);
            $result = $this->db->update('tbl_admin',$data);

            if($result > 0)
            {
                $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลAdminเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลAdminได้');
            }
            return redirect('Admin_Profile');
            
        }

    }
  }


}
