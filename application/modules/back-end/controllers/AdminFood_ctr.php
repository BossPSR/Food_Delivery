<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFood_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
        $this->load->model('Food_model');
    }
  
	public function index()
	{
        if ($this->session->userdata('username') == '') {
            redirect('Admin_Login');
     } else {
        $this->load->view('option/header');
        $this->load->view('food');
        $this->load->view('option/footer');
     }
    }
    
    public function food_add_com()
    {
        $id_food = $this->input->post('id_food'); 
        $id_restaurant = $this->input->post('id_restaurant'); 
        
         $this->load->library('upload');
      
        // |xlsx|pdf|docx
        $config['upload_path'] = './uploads/food';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Food-".time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

            if ($_FILES['file_name']['name']) {           
                if ($this->upload->do_upload('file_name')){

                    $gamber     = $this->upload->data();
                    $data = array
                    (
                        'file_name'     => $gamber['file_name'],
                        'name_menu'         => $this->input->post('name_menu') , 
                        'price_menu'   => $this->input->post('price_menu') , 
                        'id_type_food'   => $this->input->post('id_food') , 
                        'id_restaurant'   => $this->input->post('id_restaurant') , 
                        'created_at'     => date('Y-m-d H:i:s') 

                    );
                     
                    $resultsedit = $this->db->insert('tbl_menu',$data);
                }
               
            }

           

            if($resultsedit > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลเมนูเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลเมนูได้');
            }
            return redirect('Admin_Food?id='.$id_food.'&id_restaurant='.$id_restaurant);
    }
  


    
    public function delete_food()
    {

        $id = $this->input->get('id');
        $id_food = $this->input->get('id_food'); 
        $id_restaurant = $this->input->get('id_restaurant'); 


        if ($this->Food_model->food_delete($id))
        {
            $this->session->set_flashdata('del_ss2','ไม่สามารถลบข้อมูลได้ !!.');
        }
        else
        {
            $this->session->set_flashdata('save_ss2','ลบข้อมูลเมนูเรียบร้อยแล้ว');
        }
        return redirect('Admin_Food?id='.$id_food.'&id_restaurant='.$id_restaurant);
    }
}
