<?php include 'frontend/header.php'; ?>
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-10"><h1>Welcome to <b> your </b> digital world to manage <b> your </b> money</h1>
					<p>Buy or sell your bitcoin instantly</p>
					<a href="<?php echo base_url();?>register" class="btn_round">Join Now</a>
				</div>
			</div>
		</div>
	</div>
	
	<section>
		<div class="container">
			<div class="row">			
				<div class="col-md-12 text-center">
					<div class="why">
						<h1><span><b>Bitcoin</b> for Canadians: but the <b>world is welcome too, eh!</b></span></h1>
						<p><b>EZBTC</b> is Canada’s place to buy or sell your bitcoin instantly - online, in person, or at one of our ATMs. No fuss required.</p>
						<ul>
							<li><i class="fa fa-circle"></i> <span>Get coin or cash with only one click. Just open a chat.</span></li>
							<li><i class="fa fa-circle"></i> <span>Easy payment methods, all available in Canadian Dollars. The days of paying for foreign exchange are over.</span></li>
							<li><i class="fa fa-circle"></i> <span>We use Crowdfunded products when possible: buy from us and you give back to the BTC community.</span></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</section>		
	<section class="what text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-10 col-md-offset-1">
					<img src="<?php echo base_url(); ?>assets/images/bit_coin.png" alt=""/><br>
					<h2>What is Bitcoin?</h2>
					<p>Bitcoin is a cryptocurrency, a form of money that uses mathematics to control its creation and management, rather than relying on traditional banking institutions, over a secure network that uses groundbreaking technology to track transactions and keep your funds safe.</p>
					<br>
					<p>Prior to its release there were a number of digital cash technologies, but Bitcoin ultimately won the hearts of many now with over 10 billion USD in market capitalization. It’s safe to say BTC is not going anywhere and cannot be stopped.</p>
					<br>
					<p>All Bitcoin transactions are listed on a public ledger called the Blockchain. Bitcoins are created by miners who solve complex mathematical equations. There will only ever be 21 million coins in circulation. Ever.</p>
					<br>
					<p>You can use Bitcoin to send money anywhere in the world instantly with almost no transaction fees. You can get Bitcoin from Vancouver to London in 1 minute and under 25 cents. If that’s not enough Bitcoin has a relative value in most countries thus eliminating archaic foreign exchange fees.</p>
					<br>
					<p>Instant. Simple. Secure, and gaining mainstream acceptance as a viable internationally recognized way to conduct financial transactions.</p>
					<p>This is the future. Now.</p>
				</div>
			</div>
		</div>
	</section>
	</div>
	<section class="about" id="what">
		<div class="container">
			<h1><span>Buy or Sell Bitcoin Instantly </span></h1>
			<p class="under_con">You can now <b>verify your identify</b> by creating an account and selecting activate account. 
			<br>Once verified you can <b>order or sell BTC</b> using <b>live chat, email or phone</b> instantly.<br/>KYC (Know Your Customer) is required. Have your ID ready. This is a one time process, updated twice yearly.</p>
			<div class="value">
				<span><b  id="ask"></b> CAD</span>
				<span class="pull-right"><b id="bid"></b> CAD</span>&nbsp;
			</div>
			<p><a class="order_chat" href="<?php echo base_url(); ?>login" id="full-view-button"><span class="icon-maximize" id="open-icon"></span><span id="open-label">Login</span></a></p>
	   </div>
    </section>
	<section id="location" class="location text-center">
		<div class="container">
			<h2>Locations of our ATMs:</h2>
			<div class="row">
				<div class="col-sm-8">
					<br><br>
					<a class="locat" href="https://www.google.ca/maps/place/Infuse+Cafe/@43.6580886,-79.3841382,17z/data=!3m1!4b1!4m5!3m4!1s0x882b34ca99cc2973:0xf3e029e6d5f56385!8m2!3d43.6580847!4d-79.3819495?hl=en" target="_blank"><i class="fa fa-map-marker"></i> Infuse Cafe, 354 Yonge St, Toronto, ON M5B 1S5</a>
					<a class="locat" href="https://www.google.ca/maps/place/Kingsgate+Mall/@49.2623832,-123.0992912,17z/data=!3m1!4b1!4m5!3m4!1s0x5486715f4e7dcb69:0x4cdab6bf501ef212!8m2!3d49.2623832!4d-123.0971025" target="_blank"><i class="fa fa-map-marker"></i> Kingsgate Mall, Vancouver <span>(Opening 26.09.16)</span></a>
					<a class="locat" href="https://www.google.ca/maps/place/Whistler+Village/@50.116323,-122.9595503,17z/data=!3m1!4b1!4m5!3m4!1s0x54873cb48ee961b3:0x6f5f631165a9d9d6!8m2!3d50.1163196!4d-122.9573563?hl=en" target="_blank"><i class="fa fa-map-marker"></i> Whistler Village, Whistler, BC <span>(Coming soon)</span></a>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url(); ?>assets/images/atm.png" alt="atm"/>
				</div>
			</div>
		</div>
	</section>
	
	<div id="contact">
		<div class="contact text-center">
			<div class="container">
				<h1><span>Contact</span></h1>
				<p>If you have absolutely any questions, please contact us using the form below. Even if you just want to say hello. You can also reach us on <a href="callto:1-877-755-2249">1-877-755-2249</a>, or by <a onclick="parent.LC_API.open_chat_window()" href="javascript:void(null)" id="full-view-button"><span class="icon-maximize" id="open-icon"></span><span id="open-label">live chat</span></a>. We try to be available as much of the day as possible, but we are still growing so if we are offline, please leave a message and we will get right back to you.</p>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<?php  if (isset($ms)) { ?>
							<div role='alert' class='alert alert-success alert-dismissible fade in'> 
								<button aria-label='Close' data-dismiss='alert' class='close' type='button'>
									<span aria-hidden='true'>×</span>
								</button> 
								<strong>Thank you</strong> for contacting us!</div>
						<?php }?>
						<div class='alert alert-success alert-dismissible fade in' id='contact_msg'></div>
					</div>
				</div>
				<form class="contact_frm" action="<?php base_url(); ?>contact" method="post" id="register-form">
					<div class="row">
						<div class="col-md-5 col-md-offset-1 col-sm-6">
							<input type="text" placeholder="Name" name="name" id="name" >
							<input type="email" placeholder="Email" name="email" id="emailtxtfield">
							<input type="text" placeholder="Subject" name="subject" id="subjecttxtfield">
						</div>
						<div class="col-md-5 col-sm-6">
							<textarea name="msg" id="msg"></textarea>
						</div>
						<div class="col-md-10 col-md-offset-1"><input type="submit" class="full_sub" value="SEND MAIL" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
<?php include 'frontend/footer.php'; ?>