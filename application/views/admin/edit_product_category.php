<div class="block-border">
    <div class="block-header">
        <h1>Edit Product Category</h1><span></span>
        <p style="color: green;">
                <?php
                $message=$this->session->userdata('message');
                if (isset($message))
                {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
       </p>
    </div>
    <form  class="block-content form" action="<?php echo base_url();?>super_admin/update_product_category/<?php echo $product_category_info->category_id;?>" method="post" enctype="multipart/form-data">
        <div class="_100">
            <p>
                <label for="textfield">Category Name</label><input id="textfield" name="category_name" class="required" type="text" value="<?php echo $product_category_info->category_name;?>" />
                <input id="textfield" name="category_id" class="required" type="hidden" value="<?php echo $product_category_info->category_id;?>" />
            </p>
        </div>

        <div class="_100">
            <p><label for="textarea">Category Description</label><textarea id="textarea" name="category_description" class="required" value="" rows="5" cols="40"><?php echo $product_category_info->category_description;?></textarea></p>
        </div>

        <div class="_100">
            <table>
                  <tr>
                      <td width="250px"><p><label for="textfield">Change Category Image</label><input id="textfield" name="category_image" class="required" type="file" value="" /> </p> </td>
                      <td><p><label for="textfield">Uploaded Image</label><img src="<?php echo $product_category_info->category_image; ?>" width="50px" /></p> </td>
                  </tr>
           </table> 
        </div>

        <div class="_50">
            <p>
                <span class="label">Publication Status</span>
                <?php
                if ($product_category_info->publication_status == 1)
                {
                ?>
                <label><input checked="checked" type="radio" name="publication_status" value="1" />Published</label>
                <label><input type="radio" name="publication_status" value="0" />Unpublished</label>
                <?php  
                }
                 else { ?>
                 <label><input type="radio" name="publication_status" value="1" />Published</label>
                 <label><input checked="checked" type="radio" name="publication_status" value="0" />Unpublished</label>
                 <?php }?>
            </p>
        </div>


        <div class="clear"></div>
        <div class="block-actions">

            <ul class="actions-right">
                <input type="submit" class="button" value="UPDATE CATEGORY">
            </ul>
        </div>
    </form>
</div>