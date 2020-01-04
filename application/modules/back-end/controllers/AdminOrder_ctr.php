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

    public function rider_order()
	{
        if ($this->session->userdata('username') != '') {
            $data['user'] = $this->db->get_where('tbl_rider', ['username' => $this->session->userdata('username')])->row_array();
            $data['order'] = $this->db->get_where('tbl_order',['rider'=> $data['user']['id']])->result_array();
            $this->load->view('option/header_rider');
            $this->load->view('order_rider',$data);
            $this->load->view('option/footer');
          } else {
  
              redirect('Admin_Login');
  
          }
   
          
    }

    public function rider_edit()
    {

        $id_rider           = $this->input->get('id_rider');
        $id_order           = $this->input->get('id_order');
        $id_status           = 1;
        

            $data = array(

                'rider'             => $id_rider,
                'status'             => $id_status
       			
               
               
			);
			$this->db->where('id',$id_order);
            $success = $this->db->update('tbl_order',$data);


        
            if($success > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มผู้ส่งเรียบร้อยแล้ว!!.');
            }else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มผู้ส่งได้');
            }
                redirect('Admin_Order');
        
    }
    public function status_order()
    {

        $id_status           = $this->input->get('id_status');
        $id_order           = $this->input->get('id_order');
      
        

            $data = array(

                'status'             => $id_status
       			
               
               
			);
			$this->db->where('id',$id_order);
            $success = $this->db->update('tbl_order',$data);


        
            if($success > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มผู้ส่งเรียบร้อยแล้ว!!.');
            }else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มผู้ส่งได้');
            }
                redirect('Admin_Order_rider');
        
    }
    
  

}
