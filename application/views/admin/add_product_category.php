<div class="block-border">
    <div class="block-header">
        <h1>Add Product Category
        </h1>
        <p style="color: green;">
        <?php
            $message=$this->session->userdata('message');
            if(isset($message)){
                echo " ".$message;
                $this->session->unset_userdata('message');          
            }
            ?>
            </p>
    </div>
    <form  class="block-content form" action="<?php echo base_url();?>super_admin/save_product_category" method="post" enctype="multipart/form-data">
        <div class="_100">
            <p><label for="textfield">Category Name</label><input id="textfield" name="category_name" class="required" type="text" value="" /></p>
        </div>

        <div class="_100">
            <p><label for="textarea">Category Description</label><textarea id="textarea" name="category_description" class="required" rows="5" cols="40"></textarea></p>
        </div>

        <div class="_100">
            <p><label for="textfield">Category Image</label><input id="textfield" name="category_image" class="required" type="file" value="" /></p>
        </div>

        <div class="_50">
            <p>
                <span class="label">Publication Status</span>
                <label><input type="radio" name="publication_status" value="1" />Published</label>
                <label><input type="radio" name="publication_status" value="0" />Unpublished</label>
            </p>
        </div>


        <div class="clear"></div>
        <div class="block-actions">
            <ul class="actions-right">
                <li><input type="submit" class="button" value="Save Category"></li>
            </ul>
        </div>
    </form>
</div>