<?php include 'header.php' ?>
</div>
<?php
header('Cache-Control: max-age=900');
?>
<div class="container">
	<div class="row">	
		<div class="col-md-10 col-sm-12 col-md-offset-1">
			<div class="email_box">
				<div class="row">
					<div class="col-sm-12">
						<p id="msg_success"><?php echo urldecode($message); ?></p>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>