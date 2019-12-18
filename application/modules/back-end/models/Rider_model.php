<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Rider_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function rider_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_rider');
    }
 
}

?>