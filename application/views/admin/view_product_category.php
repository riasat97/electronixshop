<div class="grid_12">
    <div class="block-border">
        <div class="block-header">
            <h1>View Product Category</h1><span></span>
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
        <div class="block-content">
            <table id="table-example" class="table">
                <thead>
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                           foreach ($all_product_category as $v_category )
                           {
                    ?>
                    <tr class="gradeX">
                        <td><?php echo $v_category->category_id?></td>
                        <td><?php echo $v_category->category_name?></td>
                        <td><img alt="" src="<?php echo $v_category->category_image?>"  width="50px";  height="50px"; /></td>
                        <td><?php 
                        if ($v_category->publication_status == 1)
                        {
                            echo 'Published';
                        }
                        else {
                            echo 'Unpublished';
                        }
                        ?>
                        </td>
                        <td class="center">
                            <a href="<?php echo base_url();?>super_admin/edit_product_categogy/<?php echo $v_category->category_id?>">Edit</a> !
                            <a href="<?php echo base_url();?>super_admin/delete_product_categogy/<?php echo $v_category->category_id?>" onclick="return checkDelete();">Delete</a> !
                            <?php 
                            if ($v_category->publication_status == 1)
                            { ?>
                                <a href="<?php echo base_url();?>super_admin/unpublished_product_categogy/<?php echo $v_category->category_id?>">Unpublished</a>
                           <?php 
                               }
                            else { ?>
                                <a href="<?php echo base_url();?>super_admin/published_product_categogy/<?php echo $v_category->category_id?>">Published</a>
                           <?php } ?>
                        </td>
                    </tr> 
                           <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
    echo $this->pagination->create_links();
?>