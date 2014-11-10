<?php

    class checkout_model extends CI_Model
    {
    
        public function save_customer_info($sdata)
        {
            $this->db->insert('tbl_customer',$sdata);
            $customer_id=$this->db->insert_id();
            return $customer_id;
        }
        public function save_shipping_info($sdata)
        {
            $this->db->insert('tbl_shipping_info',$sdata);
            $shipping_id=$this->db->insert_id();
            return $shipping_id;
        }
        public function save_payment_info($pdata)
        {
            $this->db->insert('tbl_payment',$pdata);
            $payment_id=$this->db->insert_id();
            return $payment_id;
        }
        public function save_order()
        {
            $odata=array();
            $odata['customer_id']=$this->session->userdata('customer_id');
            $odata['shipping_id']=$this->session->userdata('shipping_id');
            $odata['payment_id']=$this->session->userdata('payment_id');
            $odata['order_total']=$this->cart->total();
            $this->db->insert('tbl_order',$odata);
            $order_id=$this->db->insert_id();

            $oddata=array();
            $oddata['order_id']=$order_id;
            $ordered_product=$this->cart->contents();
            foreach($ordered_product as $ov_product)
            {
                $oddata['product_id']=$ov_product['id'];
                $oddata['product_name']=$ov_product['name'];
                $oddata['product_price']=$ov_product['price'];
                $oddata['product_sales_quantity']=$ov_product['qty'];
                $oddata['subtotal']=$ov_product['subtotal'];
                $this->db->insert('tbl_order_details',$oddata);        
            }
            $this->update_inventory($order_id);

        }
        public function update_inventory($order_id)
        {
             $sql = "update tbl_product, tbl_order_details
                     set tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.product_sales_quantity
                     where tbl_product.product_id = tbl_order_details.product_id and tbl_order_details.order_id = '$order_id' ";
             $this->db->query($sql);
        }
        public function check_login_info($email_address,$password)
        {
            $this->db->select('*');
            $this->db->from('tbl_customer');
            $this->db->where('email_address',$email_address);
            $this->db->where('password', md5($password));
            $query_result=$this->db->get();
            $result=$query_result->row();
            //echo '<pre>';
           // print_r($result);
           // exit();
            return $result;
        }
    }

?>
