<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
    }
    public function index()
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['all_product_info']=$this->home_model->all_product_info();       
        $data['main_content']=$this->load->view('home_msg',$data,true);
        $this->load->view('master',$data);
    }
    public function contact()
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['main_content']=$this->load->view('contact',$data,true);
        $this->load->view('master',$data);
    }
    public function sign_up()
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['main_content']=$this->load->view('sign_up',$data,true);
        $this->load->view('master',$data);
    }
    public function logout() 
    {
        $this->session->unset_userdata('customer_id');
        session_destroy();
        $this->cart->destroy();
        $sdata = array();
        $sdata['message'] = "You are successfully logged out!!!";
        $this->session->set_userdata($sdata);
        redirect('home');
    }
    public function select_category_product($category_id)
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['all_product_info']=$this->home_model->select_category_product($category_id);       
        $data['main_content']=$this->load->view('home_msg',$data,true);
        $this->load->view('master',$data);
    }
    public function product_details($product_id)
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['product_details']=$this->home_model->product_details_info($product_id);
        $data['main_content']=$this->load->view('product_details',$data,true);
        $this->load->view('master',$data);
    }
    /*public function sign_in()
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['main_content']=$this->load->view('sign_in',$data,true);
        $this->load->view('master',$data);
    }*/
    public function ajax_email_check($search_text=null)
    {
        $data=array();
        $result=$this->home_model->select_customer_by_email_address($search_text);
        if($result)
        {
            echo "Allready Exists !";
        }
        else{
            echo "Available";
        }
        
    }
}

?>
