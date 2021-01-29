<?php

	ini_set('display_errirs', 1 );
	error_reporting ( E_ALL );

	$from = "notification@communityconstituency.org.za";
	$to = $agent_email;

	$subject = "Welcome to Community Constituency Web Application";
	$email_message="Dear ".$agent_name;
	$email_message .="

Thank you for registering as a Community Constituency agent.

> COVID-19 FRONT | I am, You are, We are Together in ending COVID-19


If you encounter any technical difficulties or technical support related issues, log a call by clicking on this link:
https://communityconstituency.org.za/support/index.php?a=add


For training on how to fill in a survey, click on this link:
https://drive.google.com/file/d/1hcUCBcYU7gV65y8yqvnWWMY97cNbc9DA/view?usp=sharing


Kind Regards,
Community Constituency Support Team
support@communityconstituency.org.za
";
	$headers = "From: " . $from;

	mail ($to, $subject, $email_message, $headers);


?>


