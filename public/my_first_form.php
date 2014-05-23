<!DOCTYPE html>
<html>
<head>
	<title>My First HTML Form</title>
</head>
<body>
	<?php
		var_dump($_GET);
		var_dump($_POST);
    ?>
    <h1>User Login</h1>
	<form method="POST" action="my_first_form.php">
	    <p>
	        <label for="username">Username</label>
	        <input id="username" name="username" type="text" placeholder="Enter your username">
	    </p>
	    <p>
	        <label for="password">Password</label>
	        <input id="password" name="password" type="password" placeholder="Enter your password">
	    </p>
	    <p>
	        <button type="submit">Login</button>
	    </p>
	</form>
	<h1>Compose an Email</h1>
	<form>
		<p>
		    <label for="from_email">Senders Email Address</label>
	        <input id="from_email" name="from_email" type="email" placeholder="Enter senders email">
		</p>
		<p>
            <label for="to_email">Recipients Email Address</label>
	        <input id="to_email" name="to_email" type="email" placeholder="Enter recipients email">
		</p>
		<p>
		    <label for="subject">SUBJECT</label>
	        <input id="subject" name="subject" type="text" placeholder="Enter SUBJECT">
		</p>
		<p>
			<textarea id="email_body" name="email_body" rows="5" cols="120">Email Content Here</textarea>
		</p>
		<p>
	        <button type="submit">SEND</button>
	    </p>
	</form>
</body>
</html>