<?php 
	
	function send_generic_email($email_data){
        $to = $email_data['to'];
        $subject = $email_data['subject'];
        $message = $email_data['message'];
        $header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From: ezBtc Verification<admin@ezbtc.ca> ' . "\r\n";

        //ini_set('SMTP', "relay-hosting.secureserver.net");
        //ini_set('smtp_port', "25");
		ini_set('SMTP', "smtp.gmail.com");
        ini_set('smtp_port', "25");
		ini_set('smtp_user', "admin@ezbtc.ca");
		ini_set('smtp_pass', "CanadaBTC123");

        return (mail($to, $subject, $message, $header)) ? "Email Sent" : "Email Failed";
    }

?>