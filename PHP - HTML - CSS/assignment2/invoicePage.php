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
		<title>Customer Invoice</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class = "page">
		<form action="invoicePage.php" method="POST">
		<div class = "header">
			<!-- Clickable logo to return to homepage -->
			<a href="productPage.php" class="logo">
			<img src="images/logo.png" alt="Logo"></a>
			<h1 class = "title">Customer Invoice</h1>			
		</div>
		<div class="tab-content">
		<div class="login-details">
		<H3>Here is your invoice</H3>
		<?php
			// Sets the details from the previous page as a variable
			$iCustomerID = $_SESSION["custoID"];
			$iTotalPrice = $_SESSION["totalPrice"];
			
			// Select all statement where the customer ID is equal to the customer's ID and total price is equal to total price of order
			$sqlB = "SELECT * FROM Invoice WHERE CustomerID = '$iCustomerID' AND TotalPrice = '$iTotalPrice';";
			
			// Run the above select all statement
			$result = $conn->query($sqlB);
			
			// Show when there is at least one record
			if ($result->num_rows > 0)
			{
				// Cycle through each row and output data of each row
				while ($row = $result->fetch_assoc()) 
				{
					echo "<br> Invoice ID: " . $row["InvoiceID"]. 
					"<br> Customer ID: " . $row["CustomerID"]. 
					"<br> Total Price: £" . $row["TotalPrice"]. 
					"<br> Order Date: " . $row["OrderDate"];
					$_SESSION["InvID"] = $row["InvoiceID"];
				}
			}

			else
			{
				// If there are no results availiable
				echo "<br>Order not confirmed.";
			}
			
			// For each of the products in the cart
			foreach($_SESSION["cart"] as $keys => $values)
			{
			// Variables to easily insert into SQL
			$mInvoiceID = $_SESSION["InvID"];
			$mProductID = $values["Product_ID"];
			$mQuantity = $values["Product_Quantity"];
			$mName = $values["Product_Name"];
			
			// Insert each of the products into the database
			$sqlC = "INSERT INTO InvoiceProduct (InvoiceID, ProductID, Quantity, ProductName) VALUES ('$mInvoiceID', '$mProductID', '$mQuantity', '$mName');";
			
			// Run the above insert statement
			$conn->query($sqlC);
			}
			// Select all from the invoice product table where the invoiceID is equal to the invoiceID for this customer
			$sqlC = "SELECT * FROM InvoiceProduct WHERE InvoiceID = '$mInvoiceID';";
			
			// Run the above select all statement
			$result = $conn->query($sqlC);
			
			// Show when there is at least one record
			if ($result->num_rows > 0)
			{
				// Cycle through each row and output data of each row
				while ($row = $result->fetch_assoc())
				{
					echo "<br><br> Product Name: " . $row["ProductName"].
					"<br> Quantity: " . $row["Quantity"];
				}
			}
			
			else
			{
				// If there are no results availiable
				echo "<br>Order cannot be confirmed.";
			}
			// Closes connection
			$conn->close();
			
			// Exits session
			exit;
		?>
		</div>
		</div>
		</form>
	</body>
</html>