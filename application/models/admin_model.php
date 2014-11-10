<?php
class Admin_Model extends CI_Controller {
    //put your code here
    
    public function check_login_info($admin_email_address,$admin_password)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address',$admin_email_address);
        $this->db->where('admin_password', md5($admin_password));
        $query_result=$this->db->get();
        $result=$query_result->row();
        //echo '<pre>';
       // print_r($result);
       // exit();
        return $result;
    }
            
}

?>
