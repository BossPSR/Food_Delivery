<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function index()
	{
        
        $this->load->view('option/header'); 
        $this->load->view('contact');
        $this->load->view('option/footer');
  

	}

	public function Contacr_com()
    {
        $name           = $this->input->post('name');
        $email          = $this->input->post('email');
        $tel            = $this->input->post('tel');
        $subject        = $this->input->post('subject');
        $description    = $this->input->post('description');
        
      
       
            $data = array(
                'name'                  => $name,
                'email'                 => $email,
                'description'           => $description,
				'tel'                   => $tel,
				'subject'               => $subject,
       			'create_at'             => date('Y-m-d H:i:s')
               
               
            );
            $success = $this->db->insert('tbl_contact',$data);
        
            if($success > 0)
            {
                $this->session->set_flashdata('save_ss2','ส่งข้อมูลไปยังเว็บไซต์เรียบร้อยแล้ว กรุณารอการตอบกลับ 1-2 วันทำการ !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถส่งข้อมูลได้เนื่องจากมีข้อผิดพลาด');
            }
            redirect('contact');
        
    }



}
