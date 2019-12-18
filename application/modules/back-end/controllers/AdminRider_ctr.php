<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRider_ctr extends CI_Controller {

	public function __construct()
  	{
        parent::__construct();
        $this->load->model('Rider_model');
		
    }
  
	public function index()
	{
        if ($this->session->userdata('username') == '') {
           	redirect('Admin_Login');
        } else {
        $this->load->view('option/header');
        $this->load->view('rider');
        $this->load->view('option/footer');
        }
    }

    
	public function rider_add_com()
    {

        
         $this->load->library('upload');
      
        // |xlsx|pdf|docx
        $config['upload_path'] = './uploads/rider';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Rider-".time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

            if ($_FILES['file_name']['name']) {           
                if ($this->upload->do_upload('file_name')){

                    $gamber     = $this->upload->data();
                    $data = array
                    (
                        'file_name'     => $gamber['file_name'],
                        'title'         => $this->input->post('title') , 
                        'first_name'   => $this->input->post('first_name') , 
                        'last_name'   => $this->input->post('last_name') , 
                        'id_card'   => $this->input->post('id_card') , 
                        'tel'          => $this->input->post('tel') , 
                        'email'          => $this->input->post('email') , 
                        'create_at'     => date('Y-m-d H:i:s') 

                    );
                     
                    $resultsedit = $this->db->insert('tbl_rider',$data);
                }
               
            }

           

            if($resultsedit > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลRiderเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลRiderได้');
            }
            return redirect('Admin_Rider');
    }

    
    public function rider_edit_com()
    {
        $id = $this->input->post('id');
         $this->load->library('upload');
      
        // |xlsx|pdf|docx
        $config['upload_path'] = './uploads/rider';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Rider-".time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();


        if (empty($_FILES['file_name']['name'])) 
        {
            $data = array
            (
                'title'         => $this->input->post('title') , 
                'first_name'   => $this->input->post('first_name') , 
                'last_name'   => $this->input->post('last_name') , 
                'id_card'   => $this->input->post('id_card') , 
                'tel'          => $this->input->post('tel') , 
                'email'          => $this->input->post('email') , 
                'create_at'     => date('Y-m-d H:i:s') 

               
            );
        }
        else
        {

            if ($_FILES['file_name']['name']) {           
                if ($this->upload->do_upload('file_name')){

                    $gamber     = $this->upload->data();
                    $data = array
                    (
                        'file_name'     => $gamber['file_name'],
                        'title'         => $this->input->post('title') , 
                        'first_name'   => $this->input->post('first_name') , 
                        'last_name'   => $this->input->post('last_name') , 
                        'id_card'   => $this->input->post('id_card') , 
                        'tel'          => $this->input->post('tel') , 
                        'email'          => $this->input->post('email') , 
                        'create_at'     => date('Y-m-d H:i:s') 

                        
                    );

                }
            }

        }
            $this->db->where('id', $id);
            $resultsedit = $this->db->update('tbl_rider',$data);
         

            if($resultsedit > 0)
            {
                $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลRiderเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลRiderได้');
            }
            return redirect('Admin_Rider');
    }

    public function delete_rider()
    {

        $id = $this->input->get('id');

        if ($this->Rider_model->rider_delete($id))
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถลบข้อมูลได้ !!.');
        }
        else
        {
            $this->session->set_flashdata('save_ss2','ลบข้อมูลRiderอาหารเรียบร้อยแล้ว');
        }
        return redirect('Admin_Rider');
    }

    public function status_rider()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_rider',['status' => $status]);

        if($resultsedit > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลสถานะRiderเรียบร้อยแล้ว !!.');
        }
        else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลสถานะRiderได้');
        }
        return redirect('Admin_Rider');
    }

}
