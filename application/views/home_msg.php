<div  style="color: green; font-size: 15px; width: 300px;" align="center">
    <?php
    $message = $this->session->userdata('message');
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
</div>
<div class="center_title_bar">Latest Products</div>
<?php 
foreach ($all_product_info as $v_Product)
{
?>
<div class="prod_box">
    
    <div class="center_prod_box">
        <div class="product_title"><a href=""><?php echo $v_Product->product_name;?></a></div>
        <div class="product_img"><a href="<?php echo base_url();?>home/product_details/<?php echo $v_Product->product_id;?>"><img src="<?php echo $v_Product->product_image;?>" alt="" border="0" width="95px" height="92px" /></a></div>
        <div class="prod_price"><span class="reduce"><?php echo "BDT.".$v_Product->product_price;?></span> <span class="price"><?php echo "BDT.".$v_Product->product_price;?></span></div>
    </div>
    
    <div class="prod_details_tab"> <a href="<?php echo base_url()?>cart/add_to_cart/<?php echo $v_Product->product_id;?>" class="prod_buy">Add to Cart</a> <a href="<?php echo base_url();?>home/product_details/<?php echo $v_Product->product_id;?>" class="prod_details">Details</a> </div>
</div>
<?php } ?>
