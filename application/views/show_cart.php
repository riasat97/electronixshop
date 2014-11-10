
<table cellpadding="6" cellspacing="1" style="width:95%; background: #F7F3F3; color: #000; margin-bottom: 10px; margin-left: 13px;border: 1px solid #ddd; border-radius: 5px;" border="0">

    <tr>
        <td colspan="3" style="border-bottom: 1px solid #ddd; font-size:22px"><span style="color:#BD332A;">Shopping</span> <span style="color:#104A55;">Cart</span></td>
        <td colspan="2" class="right" style="border-bottom: 1px solid #ddd;">
            <?php
                $customer_id=$this->session->userdata('customer_id');
                if($customer_id==null)
                {
            ?>
                    <a href="<?php echo base_url();?>checkout/customer_registration"><button style="background:#BD332A; border: none; color: #fff;font-size: 16px; text-decoration: none; height: 35px; cursor: pointer; border-radius: 3px;">Proceed To Checkout</button></a>
            <?php } ?>
        </td>
    </tr>
    
    <tr style="">
        <th style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; color: #104A55;">Action</th>
        <th style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; color: #104A55;">QTY</th>
        <th style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; color: #104A55;">Item Description</th>
        <th style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; color: #104A55;">Item Price</th>
        <th style="text-align:center; border-bottom: 1px solid #ddd; color: #104A55;">Sub-Total</th>
    </tr>
    <?php foreach ($this->cart->contents() as $items): ?>

        <tr>
            <td style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">
                <a style="text-decoration:none; color: red;" href="<?php echo base_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>">Remove</a>
            </td>
            <td style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;">        
                <form action="<?php echo base_url(); ?>cart/update_cart/" method="post">
                    <input type="text" name="qty" size="3" value="<?php echo $items['qty']; ?>">
                    <input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
                    <input type="submit" name="btn" value="Update">
                </form>
            </td>
            <td style="text-align:center; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;"><?php echo $items['name']; ?></td>
            <td style="text-align:right; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd;"><?php echo $this->cart->format_number($items['price']); ?></td>
            <td style="text-align:right; border-bottom: 1px solid #ddd;">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>        
        </tr>

    <?php endforeach; ?>

    <tr>
        <td colspan="3" class="right"><a href="<?php echo base_url();?>home"><button style="background:#BD332A; border: none; color: #fff;font-size: 18px; height: 30px; cursor: pointer; border-radius: 3px;text-decoration: none;"><span>Continue Shopping</span></button></a></td>
        <td style="text-align: right;" class="right"><strong>Total</strong></td>
        <td style="text-align: right;" class="right">BDT.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
    </tr>

</table>
<?php 
    $customer_id=$this->session->userdata('customer_id');
    $shipping_id=$this->session->userdata('shipping_id');

    if($customer_id !=NULL && $shipping_id ==NULL )
    {
        $this->load->view('shipping_info');
    } 
    if($customer_id !=NULL && $shipping_id !=NULL )
    {
        $this->load->view('payment_method');
    }
?>