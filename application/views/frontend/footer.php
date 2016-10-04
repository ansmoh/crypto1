<footer>
	<div class="container">
	<div class="row">
	<div class="col-sm-4 col-md-3 col-md-offset-3">
	<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/foot_logo.png" alt="Footer logo"></a>
	<br/><br/>
	<address><i class="fa fa-map-marker"></i> <p>517-938 Howe Street<br>
Vancouver, BC<br>
V6Z 1N9
</p></address>

<p>If you need to visit the office, please contact us to make an appointment.</p>
</div>

	<div class="col-sm-4 col-md-3"><h2>Get In Touch</h2>
	<ul>
	<li><a target="_blank" href="https://www.facebook.com/EzBtc-1748499078769142"><i class="fa fa-facebook"></i> Facebook</a></li>
	<li><a target="_blank" href="https://plus.google.com/u/0/111447015451371306496"><i class="fa fa-google-plus"></i> Google+</a></li>
    <li><a target="_blank" href="https://www.twitter.com/ezBtcCanada"><i class="fa fa-twitter"></i> Twitter</a></li>
    <li><a target="_blank" href="https://www.pinterest.com/ezBtcCanada"><i class="fa fa-pinterest-p"></i> Pinterest</a></li>
	
	</ul>
	</div>
	</div>
	</div>
	<div class="bottom_copy ">
		<div class="container">
			<div class="pull-left"> 
				<a href="javascript:void(0)"><i class="fa fa-phone"></i> 1-877-755-2249</a>
				<a href="javascript:void(0)"><i class="fa fa-envelope"></i> info@ezbtc.ca</a>
			</div>
			<div class="pull-right">Copyright 2016 - EZBTC. All Rights Reserved.</div>
	</div>
	</div>
	</footer>
	
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 7570511;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
	 <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	 <script>	
	jQuery("#contact_msg").hide();
	jQuery(function() {
    jQuery("#register-form").validate({    
        rules: {
            name: "required",		
            email: {
                required: true,
                email: true
            },
            subject:"required",
			msg:"required",
			term: {
                required: true
            },
        },
        messages: {
           name: "Please enter your name",
            email: "Please enter a valid email address",
            subject: "Please your subject",
			msg: "Please enter query",
        },
        
        submitHandler: function(form) {
			var name = $("#name").val();
			var email = $("#emailtxtfield").val();
			var subjecttxtfield = $("#subjecttxtfield").val();
			var msg = $("#msg").val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>contact",
				data: {
					   name: name,
					   email: email,
					   subject: subjecttxtfield,
					   msg: msg
					},
				success: function(result)
				{							
					jQuery("#contact_msg").html("<strong>Thank you</strong> for contacting us!").show().delay(5000).fadeOut();
					document.getElementById("register-form").reset();			
				},
				error: function(result){
					jQuery("#contact_msg").html("<strong>Thank you</strong> for contacting us!").show().delay(5000).fadeOut();
					document.getElementById("register-form").reset();	
				}
			});
        }
    });
  });
  
$(window).scroll(function(){
  var sticky = $('header'),
      scroll = $(window).scrollTop(),
	  banner_h = $(".banner").height();

  if (scroll >= 100) {sticky.addClass('fixed');
  $("body").addClass('scrl_pg');
  }
  else {sticky.removeClass('fixed');
  $("body").removeClass('scrl_pg');
  }
  
   
});


