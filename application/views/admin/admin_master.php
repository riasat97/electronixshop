<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- DNS prefetch -->
    <link rel=dns-prefetch href="//fonts.googleapis.com">

    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
         More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

    <!-- CSS: implied media=all -->
    <!-- CSS concatenated and minified via ant build script-->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/style.css"> <!-- Generic style (Boilerplate) -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/960.fluid.css"> <!-- 960.gs Grid System -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/main.css"> <!-- Complete Layout and main styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/buttons.css"> <!-- Buttons, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/lists.css"> <!-- Lists, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/icons.css"> <!-- Icons, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/notifications.css"> <!-- Notifications, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/typography.css"> <!-- Typography -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/forms.css"> <!-- Forms, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/tables.css"> <!-- Tables, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/charts.css"> <!-- Charts, optional -->
    <link rel="stylesheet" href="<?php echo base_url();?>admin_css/jquery-ui-1.8.15.custom.css"> <!-- jQuery UI, optional -->
    <!-- end CSS-->

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
    <!-- end Fonts-->

    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

    <!-- All JavaScript at the bottom, except for Modernizr / Respond.
         Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
         For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
    <script src="<?php echo base_url();?>js/libs/modernizr-2.0.6.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/ajax_request.js"></script>
    <script type="text/javascript">
        function checkDelete()
        {
            var chk=confirm("Are You Sure To Delete This !");
            if(chk)
                {
                  return true;  
                }
                else{
                    return false;
                }
        }
    </script>
</head>

<body id="top">

  <!-- Begin of #container -->
  <div id="container">
  	<!-- Begin of #header -->
    <div id="header-surround"><header id="header">
    	
    	<!-- Place your logo here -->
		<img src="<?php echo base_url();?>img/logo.png" alt="Grape" class="logo" width="150px" height="50px">
		
		<!-- Divider between info-button and the toolbar-icons -->
		<div class="divider-header divider-vertical"></div>
		
		<!-- Info-Button -->
		<!-- Begin from Toolbox -->
                
		
		<!-- Begin of #user-info -->
		<div id="user-info">
			<p>
                            Hello <?php echo $this->session->userdata('admin_name');?>
                            <a href="<?php echo base_url();?>super_admin/logout" class="button red">Logout</a>
			</p>
		</div> <!--! end of #user-info -->
		
    </header></div> <!--! end of #header -->
    
    <div class="fix-shadow-bottom-height"></div>
	
	<!-- Begin of Sidebar -->
    <aside id="sidebar">
    	
    	<!-- Search -->
    	<div id="search-bar">
			<form id="search-form" name="search-form" action="search.php" method="post">
				<input type="text" id="query" name="query" value="" autocomplete="off" placeholder="Search">
			</form>
		</div> <!--! end of #search-bar -->
		
		<!-- Begin of #login-details -->
		<section id="login-details">
    		<img class="img-left framed" src="<?php echo base_url();?>img/misc/avatar_small.png" alt="Hello Admin">
    		<h3>Logged in as</h3>
    		<h2><a class="user-button" href="javascript:void(0);">Administrator&nbsp;<span class="arrow-link-down"></span></a></h2>
    		<ul class="dropdown-username-menu">
    			<li><a href="#">Profile</a></li>
    			<li><a href="#">Settings</a></li>
    			<li><a href="#">Messages</a></li>
    			<li><a href="#">Logout</a></li>
    		</ul>
    		
    		<div class="clearfix"></div>
  		</section> <!--! end of #login-details -->
    	
    	<!-- Begin of Navigation -->
    	<nav id="nav">
	    	<ul class="menu collapsible shadow-bottom">
                    <li><a href="<?php echo base_url(); ?>super_admin/add_product_category" class="folder">Add Product categories</a></li>
                    <li><a href="<?php echo base_url(); ?>super_admin/view_product_category" class="folder">view Product categories</a></li>
                    <li><a href="<?php echo base_url(); ?>super_admin/add_new_product" class="cart">Add New Products</a></li>
                    <li><a href="<?php echo base_url(); ?>super_admin/view_all_product" class="cart">View All Products</a></li>                               
                    <li><a href="<?php echo base_url(); ?>super_admin/graphical_report" class="cart">Graphical Report</a></li>
	    	</ul>
    	</nav> <!--! end of #nav -->
    	
    </aside> <!--! end of #sidebar -->
    
    <!-- Begin of #main -->
    <div id="main" role="main">
    	
    	<!-- Begin of titlebar/breadcrumbs -->
		<div id="title-bar">
			<ul id="breadcrumbs">
				<li><a href="<?php echo base_url();?>" title="Home"><span id="bc-home"></span></a></li>
				<li class="no-hover">Dashboard</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
                    <?php
                        echo $content;
                    ?>
                </div> <!--! end of #main-content -->
  </div> <!--! end of #main -->

    
    <footer id="footer"><div class="container_12">
		<div class="grid_12">
    		<div class="footer-icon align-center"><a class="top" href="#top"></a></div>
		</div>
    </div></footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="<?php echo base_url();?>js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery-ui-1.8.15.custom.min.js"></script> <!-- jQuery UI -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.dataTables.min.js"></script> <!-- Tables -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
  <script defer src="<?php echo base_url();?>js/mylibs/excanvas.js"></script> <!-- Charts -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.visualize.js"></script> <!-- Charts -->
  <script defer src="<?php echo base_url();?>js/mylibs/jquery.slidernav.min.js"></script> <!-- Contact List -->
  <script defer src="<?php echo base_url();?>js/common.js"></script> <!-- Generic functions -->
  <script defer src="<?php echo base_url();?>js/script.js"></script> <!-- Generic scripts -->
  
  <script type="text/javascript">
	$().ready(function() {
		
		/*
		 * Form Validation
		 */
		$.validator.setDefaults({
			submitHandler: function(e) {
				$.jGrowl("Form was successfully submitted.", { theme: 'success' });
				$(e).parent().parent().fadeOut();
				v.resetForm();
				v2.resetForm();
				v3.resetForm();
			}
		});
		var v = $("#create-user-form").validate();
		jQuery("#reset").click(function() { v.resetForm(); $.jGrowl("User was not created!", { theme: 'error' }); });
		
		var v2 = $("#write-message-form").validate();
		jQuery("#reset2").click(function() { v2.resetForm(); $.jGrowl("Message was not sent.", { theme: 'error' }); });
		
		var v3 = $("#create-folder-form").validate();
		jQuery("#reset3").click(function() { v3.resetForm(); $.jGrowl("Folder was not created!", { theme: 'error' }); });
		
		var validateform = $("#validate-form").validate();
		$("#reset-validate-form").click(function() {
			validateform.resetForm();
			$.jGrowl("Blogpost was not created.", { theme: 'error' });
		});
	});
  </script>
  <!-- end scripts-->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>