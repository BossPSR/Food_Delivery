<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBlog_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
    }
  
	public function promotion()
	{
       
        $this->load->view('option/header');
        $this->load->view('promotion');
        $this->load->view('option/footer');
          
    }

    public function add_promotion()
	{
       
        $this->load->view('option/header');
        $this->load->view('add_promotion');
        $this->load->view('option/footer');
          
    }

    public function promotion_add_com()
    {

         $this->load->library('upload');
      
        // |xlsx|pdf|docx
        $config['upload_path'] = './uploads/promotion';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Promotion-".time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

            if ($_FILES['file_name']['name']) {           
                if ($this->upload->do_upload('file_name')){

                    $gamber     = $this->upload->data();
                    $data = array
                    (
                        'file_name'     => $gamber['file_name'],
                        'name_promotion'          => $this->input->post('name_promotion') , 
                        'details'          => $this->input->post('details') , 
                        'create_at'     => date('Y-m-d H:i:s') 

                    );
                     
                   $resultsedit = $this->db->insert('tbl_promotion',$data);
                }
               
            }
           

           

            if($resultsedit > 0)
            {
                $this->session->set_flashdata('save_ss2','เพิ่มข้อมูลโปรชั่นเรียบร้อยแล้ว !!.');
            }
            else
            {
                $this->session->set_flashdata('del_ss2','ไม่สามารถเพิ่มข้อมูลโปรโมชั่นได้');
            }
            return redirect('Admin_Blog_Promotion');
    }

    public function comment()
	{
       
        $this->load->view('option/header');
        $this->load->view('comment');
        $this->load->view('option/footer');
          
    }
    
  

}
