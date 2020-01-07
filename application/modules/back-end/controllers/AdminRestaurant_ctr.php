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
    public function restaurant_add_com()
    {

        
         $this->load->library('upload');
      
        // |xlsx|pdf|docx
        $config['upload_path'] = './uploads/restaurant';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Restaurant-".time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

            if ($_FILES['file_name']['name']) {           
                if ($this->upload->do_upload('file_name')){

                    $gamber     = $this->upload->data();
                    $data = array
                    (
                        'file_name'     => $gamber['file_name'],
                        'id_type_restaurant'         => $this->input->post('id_type_restaurant') , 
                        'restaurant_name'   => $this->input->post('restaurant_name') , 
                        'restaurant_name_p'   => $this->input->post('restaurant_name_p') , 
                        'restaurant_tel'   => $this->input->post('restaurant_tel') , 
                        'restaurant_email'          => $this->input->post('restaurant_email') , 
                        'restaurant_open'          => $this->input->post('restaurant_open') , 
                        'restaurant_close'          => $this->input->post('restaurant_close') , 
                        'restaurant_address'          => $this->input->post('restaurant_address') ,
                        'status_show'     => "0", 
                        'created_at'     => date('Y-m-d H:i:s') 

                    );
                     
                    
                }
            }
            
                $resultsedit = $this->db->insert('tbl_restaurant',$data);

           

            if($resultsedit > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลร้านอาหารเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลร้านอาหารได้');
            }
            redirect('Admin_Restaurant');
    }

    public function restaurant_edit_com()
    {
        $id = $this->input->post('id');
         $this->load->library('upload');
      
        // |xlsx|pdf|docx
        $config['upload_path'] = './uploads/restaurant';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Restaurant-".time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();


        if (empty($_FILES['file_name']['name'])) 
        {
            $data = array
            (
                
                'id_type_restaurant'         => $this->input->post('id_type_restaurant') , 
                'restaurant_name'   => $this->input->post('restaurant_name') , 
                'restaurant_name_p'   => $this->input->post('restaurant_name_p') , 
                'restaurant_tel'   => $this->input->post('restaurant_tel') , 
                'restaurant_email'          => $this->input->post('restaurant_email') , 
                'restaurant_open'          => $this->input->post('restaurant_open') , 
                'restaurant_close'          => $this->input->post('restaurant_close') , 
                'restaurant_address'          => $this->input->post('restaurant_address') , 
                'created_at'     => date('Y-m-d H:i:s') 

               
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
                        'id_type_restaurant'         => $this->input->post('id_type_restaurant') , 
                        'restaurant_name'   => $this->input->post('restaurant_name') , 
                        'restaurant_name_p'   => $this->input->post('restaurant_name_p') , 
                        'restaurant_tel'   => $this->input->post('restaurant_tel') , 
                        'restaurant_email'          => $this->input->post('restaurant_email') , 
                        'restaurant_open'          => $this->input->post('restaurant_open') , 
                        'restaurant_close'          => $this->input->post('restaurant_close') , 
                        'restaurant_address'          => $this->input->post('restaurant_address') , 
                        'created_at'     => date('Y-m-d H:i:s') 

                        
                    );

                }
            }

        }
            $this->db->where('id', $id);
            $resultsedit = $this->db->update('tbl_restaurant',$data);
         

            if($resultsedit > 0)
            {
                $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลร้านอาหารเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลร้านอาหารได้');
            }
            return redirect('Admin_Restaurant');
    }




    public function status_restaurant()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_restaurant',['status' => $status]);

        if($resultsedit > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลสถานะร้านอาหารเรียบร้อยแล้ว !!.');
        }
        else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลสถานะอาหารได้');
        }
        return redirect('Admin_Restaurant');
    }

    public function delete_restaurant()
    {

        $id = $this->input->get('id');

        if ($this->Type_model->restaurant($id))
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถลบข้อมูลได้ !!.');
        }
        else
        {
            $this->session->set_flashdata('save_ss2','ลบข้อมูลประเภทร้านอาหารเรียบร้อยแล้ว');
        }

        $this->db->where('id_restaurant',$id);
        $this->db->delete('tbl_menu');

        redirect('Admin_Restaurant');
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
    public function coupon()
	{
        if ($this->session->userdata('username') == '') {
            redirect('Admin_Login');
     } else {
        $this->load->view('option/header');
        $this->load->view('coupon');
        $this->load->view('option/footer');
     }    
    }

    public function coupon_com()
    {
        $name_coupon           = $this->input->post('name_coupon');
        $code_coupon           = $this->input->post('code_coupon');
        $price                 = $this->input->post('price');

        
            $data = array(
                'name_coupon'             => $name_coupon,
                'code_coupon'             => $code_coupon,
                'price'                   => $price
       			
               
               
            );
            $success = $this->db->insert('tbl_coupon',$data);
        
            if($success > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลคูปองเรียบร้อยแล้ว !!.');
            }else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มคูปองได้');
            }
                redirect('coupon');
        
    }

    public function edit_coupon_com()
    {
        $id                     = $this->input->post('id');
        $name_coupon           = $this->input->post('name_coupon');
        $code_coupon           = $this->input->post('code_coupon');
        $price                 = $this->input->post('price');


        
        $data = array(
            'name_coupon'             => $name_coupon,
            'code_coupon'             => $code_coupon,
            'price'                   => $price
        );
        $this->db->where('id',$id);
        $success = $this->db->update('tbl_coupon',$data);
    
        if($success > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลคูปองเรียบร้อยแล้ว  !!.');
        }else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลคูปองได้ ');
        }
            redirect('coupon');
    }

    public function delete_coupon()
    {

        $id = $this->input->get('id');

        if ($this->Type_model->coupon($id))
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถลบข้อมูลได้ !!.');
        }
        else
        {
            $this->session->set_flashdata('save_ss2','ลบข้อมูลคูปองเรียบร้อยแล้ว');
        }
        return redirect('coupon');
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
        $id                     = $this->input->post('id');
        $type_restaurant        = $this->input->post('type_restaurant');

        
        $data = array(
            'type_restaurant'             => $type_restaurant,
            'updated_at'            => date('Y-m-d H:i:s')
        );
        $this->db->where('id',$id);
        $success = $this->db->update('tbl_type_restaurant',$data);
    
        if($success > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลประเภทร้านอาหารเรียบร้อยแล้ว !!.');
        }else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลร้านอาหารได้');
        }
            redirect('Admin_Type_Restaurant');
    }

    public function type_food()
    {
        if ($this->session->userdata('username') == '') {
            redirect('Admin_Login');
        } else {
            $this->load->view('option/header');
            $this->load->view('type_food_restaurant');
            $this->load->view('option/footer');
        }    
    }


    public function status_show_restaurant()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_restaurant',['status_show' => $status]);

        if($resultsedit > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลสถานะร้านอาหารแนะนำเรียบร้อยแล้ว !!.');
        }
        else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลสถานะร้านอาหารแนะนำได้');
        }
        return redirect('Admin_Restaurant');
    }

    public function status_show_food()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $id_restaurant = $this->input->get('id_restaurant');
        $id_food = $this->input->get('id_food');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_menu',['status_show' => $status]);

        if($resultsedit > 0)
        {
            $this->session->set_flashdata('save_ss2','แก้ไขข้อมูลสถานะร้านอาหารแนะนำเรียบร้อยแล้ว !!.');
        }
        else
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถแก้ไขข้อมูลสถานะร้านอาหารแนะนำได้');
        }
        return redirect('Admin_Food?id='.$id_food.'&id_restaurant='.$id_restaurant);
    }
  
}