$(document).ready(function () {
    $(document).on("scroll", onScroll);
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('ul.nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top - 100 <= scrollPos && refElement.position().top + refElement.height() > scrollPos ) {
            $('#navigation ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}


$(document).ready(function () {
	  
$.getJSON( "https://api.bitcoinaverage.com/ticker/CAD/", function( data ) {
  var items = [];
  $.each( data, function( ) {  
    var per = (data['ask'] * 7)/100;
	var ask = (per + data['ask']).toFixed(2);
	
	var per1 = (data['bid'] * 5)/100;
	var bid = (data['bid'] - per1).toFixed(2);
	
	//$("Bitcoin (BTC)&nbsp;"+ask+"USD&nbsp;").appendTo('b#ask');
	//$("Bitcoin (BTC)&nbsp;"+bid+"USD&nbsp;").appendTo('b#bid');
	$('b#ask').append("Buy BTC for &nbsp; <span class='org'>( "+ask+" )</span>");
	$('b#bid').append("Sell BTC for &nbsp; <span class='org'>( "+bid+" )</span>");
	$('span#ask1').append("Buy Rate&nbsp;:&nbsp;"+ask+"&nbsp;CAD");
	$('span#bid1').append("Sell Rate&nbsp;:&nbsp;"+bid+"&nbsp;CAD");
	$('span#ask2').html("Buy BTC for ( "+ ask +" ) CAD &nbsp; <i class='fa fa-arrow-down'></i>");
	$('span#bid2').html("Sell BTC for ( "+ bid +" ) CAD &nbsp; <i class='fa fa-arrow-up'></i>");
	$('span#bid3').html(bid + "&nbsp;CAD");
	$('span#ask3').html(ask + "&nbsp;CAD");
	$('#ask4').val(ask);
	$('#bid4').val(bid);
		
	return false;
	 
  });
 
});

$('#buybitcoin').keyup(function(){
	
	$.getJSON( "https://api.bitcoinaverage.com/ticker/CAD/", function( data ) {
	  var items = [];
	  $.each( data, function( ) {  
		var per = (data['ask'] * 7)/100;
		var ask = (data['ask'] + per).toFixed(2);
		if(ask == ""){
			var per1 = (data['ask'] * 7)/100;
			var ask1 = (data['ask'] + per1).toFixed(2);
			var bit1 = parseFloat($('#buybitcoin').val().replace(",", "."));
			var tot1 = (bit1*ask1).toFixed(2);
			$('span#total').html(tot1);
			$('#total1').val(tot1);
		} else {
			var bit = parseFloat($('#buybitcoin').val().replace(",", "."));
			var tot = (bit*ask).toFixed(2);
			$('span#total').html(tot);
			$('#total1').val(tot);
		}
		return false;
	 
  });
 
});
	
});
$( ".payment_method" ).change(function() {
	var value = $( this ).val();
	if( value == 'Interac e-transfer' || value == 'Cash Deposit at Bank' )
	{
		$(".note").css("display", "none");
	}else{
		$(".note").css("display", "block");
	}
});

$('#sellbitcoin').keyup(function(){
	
	$.getJSON( "https://api.bitcoinaverage.com/ticker/CAD/", function( data ) {
	  var items = [];
	  $.each( data, function( ) {  
		var per1 = (data['bid'] * 5)/100;
		var bid = (data['bid'] - per1).toFixed(2);
		if(bid == ""){
			var per2 = (data['bid'] * 5)/100;
			var bid1 = (data['bid'] - per2).toFixed(2);
			var sell1 = parseFloat($('#sellbitcoin').val().replace(",", "."));
			var tott1 = (sell1*bid1).toFixed(2);
			$('span#total2').html(tott1);
			$('#total4').val(tott1);
		} else {
			var sell = parseFloat($('#sellbitcoin').val().replace(",", "."));
			var tott = (sell*bid).toFixed(2);
			$('span#total2').html(tott);
			$('#total4').val(tott);
		}	
		return false;
	 
  });
 
});
	
});

window.setInterval(function(){ 

$.getJSON( "https://api.bitcoinaverage.com/ticker/CAD/", function( data ) {
  var items = [];
  $.each( data, function( ) {  
    var per = (data['ask'] * 7)/100;
	var ask = (per + data['ask']).toFixed(2);
	
	var per1 = (data['bid'] * 5)/100;
	var bid = (data['bid'] - per1).toFixed(2);
	$("b#ask").empty();
$("b#bid").empty();
	$('b#ask').append("Buy BTC for &nbsp; <span class='org'>( "+ask+" )</span>");
	$('b#bid').append("Sell BTC for &nbsp; <span class='org'>( "+bid+" )</span>");
	//$('b#bid').append("Bitcoin (BTC)&nbsp;"+bid+"USD&nbsp;");
	return false;
	 
  });
 
});


}, 3000);
});


$(function() {
	$('nav ul.nav.custom li a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
		    $('html, body').animate({
		      scrollTop: (target.offset().top - 100 )
		    }, 1000);
		    return false;
		  }
		}
	});
});
</script>
<!--<div class="my-new-list">
<ul>
</ul>
</div>-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80870469-1', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>
