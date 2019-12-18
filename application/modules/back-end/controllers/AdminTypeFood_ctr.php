<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTypeFood_ctr extends CI_Controller {

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
        $this->load->view('type_food');
        $this->load->view('option/footer');
     } 
    }

    public function type_food()
    {
        $type_name           = $this->input->post('type_name');

        
            $data = array(
                'type_food'             => $type_name,
       			'created_at'             => date('Y-m-d H:i:s')
               
               
            );
            $success = $this->db->insert('tbl_type_food',$data);
        
            if($success > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลประเภทอาหารเรียบร้อยแล้ว !!.');
            }else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลได้');
            }
                redirect('Admin_Type_Food');
        
    }

    public function delete_type_food()
    {

        $id = $this->input->get('id');

        if ($this->Type_model->type_delete($id))
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถลบข้อมูลได้ !!.');
        }
        else
        {
            $this->session->set_flashdata('save_ss2','ลบข้อมูลประเภทอาหารเรียบร้อยแล้ว');
        }
        return redirect('Admin_Type_Food');
    }

    public function edit_type_food()
    {
        $id               = $this->input->post('id');
        $type_name        = $this->input->post('type_name');

        
        $data = array(
            'type_food'             => $type_name,    
            'updated_at'            => date('Y-m-d H:i:s')
        );
        $this->db->where('id',$id);
        $success = $this->db->update('tbl_type_food',$data);
    
        if($success > 0)
        {
            $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลประเภทอาหารเรียบร้อยแล้ว !!.');
        }else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลได้');
        }
            redirect('Admin_Type_Food');
    }
  

}
