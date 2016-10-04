<?php include 'header.php' ?>

<div class="header_banner">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-3 text-center">
				<a href="javascript:void(0)">
					<img src="<?php echo base_url()?>assets/images/add_money.png" alt=""/><br>
					<span>Buy Bitcoin</span>								
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a href="javascript:void(0)">
					<img src="<?php echo base_url()?>assets/images/with_dr.png" alt=""/><br>
					<span>Sell Bitcoin</span>
				</a>
			</div>
			<div class="col-sm-3 text-center">
				<a href="javascript:void(0)">
					<img src="<?php echo base_url()?>assets/images/send_bit.png" alt=""><br>
					<span>Send BitCoin</span>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left_bar">
				<div class="profile_img">
					<div class="imge_bx"></div>
					<h2>John Mic Doe</h2>
				</div>
				<ul>
					<li><a href="<?php echo base_url()?>frontend/dashboard/index">My Dashboard</a></li>
					<li><a href="<?php echo base_url()?>frontend/dashboard/transaction">Manage Transactions</a></li>
					<li><a href="<?php echo base_url()?>frontend/dashboard/payment_method">Payment Methods</a></li>
					<li class="active"><a href="<?php echo base_url()?>frontend/dashboard/account_deactivate">Deactivate Account</a></li>
					<li><a href="<?php echo base_url()?>login/logout">Log Out</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-9 p_t20">
			<div class="well bal text-center">
			<h1>Deactivate Account</h1>
			<h2>Coming Soon</h2>
                        <p style="font-weight:bold;font-size:12px;color:red;">Note: We are currently in beta, to buy or sell BTC please do so through live chat.</p> 

			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>
