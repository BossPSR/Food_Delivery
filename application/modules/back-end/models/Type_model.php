<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Type_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function type_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_type_food');
    }

    public function type_restaurant($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_type_restaurant');
    }

    public function restaurant($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_restaurant');
    }
 
}

?>