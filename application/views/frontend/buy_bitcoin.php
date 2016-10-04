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
			<div class="row">
				<div class="col-xs-4 text-center">
					<a href="<?php echo base_url(); ?>dashboard/buy_bitcoin">
					<img alt="" src="<?php echo base_url(); ?>assets/images/add_money.png">
					<br>
					<span>Buy Bitcoin</span>
					</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="<?php echo base_url(); ?>dashboard/sell_bitcoin">
					<img alt="" src="<?php echo base_url(); ?>assets/images/with_dr.png">
					<br>
					<span>Sell Bitcoin</span>
					</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="<?php echo base_url(); ?>dashboard/send_bitcoin">
					<img alt="" src="<?php echo base_url(); ?>assets/images/send_bit.png">
					<br>
					<span>Send Bitcoin</span>
					</a>
				</div>
			</div>
			
			
<div class="well">
<div class="p_20 full_wid">
<h3 class="line"><span>Buy Bitcoin</span></h3>
<?php  if (isset($ms)) { ?>
		<span style="color:black">
		   <?php echo $ms; ?>
		</span>
<?php }?>
<form method="post" action="<?php echo base_url(); ?>dashboard/buy_bitcoin" id="test_form">
<div class="row">
	<div class="col-md-4">		
		<label for="fnam">Payment Method</label>
			<select name="payment_method" class="payment_method form-control" id="payment_method"">
				<option value="">Select Payment Method</option>
				<option value="Interac e-transfer">Interac e-transfer</option>
				<option value="Credit/Debit Card">Credit/Debit Card</option>
				<option value="Western Union">Western Union</option>
				<option value="Moneygram">Moneygram</option>
				<option value="Cash Deposit at Bank">Cash Deposit at Bank</option>
			</select>
		<label for="fnam">Enter Bitcoin Quantity</label>
		<input class="form-control" type="text" placeholder="Enter BitCoin Qty" autocomplete="off" name="buybitcoin" id="buybitcoin">
		<input class="form-control" type="hidden" name="ask4" id="ask4">
		<input class="form-control" type="hidden" name="total1" id="total1">
		<label for="fnam" class="p_buy">Current Buy Price : <span id="ask3"></span> </label>
		<label for="fnam" class="p_buy">Total Amount : <span id="total"></span></label>
		</div>
		<div class="col-md-12">
		<div class="note" style="display:none;"><label for="fnam">Note:</label><span>The user is responsible for fees associated with this payment method so final amount will vary slightly.</span></div>
	</div>
</div>
<br>
<input type="submit" id="submit" class="submit" value="Buy BitCoin">
</form>
</div>

</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>

<script>
jQuery(function() {
    jQuery("#test_form").validate({    
        rules: {
            buybitcoin: {
				required: true
			},
            payment_method: {
				required: true
			},
		},
        messages: {
			buybitcoin:{
				required: "Bitcoin is required"
			},
			payment_method: "Select Payment method",
        },
		
        submitHandler: function(form) {
            form.submit();
        }
    });	
});
</script>

