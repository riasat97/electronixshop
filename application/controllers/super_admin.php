<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Super_Admin extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model');
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect("admin_login", "refresh");
        }      
    }

    public function index() {
        $data = array();
        $data['content'] = $this->load->view('admin/dashboard_content', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('login_status');
        session_destroy();
        $sdata = array();
        $sdata['message'] = "You are successfully logged out!!!";
        $this->session->set_userdata($sdata);
        redirect('admin_login');
    }

    public function add_product_category() {
        $data = array();
        $data['content'] = $this->load->view('admin/add_product_category', '', true);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_product_category()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']	= '100000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $error=array();
        $data=array();
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('category_image'))
        {
                $error = $this->upload->display_errors();
                //echo '<pre>';
                //print_r($error);
        }
        else
        {
                $data = $this->upload->data();
                //echo '<pre>';
                //print_r($data);
                
            }
            
       $sdata=array();
        $sdata['category_name']=$this->input->post('category_name',true);
        $sdata['category_description']=$this->input->post('category_description',true);  
        $sdata['category_image']= base_url().'uploads/'.$data['file_name'];
        $sdata['publication_status']=$this->input->post('publication_status',true); 
        //$this->load->model('super_admin_model');
        $this->super_admin_model->save_product_category_info($sdata);
        
        $ssdata=array();
        $ssdata['message']= "Save Category Info Successfuly";
        $this->session->set_userdata($ssdata);
        
        redirect('super_admin/add_product_category');
    }
    public function view_product_category()
    {
        $data = array();
        /* Start Pagination */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'super_admin/view_product_category/';
        $config['total_rows'] = $this->db->count_all('tbl_product_category');
        $config['per_page'] = '2';
        $this->pagination->initialize($config);
        //$this->load->helper(array('dompdf'));
        
        
        $data['all_product_category']=$this->super_admin_model->view_product_category_info($config['per_page'], $this->uri->segment(3));
        $data['content'] = $this->load->view('admin/view_product_category', $data, true);
        //$body=$this->load->view('admin/view_product_category', $data, true);
        //$file_name=pdf_create($body, 'body');
        //echo $file_name;
        
        $this->load->view('admin/admin_master', $data);
    }
    public function delete_product_categogy($category_id)
    {
        $this->super_admin_model->delete_product_categogy_info($category_id);
        
        $sdata=array();
        $sdata['message']= "Product Category Delete Successfully!!!!";
        $this->session->set_userdata($sdata);
        
        redirect('super_admin/view_product_category');
    }
    public function unpublished_product_categogy($category_id)
    {
        $this->super_admin_model->unpublished_product_categogy_info($category_id);
        redirect('super_admin/view_product_category');
    }
    public function published_product_categogy($category_id)
    {
        $this->super_admin_model->published_product_categogy_info($category_id);
        redirect('super_admin/view_product_category');
    }
    public function edit_product_categogy($category_id)
    {
        $data=array();
        $data['product_category_info']=$this->super_admin_model->edit_product_categogy_info($category_id);
        $data['content'] = $this->load->view('admin/edit_product_category',$data, true);
        $this->load->view('admin/admin_master', $data);
    }
    public function update_product_category($category_id)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('category_image')) {
            $error = $this->upload->display_errors();
           // echo '<pre>';
            //print_r($error);
           // exit();
        } else {
            $data = $this->upload->data();
           // echo '<pre>';
           // print_r($data);
           // exit();
        }
        $sdata=array();
        $category_id=$this->input->post('category_id',true);
        $sdata['category_name']=$this->input->post('category_name',true);
        $sdata['category_description']=$this->input->post('category_description',true);
        $sdata['category_image']= base_url().'uploads/'.$data['file_name'];
        $sdata['publication_status']=$this->input->post('publication_status',true);
        //$this->load->model('super_admin_model');
        $this->super_admin_model->update_product_category_info($sdata,$category_id);
        
        $ssdata=array();
        $ssdata['message']= "Update Category Info Successfuly";
        $this->session->set_userdata($ssdata);
        
        redirect("super_admin/edit_product_categogy/$category_id");
    } 
    public function add_new_product()
    {
        $data = array();
        $this->load->model('super_admin_model');
        $data['all_product_category']=$this->super_admin_model->view_product_category_info();
        $data['content'] = $this->load->view('admin/add_new_product', $data, true);
        $this->load->view('admin/admin_master', $data);
    }
    public function save_new_product()
    {
        $config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {
            $error = $this->upload->display_errors();
           //echo '<pre>';
           //print_r($error);
           // exit();
        } else {
            $data = $this->upload->data();
           //echo '<pre>';
           //print_r($data);
           //exit();
        }
        $sdata=array();
        $sdata['category_id']=$this->input->post('category_id',true); 
        $sdata['product_name']=$this->input->post('product_name',true);
        $sdata['product_price']=$this->input->post('product_price',true);
        $sdata['product_quantity']=$this->input->post('product_quantity',true);
        $sdata['product_short_description']=$this->input->post('product_short_description',true);
        $sdata['product_long_description']=$this->input->post('product_long_description',true);
        $sdata['product_image']= base_url().'uploads/products/'.$data['file_name'];
        $sdata['product_status']=$this->input->post('product_status',true);
        //$this->load->model('super_admin_model');
        $this->super_admin_model->save_new_product_info($sdata);
        
        $ssdata=array();
        $ssdata['message']= "Save Category Info Successfuly";
        $this->session->set_userdata($ssdata);
        
        redirect('super_admin/add_new_product');
    }
    public function view_all_product()
    {
        $data = array();
        //$this->load->model('super_admin_model');
        //$data['all_product_category']=$this->super_admin_model->view_product_category_info();
        //$data['all_product_info']=$this->super_admin_model->view_all_product_info();
        $data['content'] = $this->load->view('admin/view_all_product','', true);
        $this->load->view('admin/admin_master', $data);
    }
    public function ajax_product_view($search_text=null)
    {
        $data=array();
        $data['all_product_info']=$this->super_admin_model->ajax_view_all_product_info($search_text);
        echo $this->load->view('admin/ajax_product_view', $data, true);
        
    }




    public function delete_product($product_id)
    {
        $this->super_admin_model->delete_product_info($product_id);
        
        $sdata=array();
        $sdata['message']= "Product Delete Successfully!!!!";
        $this->session->set_userdata($sdata);
        
        redirect('super_admin/view_all_product');
    }
    public function unpublished_product($product_id)
    {
        $this->super_admin_model->unpublished_product_info($product_id);
        redirect('super_admin/view_all_product');
    }
    public function published_product($product_id)
    {
        $this->super_admin_model->published_product_info($product_id);
        redirect('super_admin/view_all_product');
    }
    public function edit_product($product_id)
    {
        $data=array();
        //$this->load->model('super_admin_model');
        $data['all_product_category']=$this->super_admin_model->view_product_category_info();
        $data['product_info']=$this->super_admin_model->edit_product_info($product_id);
        $data['content'] = $this->load->view('admin/edit_product',$data, true);
        $this->load->view('admin/admin_master', $data);
    }
    public function update_new_product($product_id)
    {
        $config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {
            $error = $this->upload->display_errors();
           //echo '<pre>';
           //print_r($error);
           // exit();
        } else {
            $data = $this->upload->data();
           //echo '<pre>';
           //print_r($data);
           //exit();
        }
        $sdata=array();
        $sdata['category_id']=$this->input->post('category_id',true); 
        $sdata['product_name']=$this->input->post('product_name',true);
        $sdata['product_price']=$this->input->post('product_price',true);
        $sdata['product_quantity']=$this->input->post('product_quantity',true);
        $sdata['product_short_description']=$this->input->post('product_short_description',true);
        $sdata['product_long_description']=$this->input->post('product_long_description',true);
        $sdata['product_image']= base_url().'uploads/products/'.$data['file_name'];
        $sdata['product_status']=$this->input->post('product_status',true);
        //$this->load->model('super_admin_model');
        $this->super_admin_model->Update_product_info($sdata,$product_id);
        
        $ssdata=array();
        $ssdata['message']= "Update Product Info Successfuly";
        $this->session->set_userdata($ssdata);
        
        redirect("super_admin/edit_product/$product_id");
    }
    public function graphical_report()
    {
        $data = array();
        $data['content'] = $this->load->view('admin/PieChartTest', $data, true);
        $this->load->view('admin/admin_master', $data);
    }

}

?>
