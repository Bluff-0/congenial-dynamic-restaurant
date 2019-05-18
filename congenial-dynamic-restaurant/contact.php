<?php
		define('TITLE', "Contact | Franklin's Fine Dining");
		include ('includes/header.php');
?>


<div id="contact">
	<hr>
	<h2>Get in Touch with Us!</h2>


	<?php

		// Check for header injections... Oh Yehhhh !!!

		function has_header_injection($str)
		{
			# code...
			return preg_match("/[\r\n]/", $str);
		}
		if (isset($_POST['contact_submit'])) {
			# code...
			$name= trim($_POST['name']);
			$email= trim($_POST['email']);
			$msg= $_POST['message'];

			if (has_header_injection($name) || has_header_injection($email)) 
			{
				die();
			}

			if (!$name || !$email || !$msg) 
			{
				echo'<h4 class="error">All Fields Required</h4><a href="contact.php" class="button block">Go back and Try again</a>';
				exit;
			}

			$to= "your@email.com";
			$subject= "$name sent you a message via contact form";
			$message= "Name: $name\r\n";
			$message.= "Email: $email\r\n";
			$message.= "Message: \r\n\t$msg";

			if (isset($_POST['subscribe']) &&  $_POST['subscribe'] == 'Subscribe') 
			{
				$message.= "\r\n\r\nPlease add $email to the mailing list. \r\n";
			}

			$message= wordwrap($message, 72);

			$header= "MIME-Version: 1.0\r\n";
			$header.= "Content-type: text/plain; charset= iso-8859-1\r\n";
			$header.= "From: $name <$email> \r\n";
			$header.= "X-Proprity: 1\r\n";
			$header.= "X-MSMail-Proprity: High\r\n\r\n";


			mail($to, $subject, $message, $header);
	?>

	<!-- Success Message -->
	<h5>Thanks for contacting Franklin's</h5>
	<p>Please allow us 24 hours for a response.</p>
	<p><a href="index.php" class="button block">&laquo; Go to Home Page</a></p>

	<?php } else { ?>


	<form method="post" action="" id="contact-form">
		<label for="name">Your Name</label>
		<input type="text" name="name" id="name">
		<label for="email">Your Email</label>
		<input type="email" name="email" id="email">
		<label for="message">Your Message</label>
		<textarea id="message" name="message"></textarea>
		<input type="checkbox" name="subscribe" id="subscribe" value="Subscribe">
		<label for="subscribe">Subscribe to Newsletter</label>

		<input type="submit" class="button next" name="contact_submit" value="Send Message">
	</form>
	<?php } ?>
	<hr>

</div>



<?php

		include ('includes/footer.php');
?>