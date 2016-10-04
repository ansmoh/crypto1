<?php include 'header.php' ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-sm-12 col-md-offset-1">
			<div class="register_box" style="min-height: 0px;">
				<?php $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); ?>
				<h2>Please enter your email</h2>
				<?php  if (isset($error)) { ?>
                        <span style="color:red">
                           <?php echo $error; ?>
                       </span>
                <?php }?>
				<form action="<?php echo base_url();?>login/forget_password" method="post" id="login-form">
					<label for="email">Email</label>
					<input type="text" id="email" name="email" placeholder="Enter Email" required style="width:50%;"/>				
					<?php echo form_error('email','<div class="text-danger">', '</div>'); ?>				
					<br/><br/>		
					<div class="clearfix"></div>
					<input type="submit" value="Submit"/>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>

<script>
jQuery(function() {
    jQuery("#login-form").validate({    
        rules: {
            email: {
                required: true,
				email: true
            },
        },
        messages: {
			email: "Please enter a valid email address",
        },
	        
        submitHandler: function(form) {
            form.submit();
        }
    });
  });
</script>
