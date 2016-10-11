<?php include 'header.php' ?>
<?php include 'banner.php' ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left_bar">
				<?php include 'left_menu.php'; ?>
			</div>
		</div>
		<div class="col-sm-9 p_t20 add_dash">
			
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
	
			<div class="well">
			<div class="p_20 full_wid">
				<?php if($size1 != 0) { ?>	
					<?php if(current_url() == $url){ ?>
						<p><?php print_r($result); ?></p>
					<?php } ?>				
					<!--<p>Thank you for becoming a verified member of EZBTC. Please place your order to either to buy, sell or send Bitcoin using the icons found on screen.</p><br/><p>If you require assistance, you can contact us using live chat, calling us or via email. We are always happy to help.</p>-->	
				<?php } else {?>	
					<div id="para1">
						
						<p>We are currently still developing your personal dashboard. In the meantime you and buy and sell bitcoin using the icons above or the links to the left.</p><br/><p>In order to buy or sell on ezBtc you first need to verify your account by clicking the link and providing the documentation requested.</p><br/><p>Verifications are done within 12 hours unless you specify a later date for your video chat.</p><br/><p>Thanks for joining ezBtc, keep coming back and watch as we keep developing our platform. We have a lot planned for this space.</p>
					</div>
				<?php } ?>		
			<p id="para_bit"></p>
			<p id="para_sell"></p>
			</div></div>
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
