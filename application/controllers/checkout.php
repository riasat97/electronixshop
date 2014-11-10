<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
       $this->load->model('checkout_model');
       $this->load->model('home_model');
       $this->load->model('mailer_model');
    }
     public function customer_registration()
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['main_content']=$this->load->view('customer_registration',$data,true);
        $this->load->view('master',$data);
    }
    public function save_customer() {
        $sdata = array();
        $sdata['first_name'] = $this->input->post('first_name', true);
        $sdata['last_name'] = $this->input->post('last_name', true);
        $sdata['email_address'] = $this->input->post('email_address', true);
        $sdata['cell_number'] = $this->input->post('cell_number', true);
        $sdata['address'] = $this->input->post('address', true);
        $sdata['city'] = $this->input->post('city', true);
        $sdata['district'] = $this->input->post('district', true);
        $sdata['zip_code'] = $this->input->post('zip_code', true);
        $sdata['country'] = $this->input->post('country', true);
        $sdata['password'] = md5($this->input->post('password', true));
        
        $customer_id=$this->checkout_model->save_customer_info($sdata);
        /*-------------Start Send Registration Successfull Email---------------------*/
        $maildata=array();
        $maildata['from_address']='topu_18_26@yahoo.com';
        $maildata['admin_full_name']='BATCH08 ECOMMERCE';
        $maildata['to_address']=$sdata['email_address'];
        $maildata['subject']='Registration Successfull!';
        $maildata['last_name']=$sdata['last_name'];
        $maildata['password']=$this->input->post('password', true);
        $this->mailer_model->sendeEmail($maildata,'successfull_registration');
        /*-------------End Send Registration Successfull Email---------------------*/
        $sesdata=array();
        $sesdata['customer_id']=$customer_id;
        $this->session->set_userdata($sesdata);
        redirect('cart/show_cart');
    }
    public function save_shipping_info()
    {
        $sdata = array();
        $sdata['full_name'] = $this->input->post('full_name', true);
        $sdata['email'] = $this->input->post('email', true);
        $sdata['cell_number'] = $this->input->post('cell_number', true);
        $sdata['address'] = $this->input->post('address', true);
        $sdata['city'] = $this->input->post('city', true);
        $sdata['country'] = $this->input->post('country', true);
        $sdata['zip_code'] = $this->input->post('zip_code', true);
        
        $shipping_id=$this->checkout_model->save_shipping_info($sdata);
        $sesdata=array();
        $sesdata['shipping_id']=$shipping_id;
        $this->session->set_userdata($sesdata);
        redirect('cart/show_cart');
    }
    public function confirm_order()
    {
        $payment_method=$this->input->post('payment_method',true);
        $pdata=array();
        if($payment_method=='cash_on_delivery')
        {
            $pdata['payment_type']='cash_on_delivery';
            $payment_id=$this->checkout_model->save_payment_info($pdata);
            $sesdata=array();
            $sesdata['payment_id']=$payment_id;
            $this->session->set_userdata($sesdata);
            $this->checkout_model->save_order();
            $this->cart->destroy();
            $data=array();
            $data['total_items']=$this->cart->total_items();
            $data['total_amount']=$this->cart->total();
            $data['all_product_category']=$this->home_model->view_product_category_info();
            $data['main_content']=$this->load->view('order_complete',$data,true);
            $this->load->view('master',$data);
        }
        if($payment_method=='paypal')
        {
            $pdata['payment_type']='cash_on_delivery';
            $payment_id=$this->checkout_model->save_payment_info($pdata);
            $sesdata=array();
            $sesdata['payment_id']=$payment_id;
            $this->session->set_userdata($sesdata);
            $this->checkout_model->save_order();
            //$this->cart->destroy();
            $this->load->view('htmlWebsiteStandardPayment');
        }
    }
    public function customer_login_check()
    {
        $email_address=$this->input->post('email_address',true);
        $password=$this->input->post('password',true);
        $result=$this->checkout_model->check_login_info($email_address,$password);
        $sdata=array();
        if($result)
        {
            $sdata = array();
            $sdata['customer_id'] = $result->customer_id;
            $this->session->set_userdata($sdata);
            redirect('cart/show_cart');
        }
        else {
            
            $sdata['exception']="Email id or Password invalid!!!";
            $this->session->set_userdata($sdata);
            redirect('checkout/customer_registration');
        }
    }

}

?>
