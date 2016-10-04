<?php include 'header.php' ?>
</div>
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
		<div class="col-sm-9 p_t20">
			<div class="well">
			<div class="p_20">
				<div id="para1">
					<?php if(current_url() == $url){ ?>
						<?php print_r($result); ?>
					<?php } ?>
					<!--<h3 style="margin:0">Payment Methods</h3><br/>
					<p>We accept the below payment methods for verified users, assuming they have also verified their method of payment:</p> 
					<div class="clearfix"></div>
					<br>
					<ul>
						<li>Interac e-transfer</li>
						<li>Credit/Debit Card</li>
						<li>Western Union</li>
						<li>Moneygram</li>
						<li>Cash Deposit at Bank</li>
					</ul>
					<div class="clearfix"></div>
					<br>
					<p>Please note:  All payments are currently accepted manually; pricing may vary from the posted prices depending on your chosen method of payment. For enhanced security, no funds held on EZBTC servers at anytime. All transactions are finalised manually by our support team. Our aim to process your transaction as quickly as we can, instantly when possible, but during peak times there can delay of 1-2 hours. </p>-->
					<div class="clearfix"></div>			
					<br>
				</div>
				<p id="para_bit"></p>
			<p id="para_sell"></p>
			</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>
