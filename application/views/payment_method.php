<h3><strong>SELECT PAYMENT METHOD</strong></h3>
<?php $message = $this->session->userdata('message');
if ($message != null) { ?> 
    <div id="msg"><h3><?php echo $message; ?></h3></div>
    <?php $this->session->unset_userdata('message');
} ?>
<div class="content_half float_l checkout">
    <form action="<?php echo base_url();?>checkout/confirm_order" method="post">

        <input type="radio" name="payment_method" checked="checked" value="cash_on_delivery">
        <span id="paypal">Cash on Delivery</span>
        <br/>
        <input type="radio" name="payment_method" value="paypal">
        <span id="paypal">Paypal</span>

        <br/>
        <br/>
        <input type="submit"  value="Confirm to Order"  class="submit_btn float_l" />
    </form>
</div>

<div class="content_half float_r checkout">
    <div class="cleaner h10"></div>
    <h3>Shopping Cart</h3>
    <h4>TOTAL: <strong><?php echo $this->cart->total(); ?> BDT</strong></h4>
</div>
<div class="cleaner h50"></div>