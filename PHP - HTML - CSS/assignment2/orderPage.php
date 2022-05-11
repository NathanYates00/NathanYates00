<?php
	// Starts the session
	session_start();
	
	// Checks to see if username and password are correct to the database
	$servername = "localhost";
	$uname = "ddm311624";
	$pword = "DDMTest!NY1";
	$dbname = "ddm311624";

	// Create connection
	$conn = mysqli_connect($servername, $uname, $pword, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ordering Page</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class = "page">
		<form action="orderPage.php" method="POST">
		<div class = "header">
			<!-- Clickable logo to return to homepage -->
			<a href="productPage.php" class="logo">
			<img src="images/logo.png" alt="Logo"></a>
			<h1 class = "title">Ordering Page</h1>			
		</div>
		<div class="tab-content">
		<div class="cart-table">
			<!-- What follows is the customers order -->
			<h2 class = "basket">Order basket</h2><br>
			<!-- Creates a table to display the products within the customers order -->
			<table class="cart">
				<tr>
					<th>Product name</th>
					<th>Quantity</th>
					<th>Price</th>				
					<th>Total product price</th>
					<th>Action</th>
				</tr>
				<?php
					// If the cart is not empty the begin displaying the product details
					if(!empty($_SESSION["cart"]))
					{
						$total = 0;
						// For each of the products within the basket, do this
						foreach($_SESSION["cart"] as $keys => $values)
						{
				?>
				<tr>
					<!-- Echos the product name from the array -->
					<td><?php echo $values["Product_Name"]; ?></td>
					
					<!-- Echos the product quantity from the array -->
					<td><?php echo $values["Product_Quantity"]; ?></td>
					
					<!-- Echos the product price from the array -->
					<td>£<?php echo $values["Product_Price"]; ?></td>
					
					<!-- Echos the total cost for this product from the array, by multiplying the quantity by the price -->
					<td>£<?php echo number_format($values["Product_Quantity"] * $values["Product_Price"], 2); ?></td>
					
					<!-- Allows the product to be removed from the basket -->
					<td><a href="productPage.php?action=delete&ProductID=<?php echo $values["Product_ID"]; ?>"><span>Remove product</span></a></td>
				</tr>
				<?php	
							// Total cost of the entire order
							$total = $total + ($values["Product_Quantity"] * $values["Product_Price"]);
						// Closes the foreach loop
						}
				?>
				<tr>
					<td>Total order price</td>
					<!-- Echos the entire cost of the order -->
					<td>£<?php echo number_format($total, 2); ?></td>					
				</tr>
				<?php
					// Closes the if statement
					}
				?>
			</table>
		</div>
		
		<div class="login-details">
			<br><br><br><h2>Please enter your details</h2><br>
			
			<label for="custFirst"> Please enter your first name: </label><br>
			<!-- If the firstname cookie has been set, echo the firstname into the firstname text box -->
			<input type="text" name="custFirst" id="custFirst" value="<?php if(isset($_COOKIE["firstCook"])) echo $_COOKIE["firstCook"]; ?>" required><br><br>
			
			<label for="custSur"> Please enter your surname: </label><br>
			<!-- If the surname cookie has been set, echo the surname into the surname text box -->
			<input type="text" name="custSur" id="custSur" value="<?php if(isset($_COOKIE["surCook"])) echo $_COOKIE["surCook"]; ?>" required><br><br>
			
			<label for="custAddress"> Please enter your address: </label><br>
			<!-- If the address cookie has been set, echo the address into the address text box -->
			<input type="text" name="custAddress" id="custAddress" value="<?php if(isset($_COOKIE["addressCook"])) echo $_COOKIE["addressCook"]; ?>" required><br><br>
			
			<label for="custTown"> Please enter your town: </label><br>
			<!-- If the town cookie has been set, echo the town into the town text box -->
			<input type="text" name="custTown" id="custTown" value="<?php if(isset($_COOKIE["townCook"])) echo $_COOKIE["townCook"]; ?>" required><br><br>
			
			<label for="custPostCode"> Please enter your postcode: </label><br>
			<!-- If the postcode cookie has been set, echo the postcode into the postcode text box -->
			<input type="text" name="custPostCode" id="custPostCode" value="<?php if(isset($_COOKIE["postcodeCook"])) echo $_COOKIE["postcodeCook"]; ?>" required><br><br>
			
			<label for="custPhone"> Please enter your phone number: </label><br>
			<!-- If the phone number cookie has been set, echo the phone number into the phone number text box -->
			<input type="text" name="custPhone" id="custPhone" value="<?php if(isset($_COOKIE["phoneCook"])) echo $_COOKIE["phoneCook"]; ?>" required><br><br>
			
			<label for="custEmail"> Please enter your email: </label><br>
			<!-- If the email cookie has been set, echo the email into the email text box -->
			<input type="email" name="custEmail" id="custEmail" value="<?php if(isset($_COOKIE["emailCook"])) echo $_COOKIE["emailCook"]; ?>" required><br><br>					
		
			<!-- Checkbox that allows the admin to save their login details for 24 hours -->
			<input type="checkbox" name="remember" id="remember">Remember me (This will save your details for one day.)<br><br></p>
			<input type="submit" name="detailsSubmit" id="detailsSubmit" value="Save details and proceed to checkout">&nbsp;
			
			<!-- Clears the input fields of the customers details -->
			<input type="reset" name="reset" value="Reset">&nbsp;
		
			
			<?php
			// If button to submit details has been pressed
			if(isset($_POST['detailsSubmit']))
			{
				// Sets the customers details as variables
				$customerFirst = $_POST["custFirst"];
				$customerSur = $_POST["custSur"];
				$customerAddress = $_POST["custAddress"];
				$customerTown = $_POST["custTown"];
				$customerPostcode = $_POST["custPostCode"];
				$customerPhone = $_POST["custPhone"];
				$customerEmail = $_POST["custEmail"];
				
				// If the customer has checked the box to allow the details to be saved for a day
				if (!empty($_POST["remember"]))
					{
						// Sets each of the details as cookies to be remembered for 24 hours
						setcookie("firstCook", $customerFirst, time()+60*60*24);
						setcookie("surCook", $customerSur, time()+60*60*24);
						setcookie("addressCook", $customerAddress, time()+60*60*24);
						setcookie("townCook", $customerTown, time()+60*60*24);
						setcookie("postcodeCook", $customerPostcode, time()+60*60*24);
						setcookie("phoneCook", $customerPhone, time()+60*60*24);
						setcookie("emailCook", $customerEmail, time()+60*60*24);
					}
				
				// Variables to easily insert into SQL
				$cFirst = $_POST['custFirst'];
				$cSur = $_POST['custSur'];
				$cAddress = $_POST['custAddress'];
				$cTown = $_POST['custTown'];
				$cPostCode = $_POST['custPostCode'];
				$cPhone = $_POST['custPhone'];
				$cEmail = $_POST['custEmail'];
				$_SESSION["custEmail"] = $cEmail;
				
				// Checking to see if this customer already exists
				$sqlA = "SELECT Email FROM Customers WHERE EXISTS (SELECT Email FROM Customers WHERE Email = '$cEmail');";
				
				// Run the above select statement
				$result = $conn->query($sqlA);
				
				// If the query finds a customer does not exist, insert to generate new customer. 
				// If a customer does already exist, it skips this part to avoid making a new customer.
				// This stops prevents the same customer having multiple customerID, being inefficient.
				if (mysqli_num_rows($result)==0)
				{
				// Insert statement into the SQL
				$sqlB = "INSERT INTO Customers (FirstName, Surname, Address, Town, PostCode, PhoneNumber, Email) VALUES ('$cFirst', '$cSur', '$cAddress', '$cTown', '$cPostCode', '$cPhone', '$cEmail');";
				
				// Running the insert statement
				$conn->query($sqlB);
				}
				// Closes connection
				$conn->close();
				
				// Takes the customer to the confirmation page
				echo "<script>window.location.href='confirmPage.php';</script>";
				// Exits session
				exit;
			}
			?>
		</div>
		</div>
		</form>
	</body>
</html>