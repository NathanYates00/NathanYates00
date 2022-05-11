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
		<title>Confirming Order</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class = "page">
		<form action="confirmPage.php" method="POST">
		<div class = "header">
			<!-- Clickable logo to return to homepage -->
			<a href="productPage.php" class="logo">
			<img src="images/logo.png" alt="Logo"></a>
			<h1 class = "title">Confirming Your Order</h1>			
		</div>
		<div class="tab-content">
		<div class="login-details">
		<H3>Here are your details</H3>
			<?php
				// Sets the email from the previous page as a variable to be used on this page
				$cEmail = $_SESSION["custEmail"];
			
				// Will output customer's details by finding their email (Used email as it is unique, compared to using first or last name.)
				$sqlA = "SELECT * FROM Customers WHERE Email = '$cEmail';";
				
				// Run the above select all statement
				$result = $conn->query($sqlA);
				
				// Show when there is at least one record
				if ($result->num_rows > 0)
				{
					// Cycle through each row and output data of each row
					while ($row = $result->fetch_assoc()) 
					{
						echo "Customers ID: " . $row["CustomerID"]. 
						"<br> First name: " . $row["FirstName"]. 
						"<br> Surname: " . $row["Surname"]. 
						"<br> Address: " . $row["Address"]. 
						"<br> Town: " . $row["Town"]. 
						"<br> Post code: " . $row["PostCode"].
						"<br> Phone Number: " . $row["PhoneNumber"]. 
						"<br> Email: " . $_SESSION["custEmail"]."<br><br>";
						$_SESSION["custoID"] = $row["CustomerID"];
					}
				}
				
				else
				{
					// If there are no results availiable
					echo "Customer details have not saved.";
				}
			?>
		</div>
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
		<input type="submit" name="orderSubmit" value="Complete order and obtain invoice">
		<?php
			// If order submit button is pressed
			if(isset($_POST['orderSubmit']))
			{			
			// Gets the current year, month, and day
			date("Y-m-d");
			
			// Variables to easily insert into SQL				
			$iTotalPrice = $total;
			$iOrderDate = date("Y-m-d");
			$iCustomerID = $_SESSION["custoID"];
			$_SESSION["totalPrice"] = $total;
			
			// Insert statement into the SQL
			$sqlB = "INSERT INTO Invoice (CustomerID, TotalPrice, OrderDate) VALUES ('$iCustomerID', '$iTotalPrice', '$iOrderDate');";
			
			// Run the insert statement
			$conn->query($sqlB);	

			// Closes connection
			$conn->close();
			
			// Takes the customer to the invoice page
			echo "<script>window.location.href='invoicePage.php';</script>";
			
			// Exits session
			exit;
			}
		?>
		</div>
		</div>
		</form>
	</body>
</html>