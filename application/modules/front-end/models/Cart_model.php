<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {
    function __construct() {
       
    }
    
    public function Cart($id_foot)
    {
        $this->db->where('id',$id_foot);
        $data = $this->db->get('tbl_menu');
        
        return $data->row();

    }
 
    
}