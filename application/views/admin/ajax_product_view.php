<table id="table-example" class="table">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Product Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <tr class="gradeX">  

            <?php
            foreach ($all_product_info as $v_Product) {
                ?>
                <td><?php echo $v_Product->category_id ?></td>
                <td><?php echo $v_Product->product_name ?></td>
                <td><?php echo $v_Product->product_price ?></td>
                <td><?php echo $v_Product->product_quantity ?></td>
                <td><img alt="" src="<?php echo $v_Product->product_image ?>"  width="50px";  height="50px"; /></td>
                <td><?php
            if ($v_Product->product_status == 1) {
                echo 'Published';
            } else {
                echo 'Unpublished';
            }
                ?>
                </td>
                <td class="center">
                    <a href="<?php echo base_url(); ?>super_admin/edit_product/<?php echo $v_Product->product_id ?>">Edit</a> !
                    <a href="<?php echo base_url(); ?>super_admin/delete_product/<?php echo $v_Product->product_id ?>" onclick="return checkDelete();">Delete</a> !
    <?php
    if ($v_Product->product_status == 1) {
        ?>
                        <a href="<?php echo base_url(); ?>super_admin/unpublished_product/<?php echo $v_Product->product_id ?>">Unpublished</a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo base_url(); ?>super_admin/published_product/<?php echo $v_Product->product_id ?>">Published</a>
                    <?php }
                    ?>
                </td>
            </tr> 
                <?php } ?>
    </tbody>
</table>