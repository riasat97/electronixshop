<div class="block-border">
    <div class="block-header">
        <h1> Add Product 
        </h1><span></span>
           <?php
            $message=$this->session->userdata('message');
            if(isset($message)){
                echo " ".$message;
                $this->session->unset_userdata('message');          
            }
            ?>
    </div>
    <form class="block-content form" action="<?php echo base_url();?>super_admin/save_new_product" method="post" enctype="multipart/form-data">
        <div class="_100">
            <p><label for="textfield">Product Name</label><input id="textfield" name="product_name" class="required" type="text" value="" /></p>
        </div>
        <div class="_100">
            <p><label for="textfield">Product Category</label>
                <select name="category_id">
                    <?php
                    foreach ($all_product_category as $v_category) {
                    ?>
                    <option value="<?php echo $v_category->category_id;?>"><?php echo $v_category->category_name;?></option>
                    <?php } ?>
                </select>
            </p>
        </div>
        <div class="_100">
            <p><label for="textfield">Product Price</label><input id="textfield" name="product_price" class="required" type="text" value="" /></p>
        </div>
        <div class="_100">
            <p><label for="textfield">Product Quantity</label><input id="textfield" name="product_quantity" class="required" type="text" value="" /></p>
        </div>

        <div class="_100">
            <p><label for="textarea">Product Short Description</label><textarea id="textarea" name="product_short_description" class="required" rows="5" cols="40"></textarea></p>
        </div>
        <div class="_100">
            <p><label for="textarea">Product Long Description</label><textarea id="textarea" name="product_long_description" class="required" rows="5" cols="40"></textarea></p>
        </div>
        
          <div class="_100">
            <p><label for="textfield">Product Image</label><input id="textfield" name="product_image" class="required" type="file" value="" /></p>
        </div>

        <div class="_50">
            <p>
                <span class="label">Publication Status</span>
                <label><input type="radio" name="product_status" value="1" /> Published</label>
                <label><input type="radio" name="product_status" value="0" /> UnPublished</label>
                
            </p>
        </div>
                
        <div class="clear"></div>
        <div class="block-actions">
            <ul class="actions-right">
                <input type="submit" class="button" value="SAVE PRODUCT">
            </ul>
        </div>
    </form>
</div>