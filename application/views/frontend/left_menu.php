<div class="profile_img">
	<div class="imge_bx"><img class="prof_img" src="<?php echo base_url()?>assets/images/camera.png" /></div>
	<?php if($this->session->userdata("username")) { ?>
	<h2>Hello <?php echo $this->session->userdata("username"); ?></h2>
	<?php } else { ?>
		<h2>Hello User</h2>
	<?php } ?>
	<?php if($size1 != 0) { ?>
		<h3>( Verified )</h3>
		<?php if($this->session->userdata('role') ==  '3') { ?>
			<h3>BTCPop Investor</h3>
		<?php } ?>
	<?php } else { ?>
		<h3>( Not Verified )</h3>
		<?php if($this->session->userdata('role') ==  '3') { ?>
			<h3>BTCPop Investor</h3>
		<?php } ?>
	<?php } ?>
</div>
<ul>
	<?php if(current_url() == base_url('dashboard')){?>
		<li class="active"><a href="<?php echo base_url()?>dashboard">My Dashboard</a></li>
	<?php } else { ?>
			<li><a href="<?php echo base_url()?>dashboard">My Dashboard</a></li>
	<?php } ?>
	<?php if(current_url() == base_url('dashboard/account_activate')){?>
		<?php if($size != 0) { ?>
			<?php if($size1 != 0){ ?>
				<li class="active"><a href="<?php echo base_url()?>dashboard/account_activate">Verify My Account</a></li>
			<?php } else { ?>
				<li class="active"><a href="<?php echo base_url()?>dashboard/account_activate" class="bold">Verify My Account</a></li>
			<?php } ?>
		<?php } else { ?>
			<li class="active"><a href="<?php echo base_url()?>dashboard/account_activate" class="bold">Verify My Account</a></li>
		<?php } ?>
	<?php } else { ?>
		<?php if($size != 0) { ?>
			<?php if($size1 != 0){ ?>
				<li><a href="<?php echo base_url()?>dashboard/account_activate">Verify My Account</a></li>
			<?php } else { ?>
				<li><a href="<?php echo base_url()?>dashboard/account_activate" class="bold">Verify My Account</a></li>
			<?php } ?>
		<?php } else { ?>
			<li><a href="<?php echo base_url()?>dashboard/account_activate" class="bold">Verify My Account</a></li>
		<?php } ?>
	<?php } ?>
	<?php if(current_url() == base_url('dashboard/transaction')){?>
		<li class="active"><a href="<?php echo base_url()?>dashboard/transaction">Manage Transactions</a></li>
	<?php } else { ?>
		<li><a href="<?php echo base_url()?>dashboard/transaction">Manage Transactions</a></li>
	<?php } ?>
	<?php if($size1 != 0) { ?>
		<?php if(current_url() == base_url('dashboard/buy_bitcoin')){?>
			<li class="active"><a href="<?php echo base_url()?>dashboard/buy_bitcoin">Buy Bitcoin</a></li>
		<?php } else { ?>
			<li><a href="<?php echo base_url()?>dashboard/buy_bitcoin">Buy Bitcoin</a></li>
		<?php } ?>	
	<?php } else { ?>
		<li><a href="javascript:void()" onclick="buybit_menu()">Buy Bitcoin</a></li>
	<?php } ?>		
	<?php if($size1 != 0) { ?>
		<?php if(current_url() == base_url('dashboard/sell_bitcoin')){?>
			<li class="active"><a href="<?php echo base_url()?>dashboard/sell_bitcoin">Sell Bitcoin</a></li>
		<?php } else { ?>
			<li><a href="<?php echo base_url()?>dashboard/sell_bitcoin">Sell Bitcoin</a></li>
		<?php } ?>
	<?php } else { ?>
		<li><a href="javascript:void()" onclick="sellbit_menu()">Sell Bitcoin</a></li>
	<?php } ?>
	<?php if(current_url() == base_url('dashboard/send_bitcoin')){?>
		<li class="active"><a href="<?php echo base_url()?>dashboard/send_bitcoin">Send Bitcoin</a></li>
	<?php } else { ?>
		<li><a href="<?php echo base_url()?>dashboard/send_bitcoin">Send Bitcoin</a></li>
	<?php } ?>
	<?php if(current_url() == base_url('dashboard/payment_method')){?>
		<li class="active"><a href="<?php echo base_url()?>dashboard/payment_method">Payment Methods</a></li>
	<?php } else { ?>
		<li><a href="<?php echo base_url()?>dashboard/payment_method">Payment Methods</a></li>
	<?php } ?>
	<?php if($this->session->userdata('role') ==  '3') { ?>
		<?php if(current_url() == base_url('dashboard/btc_investor')){?>
			<li class="active"><a href="<?php echo base_url()?>dashboard/btc_investor">BTCPop Investor Information</a></li>
		<?php } else { ?>
				<li><a href="<?php echo base_url()?>dashboard/btc_investor">BTCPop Investor Information</a></li>
		<?php } ?>
	<?php } ?>
	<li><a href="<?php echo base_url()?>login/logout">Log Out</a></li>
</ul>

<script>
function buybit_menu(){
	jQuery('#para_bit').html("Please verify your account to Buy Bitcoin.").show();
	jQuery('#para1').hide();
	jQuery('#para_sell').hide();
}

function sellbit_menu(){
	jQuery('#para_sell').html("Please verify your account to Sell Bitcoin.").show();
	jQuery('#para1').hide();
	jQuery('#para_bit').hide();
}
</script>