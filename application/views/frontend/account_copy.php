<?php include 'header.php' ?>

<?php include 'banner.php' ?>

<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left_bar">
				<?php include 'left_menu.php'; ?>
			</div>
		</div>
		<div class="col-sm-9 p_t20">
			<h1 class="title_name">Activate your account</h1>
				<div class="well">
						<div class="p_20 full_wid">
							<?php echo form_open_multipart('dashboard/account_copy',array('id' =>'fromaccount', )); ?>
							<h3 class="line"><span>Personal Information</span></h3>
							<div class="row"><div class="col-sm-4"><label for="fnam">First Name</label>
							<?php
								$f_name = array(
										'type'  => 'text',
										'name'  => 'f_name',
										'id'    => 'fnam',
										'data-validation' => '[NOTEMPTY]',
										'class' => 'form-control required',
										'placeholder' => "Enter First Name"
								);

								echo form_input($f_name); ?>
							</div>
							
							<div class="col-sm-4"><label for="lnam">Last Name</label>
								<?php
								$l_name = array(
										'type'  => 'text',
										'name'  => 'l_name',
										'id'    => 'lnam',
										'value' => '',
										'class' => 'form-control required',
										'placeholder' => "Enter Last Name"
								);

								echo form_input($l_name); ?>
							</div></div>
								
							<div class="row">
							<div class="col-sm-12"><label for="pass">Address</label>
								<?php
								$address = array(
										'type'  => 'text',
										'name'  => 'address',
										'id'    => 'address',
										'value' => '',
										'class' => 'form-control required',
										'placeholder' => "Enter Address"
								);

								echo form_input($address); ?>
							</div>
							<div class="col-sm-4"><label for="country">Country</label>
								<select class="form-control required" name="country" id="country">
									<option value="">- Select Country -</option>
									<?php foreach($countries as $country) { ?>
										<option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
									<?php } ?>
								</select>
							</div>
							
							<div class="col-sm-4"><label for="state">State</label>
							<select class="form-control required" name="state" id="state">
							<option value="">- Select State -</option>	
							</select></div>
							<div class="col-sm-4"><label for="city">City</label>
								<?php
								$city = array(
										'type'  => 'text',
										'name'  => 'city',
										'id'    => 'city',
										'value' => '',
										'class' => 'form-control required',
										'placeholder' => "Enter City"
								);

								echo form_input($city); ?>
							</div>
							
							<div class="col-sm-4"><label for="zip">Zip Code</label>
								<?php
								$zipcode = array(
										'type'  => 'text',
										'name'  => 'zipcode',
										'id'    => 'zipcode',
										'value' => '',
										'class' => 'form-control required',
										'placeholder' => "Enter Zip Code"
								);

								echo form_input($zipcode); ?>
							</div>
							
							<div class="col-sm-4"><label for="phonenumber">Phone Number</label>
								<?php
								$phonenumber = array(
										'type'  => 'text',
										'name'  => 'phonenumber',
										'id'    => 'phone',
										'value' => '',
										'class' => 'form-control required',
										'placeholder' => "Enter Phone Number"
								);

								echo form_input($phonenumber); ?>
							</div>
							
							
							</div>
							<br><br>
							
							<h3 class="line"><span>Identity Card</span></h3>
							<p>Identity card Upload related instructions.</p>
							<div class="row">
										<div class="col-sm-4"><label>Identity One</label>
											<div class="box_file">
											  <div class="box_upcall"><img id="blah1" src="<?php echo base_url();?>assets/images/brows.jpg" alt=""></div>
											  <input type="file" name="file1" id="myCheck_file1" class="required">
											</div>
										</div>
										
										<div class="col-sm-4"><label>Identity two</label>
										<div class="box_file">
										  <div class="box_upcall"><img id="blah2" src="<?php echo base_url();?>assets/images/brows.jpg" alt=""></div>
										  <input type="file" name="file2" id="myCheck_file2" class="required">
										</div>
										
									</div>
										
							</div>
							<br><br>
							<h3 class="line"><span>Payment Proof</span></h3>
							<p>Payment proof Upload related instructions.</p>
							<div class="row"><div class="col-sm-4"><label>Payment Proof</label>
										<div class="box_file">
										  <div class="box_upcall"><img id="blah3" src="<?php echo base_url();?>assets/images/brows.jpg" alt=""></div>
										  <input type="file" name="file3" id="myCheck_file3" class="required">
										</div>
										</div>
										
							</div>

							<br><br>
							<h3 class="line"><span>Video Verification</span></h3>
							<div class="row">
							<div class="col-sm-4"><label for="video">Video Verification Type</label>
							<select id="video" name="videoverification" class="form-control required">
							<option value="skypecall">Skype Call</option>
							<option value="facetime">Face Time</option>
							</select>
							</div>
							
							<div class="col-sm-4"><label for="date">Date For Video call</label>
								<?php
								$date = array(
										'type'  => 'text',
										'name'  => 'date',
										'id'    => 'date',
										'value' => '',
										'class' => 'form-control required',
										'placeholder' => "DD/MM/YYYY"
								);

								echo form_input($date); ?>
							</div>
							
							
							<div class="col-sm-4"><label for="time">Time for video Call</label>
								<select id="time" name="time" class="form-control required">
									<option>00:00 - 00:30</option>
									<option>00:30 - 01:00</option>
									<option>01:00 - 01:30</option>
									<option>01:30 - 02:00</option>
									<option>02:00 - 02:30</option>
									<option>02:30 - 03:00</option>
									<option>03:00 - 03:30</option>
									<option>03:30 - 04:00</option>
									<option>04:00 - 04:30</option>
									<option>04:30 - 05:00</option>
									<option>05:00 - 05:30</option>
									<option>05:30 - 06:00</option>
									<option>06:00 - 06:30</option>
									<option>06:30 - 07:00</option>
									<option>07:00 - 07:30</option>
									<option>07:30 - 08:00</option>
									<option>08:00 - 08:30</option>
									<option>08:30 - 09:00</option>
									<option>09:00 - 09:30</option>
									<option>09:30 - 10:00</option>
									<option>10:00 - 10:30</option>
									<option>10:30 - 11:00</option>
								</select>
							</div>
							</div>
							<br>
							<?php 
							$submit = array(
									'name'          => 'submit',
									'id'            => 'submit',
									'value'         => 'Register',
									'class'         => 'submit'
							);
							echo form_submit($submit); ?>
						<?php echo form_close(); ?>			
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>
<script>
	function readURL(input,Id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#'+Id).attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$(function(){
		$('#fromaccount').validate();
		$( document ).ready(function(){
		
			$('#country').change(function(){
				var countryID = $(this).val();
				
				if(countryID == '') {
					$('#state').html('<option value="">- Select State -</option>');
					return false;
				}
				$.ajax({
					url: "<?php echo base_url();?>dashboard/ajax_state_option",
					data: {countryID : countryID},
					type: 'post',
					success: function(result){
						$("#state").html(result);
					}
				});
			});
		
			$("#myCheck_file1").change(function(){
				readURL(this,'blah1');
			});
			$("#myCheck_file2").change(function(){
				readURL(this,'blah2');
			});
			$("#myCheck_file3").change(function(){
				readURL(this,'blah3');
			});
		});
		
	});
	
</script>