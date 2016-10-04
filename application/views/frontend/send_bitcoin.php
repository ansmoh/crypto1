<?php 
	global $result; $url;
	foreach($content as $key => $value)
    {    
      $result = $value;  
    }
	foreach($page_url as $key => $value)
    {    
      $url = $value;  
    }
?>
<?php include 'header.php' ?>
</div>
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
				<?php if($size1 != 0) { ?>
					<a href="<?php echo base_url(); ?>dashboard/buy_bitcoin">
						<img alt="" src="<?php echo base_url(); ?>assets/images/add_money.png">	<br>
						<span>Buy Bitcoin</span>
					</a>
				<?php } else { ?>
					<a href="javascript:void()" onclick="buybit()">
						<img alt="" src="<?php echo base_url(); ?>assets/images/add_money.png"><br>		
						<span>Buy Bitcoin</span>
					</a>
				<?php } ?>
			</div>
			<div class="col-xs-4 text-center">
				<?php if($size1 != 0) { ?>
					<a href="<?php echo base_url(); ?>dashboard/sell_bitcoin">
						<img alt="" src="<?php echo base_url(); ?>assets/images/with_dr.png"><br>
						<span>Sell Bitcoin</span>
					</a>
				<?php } else { ?>
					<a href="javascript:void()" onclick="sellbit()">
						<img alt="" src="<?php echo base_url(); ?>assets/images/with_dr.png"><br>
						<span>Sell Bitcoin</span>
				<?php } ?>
			</div>
				<div class="col-xs-4 text-center">
					<a href="<?php echo base_url(); ?>dashboard/send_bitcoin">
					<img alt="" src="<?php echo base_url(); ?>assets/images/send_bit.png">
					<br>
					<span>Send Bitcoin</span>
					</a>
				</div>
			</div>
			<div class="well bal text-center">
				<div id="para1">
					<!--<h2>Coming Soon</h2>-->
					<?php if(current_url() == $url){ ?> 
						<?php print_r($result); ?>
					<?php } ?>
				</div>
				<p id="para_bit"></p>
				<p id="para_sell"></p>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>

<script>
function buybit(){
	jQuery('#para_bit').html("Please verify your account to Buy Bitcoin.").show();
	jQuery('#para1').hide();
	jQuery('#para_sell').hide();
}

function sellbit(){
	jQuery('#para_sell').html("Please verify your account to Sell Bitcoin.").show();
	jQuery('#para1').hide();
	jQuery('#para_bit').hide();
}
</script>

