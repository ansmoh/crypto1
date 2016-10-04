<?php if( ! defined('BASEPATH')) exit('No direct script access allowed'); 
global $tr;
foreach($pages as $item)
{ 
	$pageid = $item->page_id;
	$tr.= '<tr class="gradeU">
			<td>'.$item->page_title.'</td>
			<td>'.$item->page_author.'</td>
			<td>'.$item->created_on.'</td> 
			<td>'.$item->updated_on.'</td>
			<td class="center">
				<a href="viewPages/editPage?page_id='.$pageid.'" class="btn btn-xs btn-success">
				<i class="fa fa-pencil-square-o"></i>Edit</a>
				<a href="viewPages/deletePage?page_id='.$pageid.'" class="btn btn-xs btn-danger">
				<i class="fa fa-trash-o"></i>Delete</a>
			</td>
		  </tr>';
}
?>
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
	<link href="<?php echo base_url();?>assets/backend/css/jquery.datatables.css" rel="stylesheet">
	
</head>
<body>
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
				<li><a href="<?php echo base_url()?>admin/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="#"><i class="fa fa-users"></i> <span>Manage Users</span></a></li>
				<li class="nav-parent nav-active active"><a href="#"><i class="fa fa-edit"></i> <span>Manage Pages</span></a>
				  <ul class="children" style="display: block">
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
			<h2><i class="fa fa-home"></i> Dashboard <span>View All Pages</span></h2>
			<div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>admin/dashboard">Dashboard</a></li>
					<li><a href="<?php echo base_url()?>admin/viewPages">Manage Pages</a></li>
					<li class="active">All Pages</li>
				</ol>
			</div>
		</div>		
		<div class="contentpanel">
			<h5 class="subtitle mb5">View All Pages</h5>
			<br/>
			<div class="table-responsive">
				<table class="table table-striped" id="table2">
					<thead>
						<tr>
							<th>Page Title</th>
							<th>Page Author</th> 
							<th>Date of Creation</th>
							<th>Date of Updation</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $tr; ?>
					</tbody>
				</table>
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
<script src="<?php echo base_url();?>assets/backend/js/custom.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/dropzone.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/jquery.datatables.min.js"></script>
<script>
jQuery(document).ready(function(){
	jQuery('#table2').dataTable(); 
});
</script>
</body>
</html>
