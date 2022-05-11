<?php
	// Starts the session
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Login</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class="page">
		<form action="loginPage.php" method="POST">
		<div class = "header">
			<!-- Clickable logo to return to homepage -->
			<a href="productPage.php" class="logo">
			<img src="images/logo.png" alt="Logo"></a>
			<h1 class = "title">Admin Login</h1>			
		</div>
		<div class="tab-content">
		<div class="login-details">
			<h3>Please input your admin username and password to continue to the admin page.<br></h3>
			<p>You need to ensure that your username is Admin1<br>
			<br>You also need to ensure that your password is Admin!
			<br><br>
			<label for="user">Username:</label>
			
			<!-- If the username cookie has been set, echo the username into the username text box -->
			<input type="text" name="user" id="user" value="<?php if(isset($_COOKIE["userCook"])) echo $_COOKIE["userCook"]; ?>" required>
			<br><label for="pass">Password:</label>
			
			<!-- If the password cookie has been set, echo the password into the password text box -->
			<input type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE["passCook"])) echo $_COOKIE["passCook"]; ?>" required><br><br>
			
			<!-- Checkbox that allows the admin to save their login details for 24 hours -->
			<input type="checkbox" name="remember" id="remember">Remember me (This will save the login details for one day.)<br><br></p>
			<input type="submit" name="submit" value="Submit">&nbsp;
			
			<!-- Clears the input fields -->
			<input type="reset" name="reset" value="Reset">&nbsp;
		</form>
			<?php
				// If the submit button is pressed
				if (isset($_POST["submit"])==true) 
				{				
					// Sets their username input as $username
					$username = $_POST["user"];			
					
					// This is the RegEx for usernames
					// The author referred back to their Java code to assist with the RegEx Patterns
					$userPattern = "/^[A][d][m][i][n][1]$/";
					$userCorrect = false;
					
					// Sets their password input as $password
					$password = $_POST["pass"];

					// This is the RegEx for passwords
					$passwordPattern = "/^[A][d][m][i][n][!]$/";
					$passwordCorrect = false;
					
					// If the username matches the regex pattern, set userCorrect to true and if the remember button is pressed, set cookie for 24 hours
					// https://www.w3schools.com/php/php_regex.asp This helped with preg_match
					if ( preg_match($userPattern, $username) )
					{
							$userCorrect = true;
							// If the customer ticked the checkbox
							if (!empty($_POST["remember"]))
							{
								// Sets the username to a cookie to be saved for 24hrs
								setcookie("userCook", $username, time()+60*60*24);
							}
					}
					
					// If the password matches the regex pattern, set userCorrect to true and if the remember button is pressed, set cookie for 24 hours
					if ( preg_match($passwordPattern, $password) )
					{
							$passwordCorrect = true;		
							// If the customer ticked the checkbox							
							if (!empty($_POST["remember"]))
							{
								// Sets the password to a cookie to be saved for 24hrs
								setcookie("passCook", $password, time()+60*60*24);
							}
					}
					
					
					// If the username is incorrect but the password is correct
					if (($userCorrect == false) && ($passwordCorrect == true))
					{
						echo "<br><br>Your username is incorrect, you need to ensure that your username is 'Admin1'";
					}
					
					// If the username is correct but the password is incorrect
					if (($userCorrect == true) && ($passwordCorrect == false))
					{
						echo "<br><br>Your password is incorrect, you need to ensure that your password is 'Admin!'";
					}		
					
					// If the username and password are incorrect
					if (($userCorrect == false) && ($passwordCorrect == false))
					{
						echo "<br><br>Your username and password are incorrect, you need to ensure that your username is Admin1<br><br>";
						echo "You also need to ensure that your password is 'Admin!'";
					}		
					
					// If the username and password are correct, go to admin page
					if(($userCorrect == true) && ($passwordCorrect == true))
					{ 
						header("Location:https://www.gllmhecomputing.net/gllm311624/assignment2/adminPage.php"); exit;					 
					}
				}
				// Exits session
				exit;
			?>
		</div>
		</div>
	</body>
</html>
