<?php
class Home_Model extends CI_Model {
    //put your code here
    public function view_product_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_category');
        $this->db->where('publication_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function all_product_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_status',1);
        $this->db->order_by('product_id',"desc");
        $this->db->limit(6);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function select_category_product($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('category_id',$category_id);
        $this->db->where('product_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function product_details_info($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$product_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    public function select_customer_by_email_address($search_text)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address',$search_text);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
}

?>
