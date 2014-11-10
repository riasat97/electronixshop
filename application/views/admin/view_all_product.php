<script type="text/javascript">
    makerequest('<?php echo base_url();?>super_admin/ajax_product_view/','result','');
</script>
<div class="grid_12">
    <div class="block-border">
        <div class="block-header">
            <h1>All Product</h1><span></span>
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
        <br/>
        <br/>
        <input type="text" id="search_text" onkeyup="makerequest('<?php echo base_url();?>super_admin/ajax_product_view/','result',this.value);">
        <div class="block-content" id="result"></div>
    </div>
</div>