<?php

class Super_Admin_Model extends CI_Controller {
    //put your code here
    public function save_product_category_info($sdata)
    {
        $this->db->insert('tbl_product_category',$sdata);
    }
    public function view_product_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_category');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function delete_product_categogy_info($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_product_category');
    }
    public function unpublished_product_categogy_info($category_id)
    {
        $this->db->set('publication_status',0);      
        $this->db->where('category_id',$category_id);      
        $this->db->update('tbl_product_category');
    }
    public function published_product_categogy_info($category_id)
    {
        $this->db->set('publication_status',1);      
        $this->db->where('category_id',$category_id);      
        $this->db->update('tbl_product_category');
    }
    public function edit_product_categogy_info($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    public function update_product_category_info($sdata,$category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_product_category',$sdata);
    }
    public function save_new_product_info($sdata)
    {
        $this->db->insert('tbl_product',$sdata);
    }
    public function ajax_view_all_product_info($search_text)
    {
        $sql="SELECT * FROM tbl_product WHERE product_name LIKE '%$search_text%'";
        $query_result=$this->db->query($sql);
        $result=$query_result->result();
        return $result;
    }
    
    public function view_all_product_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    
    
    public function delete_product_info($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_product');
    }
    public function unpublished_product_info($product_id)
    {
        $this->db->set('product_status',0);      
        $this->db->where('product_id',$product_id);      
        $this->db->update('tbl_product');
    }
    public function published_product_info($product_id)
    {
        $this->db->set('product_status',1);      
        $this->db->where('product_id',$product_id);      
        $this->db->update('tbl_product');
    }
    public function edit_product_info($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$product_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    public function Update_product_info($sdata,$product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$sdata);
    }
}

?>
