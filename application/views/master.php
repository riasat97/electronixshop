<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Electronics Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/iecss.css" />
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/boxOver.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ajax_request.js"></script>
</head>
<body>
<div id="main_container">
  <div id="header">
    <div class="top_right">
      <div class="languages">
        <div class="lang_text">Languages:</div>
        <a href="http://www.free-css.com/" class="lang"><img src="<?php echo base_url(); ?>images/en.gif" alt="" border="0" /></a> <a href="http://www.free-css.com/" class="lang"><img src="<?php echo base_url(); ?>images/de.gif" alt="" border="0" /></a> </div>
      <div class="big_banner"> <a href="http://www.free-css.com/"><img src="<?php echo base_url(); ?>images/banner728.jpg" alt="" border="0" /></a> </div>
    </div>
    <div id="logo"> <a href="http://www.free-css.com/"><img src="<?php echo base_url(); ?>images/logo.png" alt="" border="0" width="182" height="85" /></a> </div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
        <li><a href="<?php echo base_url();?>home" class="nav"> Home </a></li>
        <?php
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id != NULL) {
            ?>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>home/logout" class="nav">Logout</a></li>
        <?php } else { ?>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>home/sign_up" class="nav">Sign Up</a></li>
        <?php } ?>
		<li class="divider"></li>
        <li><a href="<?php echo base_url();?>home/contact" class="nav">Contact Us</a></li>
		<li class="divider"></li>
        <li><a href="#" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Specials</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">My account</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Shipping </a></li>
		<li class="divider"></li>
        <li><a href="#" class="nav">Details</a></li>
      </ul>
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
          <?php
          foreach ($all_product_category as $v_category) {
              ?>
              <li class="odd"><a href="<?php echo base_url(); ?>home/select_category_product/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></a></li>
          <?php } ?>
      </ul>
     </div>
    <!-- end of left content -->
    <div class="center_content">
      
      
      <?php echo $main_content; ?>
        
      
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="keyword"/>
        <a href="http://www.free-css.com/" class="join">search</a> 
      </div>
      <div class="shopping_cart">
          <div class="title_box"><a href="<?php echo base_url();?>cart/show_cart">View Shopping cart</a></div>
        <div class="cart_details"><?php echo $total_items." "."items";?><br />
          <span class="border_cart"></span> Total: <span class="price"><?php echo $total_amount." "."BDT";?></span> 
        </div>
        <div class="cart_icon"><a href="http://www.free-css.com/"><img src="<?php echo base_url(); ?>images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="<?php echo base_url(); ?>images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Template name. All Rights Reserved 2008<br />
      <a href="http://csscreme.com"><img src="<?php echo base_url(); ?>images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
      <img src="<?php echo base_url(); ?>images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="http://www.free-css.com/">home</a> <a href="http://www.free-css.com/">about</a> <a href="http://www.free-css.com/">sitemap</a> <a href="http://www.free-css.com/">rss</a> <a href="http://www.free-css.com/">contact us</a> </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
