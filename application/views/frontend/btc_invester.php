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
						<p><?php print_r($result); ?></p>
					<?php } ?>
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
