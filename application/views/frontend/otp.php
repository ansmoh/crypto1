<?php include 'header.php'; ?>
</div>
<?php
	header('Cache-Control: max-age=900');
?>
<div class="container">
	<div class="row">	
		<div class="col-md-10 col-sm-12 col-md-offset-1">
			<div class="register_box otp_bx">
				<div class="row">
					<div class="col-sm-6">
					<p id="msg_status">
						<?php if($this->session->flashdata('time_expiry')){
							echo $this->session->flashdata('time_expiry');
						} else if($this->session->flashdata('wrong_otp')) {
							echo $this->session->flashdata('wrong_otp');
						} else {
							
						}
						 ?>
					</p>
					<h1>Verify Mobile Number</h1>
					<p class="smll">Please enter the code that we have sent to your phone. 
						If you did not receive it you can request a new code using <b>"Resend Code"</b>.</p>
						<br><br>
						
						<p><b>Enter the Code To Confirm Your Phone Number</b></p>
						<?php echo form_open('dashboard/otp', array('id' => 'form_smsverification')); ?>
							<?php echo form_input(array('id' => 'otp', 'class' => 'required', 'name' => 'otp', 'placeholder'=> 'Enter OTP', 'style'=> 'width:52%' )); ?>
							<?php echo form_submit(array('id' => 'submit' ,'name' => 'submit', 'value' => 'Confirm OTP')); ?><br>	
						<?php echo form_close(); ?>
					</div>
					<div class="col-sm-6 text-center">
						<img src="<?php echo base_url();?>assets/images/phone_otp.png" alt="">
					</div>			
				</div>
			</div>
		</div>	
	</div>
</div>

<?php include 'footer.php'; ?>

<script>
	$(function(){
		$('#form_smsverification').validate();
	});
	function regenerateOtp(id){
		function_url = '<?php echo base_url(); ?>register/regenerate_otp_token';
		$.ajax({
			type: "POST",
			url : function_url,
			data: {user_id: id},
			success: function(response) {
			$("#msg_status").html("<span id='r_Otp'>OTP send your mobile successfully</span>");
			// alert(response);
		}
	}); 
}
</script>