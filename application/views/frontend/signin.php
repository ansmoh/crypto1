<?php include 'header.php' ?>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-5 col-sm-6 col-md-offset-1">
			<div class="register_box">
				<?php $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); ?>
				<h2>Log into Your Account</h2>
				<?php  if (isset($error)) { ?>
                        <span style="color:red">
                           <?php echo $error; ?>
                       </span>
                <?php }?>
				<form action="<?php echo base_url();?>login/authentication" method="post" id="login-form">
					<label for="email">Email or Username</label>
					<input type="text" id="email_username" name="email_username" placeholder="Enter Email or Username" required/>				
					<?php echo form_error('email','<div class="text-danger">', '</div>'); ?>
					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Enter Password" class="pass" required/>
					<input type="hidden" name="uid"/>
					<input type="hidden" name="logged_date"/>					
					<br/><br/>		
					<div class="clearfix"></div>
					<input type="submit" value="Login"/>
				</form>
				<br>
				<a class="forget" href="<?php echo base_url();?>login/forgetpassword"">Forgot your password?</a>
			</div>
		</div>	
		<div class="col-md-5 col-sm-6">
			<div class="register_box">
				<h2>New to <span>ezBtc</span> ?</h2>
				<p class="smll">In order to access all our features you need to create an account and complete the verification process. This is to ensure we comply with KYC, Anti-Money Laundering regulations, and protect against fraudulent transactions, eliminating fraud is better all of us.</p><p style="color:#333;font-size:11px;font-weight:bold; ">Note: We are still in beta, you may notice some functions are not yet complete. If you notice a bug please let us know. </p>
				<br><br>
				<a href="<?php echo base_url();?>register" class="submit">Sign Up</a>
			</div>
		</div>	
	</div>
</div>

<?php include 'footer.php' ?>

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