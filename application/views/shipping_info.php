<html>
    <head>
        <title>Shipping Information</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sign_up_form.css" />
    </head>
    <body>
        <form action="<?php echo base_url();?>checkout/save_shipping_info" method="post">
        <div class="container">
            <div class="personal_info_title">
                <div class="personal_info">
                    <h1>Provide Shipping Information</h1>
                    <div class="half_box">
                        <span class="box_title">Full Name</span><br />
                        <input class="half_box_input" type="text" name="full_name" value=""/>              
                    </div>
                    <div class="half_box">
                        <span class="box_title">Email</span><br />
                        <input class="half_box_input" type="email" name="email" value=""/>
                    </div>
                    <div class="half_box">
                        <span class="box_title">Cell Number</span><br />
                        <input class="half_box_input" type="text" name="cell_number" value=""/>
                    </div>
                </div>
            </div>
            <div class="address_info">
                <div class="personal_info">
                    <div class="full_box">
                        <span class="box_title">Address</span><br />
                        <textarea rows="5" cols="70" name="address"></textarea> 
                    </div>
                    <div class="half_box">
                        <span class="box_title">City</span><br />
                        <input class="half_box_input" type="text" name="city" value=""/>              
                    </div>
                    <div class="half_box">
                        <span class="box_title">Country</span><br />
                        <input class="half_box_input" type="text" name="country" value=""/>
                    </div>
                    
                    <div class="half_box">
                        <span class="box_title">Zip/Postal Code</span><br />
                        <input class="half_box_input" type="text" name="zip_code" value=""/>
                    </div>
                    
                </div>
            </div>
            <div class="submit_btn">
                <button class="btn" type="submit" >
                    <span>Next Step</span>
                </button>
            </div>
        </div>
        </form>
    </body>
</html>