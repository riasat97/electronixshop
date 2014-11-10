<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function add_to_cart($product_id) {
        $product_details = $this->home_model->product_details_info($product_id);
        $data = array(
            'id' => $product_details->product_id,
            'qty' => 1,
            'price' => $product_details->product_price,
            'name' => $product_details->product_name           
        );

        $this->cart->insert($data);
        redirect("home");
    }
    public function show_cart()
    {
        $data=array();
        $data['total_items']=$this->cart->total_items();
        $data['total_amount']=$this->cart->total();
        $data['all_product_category']=$this->home_model->view_product_category_info();
        $data['main_content']=$this->load->view('show_cart',$data,true);
        $this->load->view('master',$data);
    }
    public function update_cart()
    {
        $qty=$this->input->post('qty',true);
        $rowid=$this->input->post('rowid',true);
        $data = array(
               'rowid'      =>$rowid,
               'qty'     => $qty
               
            );

        $this->cart->update($data);
        redirect("cart/show_cart");
    }
    public function remove_item($rowid)
    {
        $data = array(
               'rowid'      =>$rowid,
               'qty'     => 0
               
            );

        $this->cart->update($data);
        redirect("cart/show_cart");
    }

}

?>
