<?php
session_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_Login extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id != NULL)
        {
            redirect("super_admin", "refresh");
        }
    }
    public function index()
    {
        $this->load->view('admin/login');
    }
    public function login_check()
    {
        $admin_email_address=$this->input->post('admin_email_address',true);
        $admin_password=$this->input->post('admin_password',true);
        $result=$this->admin_model->check_login_info($admin_email_address,$admin_password);
        $sdata=array();
        if($result)
        {
            $sdata['admin_name']=$result->admin_name;
            $sdata['admin_id']=$result->admin_id;
            $sdata['login_status']=TRUE;
            $this->session->set_userdata($sdata);
            redirect('super_admin');
        }
        else {
            
            $sdata['exception']="User id or Password Invalid!!!!!!!!!";
            $this->session->set_userdata($sdata);
            
            redirect('admin_login');
        }
    }
}

?>
