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
</body>
</html>