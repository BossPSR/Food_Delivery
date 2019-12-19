<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRestaurant_ctr extends CI_Controller {

	public function __construct()
  	{
        parent::__construct();
        $this->load->model('Type_model');
		
    }
  
	public function index()
	{
        if ($this->session->userdata('username') == '') {
            redirect('Admin_Login');
     } else {
        $this->load->view('option/header');
        $this->load->view('restaurant');
        $this->load->view('option/footer');
     }
    }
    
    public function type_restaurant()
	{
        if ($this->session->userdata('username') == '') {
            redirect('Admin_Login');
     } else {
        $this->load->view('option/header');
        $this->load->view('type_restaurant');
        $this->load->view('option/footer');
     }    
    }

    public function type_restaurant_com()
    {
        $type_restaurant           = $this->input->post('type_restaurant');

        
            $data = array(
                'type_restaurant'             => $type_restaurant,
       			'created_at'             => date('Y-m-d H:i:s')
               
               
            );
            $success = $this->db->insert('tbl_type_restaurant',$data);
        
            if($success > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลประเภทร้านอาหารเรียบร้อยแล้ว !!.');
            }else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลร้านอาหารได้');
            }
                redirect('Admin_Type_Restaurant');
        
    }

    public function delete_type_food_restaurant()
    {

        $id = $this->input->get('id');

        if ($this->Type_model->type_restaurant($id))
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถลบข้อมูลได้ !!.');
        }
        else
        {
            $this->session->set_flashdata('save_ss2','ลบข้อมูลประเภทร้านอาหารเรียบร้อยแล้ว');
        }
        return redirect('Admin_Type_Restaurant');
    }

    public function edit_type_food_restaurant()
    {
        $id               = $this->input->post('id');
        $type_restaurant        = $this->input->post('type_restaurant');

        
        $data = array(
            'type_restaurant'             => $type_restaurant,
            'updated_at'            => date('Y-m-d H:i:s')
        );
        $this->db->where('id',$id);
        $success = $this->db->update('tbl_type_food',$data);
    
        if($success > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลประเภทร้านอาหารเรียบร้อยแล้ว !!.');
        }else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลร้านอาหารได้');
        }
            redirect('Admin_Type_Restaurant');
    }

  
}
