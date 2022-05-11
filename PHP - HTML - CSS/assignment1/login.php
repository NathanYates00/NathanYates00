<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>User Login</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class="login">
		<form action="login.php" method="GET">
			<h1>User Login:</h1>
			<h3>Please input your username and password to continue to the conversion page.<br></h3>
			<p>You need to ensure that your username starts with a capital letter, and is within 5 to 21 characters.
			<br>Only letters and numbers allowed.<br>
			<br>You also need to ensure that your password starts with a capital letter, and is within 5 to 14 characters.
			<br>Letters and numbers allowed. The end of the password must have !, ?, % or ^.<br><br>
			<label for="user">Username:</label>
			
			<!-- If the username cookie has been set, echo the username into the username text box -->
			<input type="text" name="user" id="user" value="<?php if(isset($_COOKIE["userCook"])) echo $_COOKIE["userCook"]; ?>">
			<br><label for="pass">Password:</label>
			
			<!-- If the password cookie has been set, echo the password into the password text box -->
			<input type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE["passCook"])) echo $_COOKIE["passCook"]; ?>"><br><br>
			<input type="checkbox" name="remember" id="remember">Remember me (This will save the login details for one day.)<br><br></p>
			<input type="submit" name="submit" value="Submit">&nbsp;
			<input type="reset" name="reset" value="Reset">&nbsp;
		</form>
		<?php
			// If the submit button is pressed
			if (isset($_GET["submit"])==true) 
			{				
				// Sets their username input as $username
				$username = $_GET["user"];			
				
				// This is the RegEx for usernames
				// The author referred back to their Java code to assist with the RegEx Patterns
				$userPattern = "/^[A-Z][A-Za-z0-9]{4,20}$/";
				$userCorrect = false;
				
				// Sets their password input as $password
				$password = $_GET["pass"];

				// This is the RegEx for passwords
				$passwordPattern = "/^[A-Z][A-Za-z0-9]{3,12}[!?%^]$/";
				$passwordCorrect = false;
				
				// If the username matches the regex pattern, set userCorrect to true and if the remember button is pressed, set cookie for 24 hours
				// https://www.w3schools.com/php/php_regex.asp This helped with preg_match
				if ( preg_match($userPattern, $username) )
				{
						$userCorrect = true;			
						if (!empty($_GET["remember"]))
						{
							setcookie("userCook", $username, time()+60*60*24);
						}
				}
				
				// If the password matches the regex pattern, set userCorrect to true and if the remember button is pressed, set cookie for 24 hours
				if ( preg_match($passwordPattern, $password) )
				{
						$passwordCorrect = true;					
						if (!empty($_GET["remember"]))
						{
							setcookie("passCook", $password, time()+60*60*24);
						}
				}
				
				
				// If the username is incorrect but the password is correct
				if (($userCorrect == false) && ($passwordCorrect == true))
				{
					echo "<br><br>Your username is incorrect, you need to ensure that your username starts with a capital letter, and is within 5 to 21 characters.
					<br> Only letters and numbers allowed.";
				}
				
				// If the username is correct but the password is incorrect
				if (($userCorrect == true) && ($passwordCorrect == false))
				{
					echo "<br><br>Your password is incorrect, you need to ensure that your password starts with a capital letter, and is within 5 to 14 characters.
					<br> Letters and numbers allowed. The end of the password must have !, ?, % or ^.";
				}		
				
				// If the username and password are incorrect
				if (($userCorrect == false) && ($passwordCorrect == false))
				{
					echo "<br><br>Your username and password are incorrect, you need to ensure that your username starts with a capital letter, and is within 5 to 21 characters.
					<br> Only letters and numbers allowed for the username.<br><br>";
					echo "You also need to ensure that your password starts with a capital letter, and is within 5 to 14 characters.
					<br> Letters and numbers allowed for the password. The end of the password must have !, ?, % or ^.";
				}		
				
				// If the username and password are correct, go to conversion page
				if(($userCorrect == true) && ($passwordCorrect == true))
				{ 
					header("Location:https://www.gllmhecomputing.net/gllm311624/assignment1/conversionVer1.php"); exit;					 
				}
			}
		?>
	</body>
</html>
