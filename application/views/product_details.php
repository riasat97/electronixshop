<div class="center_title_bar"><?php echo $product_details->product_name;?></div>
<div class="prod_box_big">
    <div class="top_prod_box_big"></div>
    <div class="center_prod_box_big">
        <div class="product_img_big"> <a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="<?php echo $product_details->product_image;?>" alt="" border="0" width="95px" height="92px" /></a>
            <div class="thumbs"> <a href="" title="header=[Thumb1] body=[&nbsp;] fade=[on]"><img src="<?php echo base_url();?>images/thumb1.gif" alt="" border="0" /></a> <a href="" title="header=[Thumb2] body=[&nbsp;] fade=[on]"><img src="<?php echo base_url();?>images/thumb1.gif" alt="" border="0" /></a> <a href="" title="header=[Thumb3] body=[&nbsp;] fade=[on]"><img src="<?php echo base_url();?>images/thumb1.gif" alt="" border="0" /></a> </div>
        </div>
        <div class="details_big_box">
            <div class="product_title_big"><?php echo $product_details->product_long_description;?></div>
            <div class="specifications"> Product Quantity: <span class="blue"><?php echo $product_details->product_quantity;?></span><br />
                Product Price: <span class="blue"><?php echo "BDT.".$product_details->product_price;?></span><br />
                Product Color: <span class="blue">Black</span><br />
                Product Size: <span class="blue">21"</span><br />
            </div>
            <div class="prod_price_big"><span class="reduce"><?php echo "BDT.".$product_details->product_price;?></span> <span class="price"><?php echo "BDT.".$product_details->product_price;?></span></div>
            <a href="<?php echo base_url()?>cart/add_to_cart/<?php echo $product_details->product_id;?>" class="addtocart">add to cart</a> <a href="" class="compare">compare</a> </div>
    </div>
    <div class="bottom_prod_box_big"></div>
</div>