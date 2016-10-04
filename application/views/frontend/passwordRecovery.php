<?php include 'header.php'; ?>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-sm-12 col-md-offset-1">
			<?php if (isset($message)) { ?>
				<center><h3 style="color:green;">Data inserted successfully</h3></center><br>
			<?php } ?>
			<div class="register_box" style="min-height: 0px;">
				<h1>Enter new password</h1>
				<form action="<?php base_url(); ?>login/newpassword" method="post" id="reg-form" >				
					<div class="row">
						<div class="col-sm-4">
							<?php echo form_label('Password'); ?>
							<input type="password" id="password" name="password" placeholder="Enter password" required />							
						</div>
						<div class="col-sm-4">
							<?php echo form_label('Confirm Password'); ?>
							<input type="password" id="confirmation" name="confirmation" placeholder="Confirm Password" required/>
							<?php echo form_error('equalTo','<div class="text-danger">', '</div>'); ?>							
						</div>
					</div>
					<br/><br/>		
					<div class="clearfix"></div>					
					<div class="row">
						<div class="col-sm-4">							
							<input type="submit" value="Submit"/>
						</div>
					</div>	
				</form>
			</div>
		</div>	
	</div>
</div>	
	
<?php include 'footer.php'; ?>

<script>

jQuery(function() {
    jQuery("#reg-form").validate({    
        rules: {
           	
            password:{
				required: true,			
				pwcheck: true,
				minlength: 8
			},
			confirmation:{
				required: true,
				minlength: 8,
				equalTo: "#password"
			},
        },
        messages: {
			password: { 
                required: "Password is required", 
                rangelength: jQuery.format("Enter at least {0} characters"),
				pwcheck: ""				
            },
			confirmation: {
				required: "Repeat your password", 
				minlength: jQuery.format("Enter at least {0} characters"), 
				equalTo: "Password does not match" 
			},
        },
	        
        submitHandler: function(form) {
            form.submit();
        }
    });
	
	$.validator.addMethod("pwcheck", function(value) {
	return /[A-Z]/.test(value) 
		|| /[a-z]/.test(value) 
		|| /\d/.test(value)
		|| /[@#$%]/.test(value)  
	});
	
  });

</script>