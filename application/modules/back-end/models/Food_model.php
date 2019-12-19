<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Food_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function food_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_menu');
    }
 
}

?>