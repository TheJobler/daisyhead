<?php

	$from = 'From: daisyhead.com Contact Form';
	$to = 'daisyheadTEST@gmail.com';

	$errors = array();
	if(isset($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message'])){
	
		$name = htmlentities($_POST['name']);
		$email = htmlentities($_POST['email']);
		$subject = htmlentities($_POST['subject']);
		$message = htmlentities($_POST['message']);
		$sent = FALSE;
		
		if(empty($name)){
			$errors[] = "A name is required.";
		}
		else if(strlen($name) > 30){
			$errors[] = "Name is too long: must be 30 characters or less";
		}
		
		if(empty($email)){
			$errors[] = "An email address is required.";
		}
		else if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE){
			$errors[] = "Please enter a valid email address.";
		}
		
		if(empty($subject)){
			$errors[] = "A subject is required.";
		}
		
		if(empty($message)){
			$errors[] = "A message is required.";
		}
		
		$body = 'From: '.$name."\n E-Mail: ".$email."\n Message:\n ".$message;

		if ($_POST['submit'] && empty($errors)){
			if (mail ($to, $subject, $body, $from)) {
				$sent = TRUE;
			}
		}
	}
?>

<div id = "Contact-and-Pricing">
	<h2>Contact:</h2>
	<p>Lindsay Kreke</br>
	Email: daisyheadphotography@yahoo.com</br>
	Phone: (317) 370-6602
	</p>
	<?php
		if(!empty($errors)){
			echo '<div id = errors>'."\n";
			echo '<h4>Form Submission Failed:</h4>'."\n".'<p>';
			foreach($errors as $error){
				echo '<strong>'.$error.'</strong><br />'."\n";
			}
			echo '</p>'."\n".'</div>';
		}
		else if(isset($sent) && $sent === TRUE){
			echo '<div id = "success">';
			echo "\t".'<p>Message Sent Successfully</p>';
			echo '</div>';
		}
	?>
	<form method = "POST" action = "<?php echo htmlentities($_SERVER['PHP_SELF']).'?p=contact'; ?>">
		<label>*Your Name:</label>
		<input name="name"<?php
			if(!empty($errors)){
				echo ' value="'.htmlentities($_POST['name']).'"';
			}
			else echo ' placeholder="example: Jon Doe"';
		?>/>
		<label>*Email Address:</label>
		<input name="email" type="email"<?php
			if(!empty($errors)){
				echo ' value="'.htmlentities($_POST['email']).'"';
			}
			else echo ' placeholder="example: JonDoe@example.com"';
		?>/>
		<label>*Subject</label>
		<input name = "subject" type = "text"<?php
			if(!empty($errors)){
				echo ' value="'.htmlentities($_POST['subject']).'"';
			}
			else echo ' placeholder = "example: Question about _____"';
		?>/>
		<label>*Your Message:</label>
		<textarea name="message" placeholder="example: hello ..."><?php
			if(!empty($errors)){
				echo htmlentities($_POST['message']);
			}
		?></textarea>
		<input id="submit" name="submit" type="submit" value="Send"/>
	</form>
	<br />
	<br />
	<br />
	
	<script type = "text/javascript">
		$("#Contact-and-Pricing").jScrollPane({showArrows: true});
	</script>
	
</div>

























