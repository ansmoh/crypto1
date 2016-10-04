<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" sizes="" href="<?php echo base_url();?>assets/images/icon/favicon.ico">
	<title>EZBTC:: Buy or Sell Bitcoin Instantly</title>
	<link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/backend/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/backend/css/font-awesome.css" rel="stylesheet">  
	
</head>
<body>
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
	<div class="leftpanel">   
		<div class="logopanel text-center">
			<h1><span><a href="<?php echo base_url();?>"><img alt="Logo" src="<?php echo base_url();?>assets/images/logo.png"></a></span></h1>
		</div>
		<div class="leftpanelinner">
			<div class="visible-xs hidden-sm hidden-md hidden-lg">   
				<div class="media userlogged">
					<img alt="" src="<?php echo base_url();?>assets/backend/images/photos/loggeduser.png" class="media-object">
					<div class="media-body">
						<h4>
						<?php if($this->session->userdata("username")) { ?>
							<?php echo $this->session->userdata("username"); ?>
						<?php } else { ?>
							Hello User
						<?php } ?></h4>
					</div>
				</div>
				<h5 class="sidebartitle actitle">Account</h5>
				<ul class="nav nav-pills nav-stacked nav-bracket mb30">
					<li><a href="#"><i class="fa fa-user"></i> <span>View Profile</span></a></li>
					<li><a href="#"><i class="fa fa-cog"></i> <span>Profile Settings</span></a></li>
				</ul>
			</div>
			<h5 class="sidebartitle">Navigation</h5>
			<ul class="nav nav-pills nav-stacked nav-bracket">
				<li class="active"><a href="<?php echo base_url()?>admin/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="#"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
				</li>
				<li class="nav-parent"><a href="#"><i class="fa fa-edit"></i> <span>Manage Pages</span></a>
				  <ul class="children">
					<li><a href="<?php echo base_url()?>admin/viewPages"><i class="fa fa-caret-right"></i>All Pages</a></li>
					<li><a href="<?php echo base_url()?>admin/newPage"><i class="fa fa-caret-right"></i>Add New</a></li>
				  </ul>
				</li>
				<li><a href="<?php echo base_url()?>admin/login/logout"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
			</ul>
		</div>
	</div>
	<div class="mainpanel">
		<div class="headerbar">
			<a class="menutoggle"><i class="fa fa-bars"></i></a>
			<div class="header-right">
				<ul class="headermenu">
					<li>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url();?>assets/backend/images/photos/loggeduser.png" alt="" />
								<?php if($this->session->userdata("username")) { ?>
									<?php echo $this->session->userdata("username"); ?>
								<?php } else { ?>
									Hello User
								<?php } ?>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
								<li><a href="#"><i class="fa fa-user"></i> <span>View Profile</span></a></li>
								<li><a href="#"><i class="fa fa-cog"></i> <span>Profile Settings</span></a></li>
								<li><a href="<?php echo base_url()?>admin/login/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="pageheader">
			<h2><i class="fa fa-home"></i> Dashboard <span></span></h2>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li class="active">Dashboard</li>
				</ol>
			</div>
		</div>
		<div class="contentpanel">
			<div class="row"></div>
			<div class="row">
				<div class="col-md-6 col-sm-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fa fa-users"></i> &nbsp;&nbsp; Search Users</h4>
						</div>
						<div class="panel-body">
							<form action="view_users_screen.html">
								<div class="row">  
								<div class="col-sm-8">			 
									<input type="text" placeholder="Search Users" class="form-control"><br>
								</div>
								<div class="col-sm-4">              
									<button class="btn btn-success btn-block">Search</button></div>
								</div>
							</form>
						</div>
					</div>
					<br><div class="mb20"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="<?php echo base_url();?>assets/backend/js/jquery-1.11.1.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/jquery-migrate-1.2.1.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/jquery.sparkline.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/toggles.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/jquery.cookies.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/jquery.autogrow-textarea.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/jquery.tagsinput.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/select2.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/colorpicker.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/custom.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/dropzone.min.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery('#tags').tagsInput({width:'auto'});
	jQuery('#autoResizeTA').autogrow();
	if(jQuery('#colorpicker').length > 0) {
		jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
				jQuery('#colorpicker').val('#'+hex);
			}
		});
	}  
  // Color Picker Flat Mode
	jQuery('#colorpickerholder').ColorPicker({
		flat: true,
		onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
		}
	});  
});
</script>
</body>
</html>
