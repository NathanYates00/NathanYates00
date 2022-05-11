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
		<title>Admin abilities</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class = "page">
		<form action="adminPage.php" method="POST">
		<div class = "header">
			<!-- Clickable logo to return to homepage -->
			<a href="productPage.php" class="logo">
			<img src="images/logo.png" alt="Logo"></a>
			<h1 class = "title">Admin abilities</h1>	
		</div>
		<div class="tab-content-admin">
			<H2>Orders by product</H2>
			<H3>Select a product to check the total times they have been ordered</H3>
			<!-- A dropdown menu that allows the admin to choose from the 9 products -->
			<select name="productSelected" id="productSelected">
							<option value="prod1">Lifting Straps</option>
							<option value="prod2">Wrist Straps</option>
							<option value="prod3">Liquid Chalk</option>
							<option value="prod4">Gym Gloves</option>
							<option value="prod5">Hand Grip</option>
							<option value="prod6">Protein Powder</option>
							<option value="prod7">Creatine Monohydrate</option>
							<option value="prod8">Barbell Pad</option>
							<option value="prod9">Lifting Belt</option>
			</select><br><br>
			<input type="submit" value="Search now" name="prodSubmit" id="prodSubmit"><br><br>
			<?php  			
				// If the search now button is clicked
				if ($_POST["prodSubmit"])
				{
					// Sets the product selected as a variable
					$productSelected = $_POST["productSelected"];

					// Switch statement was more efficient than 9 if statements
					switch ($productSelected)
					{
						// If the first product is pressed etc.
						case "prod1":
						
							// Set productID to 19 to be checked on the database
							$productID = 19;
							
							// Echo a message confirming the lifting straps have been selected
							echo "Lifting straps have been selected.";
							
							// Break out of switch statement etc
							break;
							
						case "prod2":
							$productID = 2;
							echo "Wrist straps have been selected.";
							break;
							
						case "prod3":
							$productID = 3;
							echo "Liquid chalk has been selected.";
							break;
						
						case "prod4":
							$productID = 4;
							echo "Gym gloves have been selected.";
							break;
							
						case "prod5":
							$productID = 5;
							echo "Hand grip has been selected.";
							break;
							
						case "prod6":
							$productID = 6;
							echo "Protein powder has been selected.";
							break;
							
						case "prod7":
							$productID = 7;
							echo "Creatine monohydrate has been selected.";
							break;
							
						case "prod8":
							$productID = 8;
							echo "Barbell pad has been selected.";
							break;
							
						case "prod9":
							$productID = 9;
							echo "Lifting belt has been selected.";
							break;
					}
					
					// Query to select the quantity all added together from the many orders from many customers
					$sqlA = "select sum(Quantity) from InvoiceProduct where ProductID = '$productID';";
			
					// Run the above query
					$result = $conn->query($sqlA);
			
					// Show when there is at least one record
					if ($result->num_rows > 0)
					{
						// Cycle through each row and output data of each row
						while ($row = $result->fetch_assoc())
						{
							// Echo the amount of times the chosen product has been ordered by customers
							echo "<br><br> This product has been bought " . $row["sum(Quantity)"]. " times.";
						}
					}
				}
				?>
			<br><br>			
		</div>
		<br><br>
		<div class="tab-content-admin">
			<H2>Orders within time-period</H2>
			<br>
			
			<!-- Admin chooses the invoices shown from this date -->
			<label for="fromDate">From date:</label>
			
			<!-- Will default the calender to 25th of April 2022 as this was the day of the first order.
			Can be altered by the admin to a specific day though --> 
			<input type="date" id="fromDate" name="fromDate" value="2022-04-25"> &nbsp &nbsp &nbsp;
			
			<!-- Admin chooses the invoices shown up to this date -->
			<label for="toDate">To date:</label>
			
			<!-- Will default the calender to todays date, can be altered by the admin to a specific day though -->
			<input type="date" id="toDate" name="toDate" value="<?php echo date("Y-m-d")?>"> &nbsp &nbsp &nbsp;
			<input type="submit" name="dateSubmit" id="dateSubmit" value="Submit time-period request">
			<?php
				// If the date submit button has been pressed
				if ($_POST["dateSubmit"])
					{
						
			?>
			<br><br>
			<!-- Table displaying the invoice details from the selected time period -->
			<table class="cart">
			<tr>
							<th>Invoice ID</th>
							<th>Customer ID</th>
							<th>Total Price</th>				
							<th>Order Date</th>
			</tr>
			<?php
						// Sets the selected from and to dates as variables
						$from = $_POST["fromDate"];
						$to = $_POST["toDate"];
						
						// Select all from invoice table where the orderdate is between the chosen from and to dates
						$sqlB = "select * from Invoice where OrderDate BETWEEN '$from' AND '$to';";
			
						// Run the above select all query
						$result = $conn->query($sqlB);
			
						// Show when there is at least one record
						if ($result->num_rows > 0)
						{
							// Cycle through each row and output data of each row
							while ($row = $result->fetch_assoc())
							{
			?>
				
				<tr>
					<!-- Echos all of the invoice details -->
					<td><?php echo $row["InvoiceID"]; ?></td>
					<td><?php echo $row["CustomerID"]; ?></td>
					<td>£<?php echo $row["TotalPrice"]; ?></td>
					<td><?php echo $row["OrderDate"]; ?></td>
				</tr>
			<?php				
							// Closes the while loop
							}
						// Closes the if statement
						}
						else
						{
							// If there are no results availiable
							echo "<br><br>No orders have been placed within this time-period.<br><br>";
						}
					}
			// Closes connection
			$conn->close();
			
			// Exits session
			exit;
			?>	
			</table>
		</div>
		</form>
	</body>
</html>