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
	    	Would you like a copy of this email saved to your sent folder?
	    	<label for="copy_to_send_folder">
            <input type="checkbox" id="copy_to_send_folder" name="copy_to_send_folder" value="yes" checked>YES
            </label>
	    </p>
		<p>
	        <button type="submit">SEND</button>
	    </p>
	</form>
	<h1>Multiple Choice Test</h1>
	<form>
		<p>What is the capital of Texas?</p>
			<label for="q1a">
			    <input type="radio" id="q1a" name="q1" value="houston">
			    Houston
			</label>
			<label for="q1b">
			    <input type="radio" id="q1b" name="q1" value="dallas">
			    Dallas
			</label>
			<label for="q1c">
			    <input type="radio" id="q1c" name="q1" value="austin">
			    Austin
			</label>
			<label for="q1d">
			    <input type="radio" id="q1d" name="q1" value="san antonio">
			    San Antonio
			</label>
		<p>What are your favorite profesional sports?</p>
			<label for="q1a">
			    <input type="radio" id="q1a" name="q1" value="nfl">
			    NFL
			</label>
			<label for="q1b">
			    <input type="radio" id="q1b" name="q2" value="nba">
			    NBA
			</label>
			<label for="q1c">
			    <input type="radio" id="q1c" name="q3" value="mlb">
			    MLB
			</label>
			<label for="q1d">
			    <input type="radio" id="q1d" name="q4" value="nhl">
			    NHL
			</label>
		<p>
			<label for="drink">What is your alcoholic beverage of choice? </label>
			<select id="drink" name="drink[]" multiple>
			    <option value="beer">BEER</option>
			    <option value="wine">WINE</option>
			    <option value="Liqour">LIQOUR</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
	<h1>Select Testing</h1>
	<form>
		<p>
			<label for="hunger">Are you hungry? </label>
			<select id="hunger" name="hunger">
			    <option value="1">YES</option>
			    <option value="0" selected>NO</option>
			</select>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>