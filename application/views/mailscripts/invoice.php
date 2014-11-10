<?php
$cdata = $this->cart->contents(); ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/invoice.css">
        <link rel="license" href="http://www.opensource.org/licenses/mit-license/">
        <script src="<?php echo base_url(); ?>js/invoice.js"></script>
    </head>
    <body>
        <header>
            <h1>Invoice</h1>
            <span><img alt="" src="<?php //echo base_url(); ?>images/invoice_logo.png"></span>
            
            <address contenteditable>
                <h3>Billing information</h3>
                <p><label>Customer Name:</label> <?php echo $customer_last_name; ?></p>
                <p><label>Address:</label> <?php echo $address; ?>,<label>City:</label> <?php echo $city; ?></p>
                <p><label>Zip Code</label><?php echo $zip_code; ?>, <label>Country:</label><?php echo $country; ?></p>
                <p><label>Phone No:</label> <?php echo $phone_no; ?></p>
            </address>

        </header>

        <article>
            <h3>Shipping Information</h3>
            <address contenteditable>
                <p><label>Customer Name:</label> <?php echo $shipping_info->full_name; ?></p>
                <p><label>Address:</label> <?php echo $shipping_info->address; ?>,<label>City:</label> <?php echo $shipping_info->city; ?></p>
                <p><label>Zip Code</label><?php echo $shipping_info->zip_code; ?>, <label>Country:</label><?php echo $shipping_info->country; ?></p>
                <p><label>Phone No:</label> <?php echo $shipping_info->phone_no; ?></p>
            </address>
            <table class="meta">
                <tr>
                    <th><span contenteditable>Invoice #</span></th>
                    <td><span contenteditable>101138</span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Date</span></th>
                    <td><span contenteditable><?php echo date("d-m-y");?></span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Amount Due</span></th>
                    <td><span id="prefix" contenteditable>BDT</span><span> <?php echo $this->cart->total(); ?></span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span contenteditable>Product Name</span></th>
                        <th><span contenteditable>Rate</span></th>
                        <th><span contenteditable>Quantity</span></th>
                        <th><span contenteditable>Sub Total</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cdata as $v_cdata) { ?>
                    <tr>
                        <td><a class="cut">-</a><?php echo $v_cdata['name'] ?><span contenteditable></span></td>
                        <td><span data-prefix></span><span contenteditable>BDT <?php echo $v_cdata['price'] ?></span></td>
                        <td><span contenteditable><?php echo $v_cdata['qty'] ?></span></td>
                        <td><span data-prefix></span><span>BDT <?php echo $v_cdata['subtotal'] ?></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table class="balance">
                <tr>
                    <th><span contenteditable>Total</span></th>
                    <td><span data-prefix></span><span>BDT <?php echo $this->cart->total(); ?></span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Amount Paid</span></th>
                    <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
                </tr>
                <tr>
                    <th><span contenteditable>Balance Due</span></th>
                    <td><span data-prefix></span><span>BDT <?php echo $this->cart->total(); ?></span></td>
                </tr>
            </table>
        </article>
        <aside>
            <h1><span contenteditable>Additional Notes</span></h1>
            <div contenteditable>
                <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
            </div>
        </aside>
    </body>
</html>