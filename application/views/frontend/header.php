<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/ico" sizes="" href="<?php echo base_url();?>assets/images/icon/favicon.ico">
		<title>EZBTC:: Buy or Sell Bitcoin Instantly</title>    
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/responsive-slider.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url();?>assets/css/style.css?ver=1.0.1" rel="stylesheet">
	</head>
	<body>
	<div id="banner">
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="rate">
							<a href="<?php echo base_url(); ?>dashboard/buy_bitcoin"><span id="ask2"></span></a>
						</div>				
					</div>
					<div class="col-md-4 col-sm-4 pull-right text-right">
						<div class="rate">
							<a href="<?php echo base_url(); ?>dashboard/sell_bitcoin"><span id="bid2"></span></a>
						</div>				
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="navbar-header">
							<button aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="<?php echo base_url();?>" class="navbar-brand"><img alt="Logo" src="<?php echo base_url();?>assets/images/logo.png"></a>
						</div>			
					</div>
				</div>
			</div>	
			<nav>		  
				<div class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1">
					<div class="container">									
						<?php if($this->session->userdata('userid')){ ?>
							<ul class="nav custom">
								<?php if(current_url() == base_url()){?>
									<li><a class="active" href="<?php echo base_url(); ?>dashboard">Home</a></li>
									<!--<li><a href="#what">Buy or Sell Bitcoin Instantly</a></li>-->
									<li><a href="#location">Bitcoin ATM Locations</a></li>
									<li><a href="#contact">Contact</a></li>			
								<?php } else { ?>
									<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
									<!--<li><a href="<?php echo base_url(); ?>#what">Buy or Sell Bitcoin Instantly</a></li>-->
									<li><a href="<?php echo base_url(); ?>#location">Bitcoin ATM Locations</a></li>
									<li><a href="<?php echo base_url(); ?>#contact">Contact</a></li>	
								<?php } ?>
							</ul>		
							<ul class="nav custom navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome 
									<?php 
									if($this->session->userdata('username'))
									{ 
									echo $this->session->userdata('username');
									} else { ?> 
									Username
									<?php } ?>
								<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url(); ?>dashboard">My Dashboard</a></li>
										<li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
									</ul>
								</li>
							</ul>
						
							<?php } else {?>
							<ul class="nav custom">
								<?php if(current_url() == base_url()){?>
									<li><a class="active" href="#banner">Home</a></li>
									<!--<li><a href="#what">Buy or Sell Bitcoin Instantly</a></li>-->
									<li><a href="#location">Bitcoin ATM Locations</a></li>
									<li><a href="#contact">Contact</a></li>			
								<?php } else { ?>
									<li><a href="<?php echo base_url(); ?>#banner">Home</a></li>
									<!--<li><a href="<?php echo base_url(); ?>#what">Buy or Sell Bitcoin Instantly</a></li>-->
									<li><a href="<?php echo base_url(); ?>#location">Bitcoin ATM Locations</a></li>
									<li><a href="<?php echo base_url(); ?>#contact">Contact</a></li>	
								<?php } ?>
							</ul>
							<ul class="nav custom navbar-right">
								<li><a href="<?php echo base_url();?>login">Sign in</a></li>
								<li><a href="<?php echo base_url();?>register">Sign up</a></li>							
							</ul>
							<?php } ?>
					</div>					   					  
				</div>
			</nav>
		</header>
        <?php if ($this->session->userdata('username')) : ?>
        <div class="user-toolbar">
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left">
                        <button class="btn-primary username">
                            <?php echo $this->session->userdata('username'); ?>
                        </button>
                        <div class="balances">
                            <div>
                                <i class="fa fa-btc"></i>
                                0.000000
                            </div>
                            <div>
                                <i class="fa fa-dollar"></i>
                                0.00
                            </div>
                        </div>
                    </div>

                    <div class="pull-right operations text-uppercase">
                        <div class="clearfix">
                            <div class="pull-right">
                                <a href="#" class="deposit btn">
                                    deposit
                                </a>
                                <a href="#" class="withdraw btn">
                                    withdraw
                                </a>
                                <a href="#" class="instant-buy btn">
                                    instant buy
                                </a>
                                <a href="#" class="instant-sell btn">
                                    instant sell
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php endif; ?>
        <div class="currency-panel text-uppercase">
            <div class="container clearfix">
                <ul class="list-unstyled list-inline pull-right">
                    <li>
                        DOGE/BTC: 3.298398
                    </li>
                    <li>
                        LTC/BTC: 0.004733
                    </li>
                    <li>
                        LTC/CAD: 3.485948
                    </li>
                    <li>
                        ETH/CAD: 15.2948
                    </li>
                    <li>
                        ETH/BTC: 0.0193847
                    </li>
                    <li>
                        BTC/CAD: 812.8087
                    </li>
                </ul>
            </div>
        </div>
	