<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/ico" sizes="" href="<?php echo base_url();?>assets/images/icon/favicon.ico">
		<title>EZBTC:: Buy or Sell Bitcoin Instantly</title>
		<link href="<?php echo base_url();?>assets/backend/css/style.css" rel="stylesheet">
	</head>
	<body class="signin">
		<section>		  
			<div class="signinpanel">				
				<div class="row">				
					<div class="col-md-6 col-md-offset-3">						
						<div class="signin-info text-center">
							<div class="logopanel">
								<h1><span>
									<a href="<?php echo base_url();?>"><img alt="Logo" src="<?php echo base_url();?>assets/images/logo.png"></a>
								</span></h1>
							</div>						
							<div class="mb20"></div>							
						</div>
						<div class="clearfix"></div>
						<form action="<?php echo base_url();?>admin/login/authentication" method="post" id="login-form">
							<?php  if (isset($error)) { ?>
								<span style="color:red">
								   <b><?php echo $error; ?></b>
							   </span>
							<?php } ?>
							<p class="mt5 mb20">Login to access your account.</p>
							<input type="text" id="email_username" name="email_username" class="form-control uname" placeholder="Enter Email or Username" />
							<input type="password" id="password" name="password" class="form-control pword" placeholder="Enter Password" />
							<input type="hidden" name="uid"/>
							<input type="hidden" name="logged_date"/>
							<input class="btn btn-success btn-block" type="submit" value="Login"/>
						</form>
					</div>
				</div>
				<br><br><br><br>
				<div class="clearfix"></div>
				<div class="signup-footer">
					<div class="pull-left">
						<a href="javascript:void(0)"><i class="fa fa-phone"></i> 1-877-755-2249</a>&nbsp;&nbsp;
						<a href="javascript:void(0)"><i class="fa fa-envelope"></i> info@ezbtc.ca</a>
					</div>
					<div class="pull-right">
						Copyright 2016 - EZBTC. All Rights Reserved.
					</div>
				</div>
			</div>
		</section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/backend/js/bootstrap.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
		<script>
		jQuery(function() {
			jQuery("#login-form").validate({    
				rules: {
					email_username: {
						required: true,
					},
					password:{
						required: true							
					},
				}, 
				messages: {
					email_username: "Field is required",
					password: { 
						required: "Password is required", 			
					},
				},					
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
		</script>
	</body>
</html>
