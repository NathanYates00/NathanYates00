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
		
		// If Add to order button is pressed then do this
		if(isset($_POST["addToOrder"]))
		{
			// If cart already exists then do this
			if(isset($_SESSION["cart"]))
			{
				$product_array_id = array_column($_SESSION["cart"], "Product_ID");
				
				
				// If product is not already within the order
				if(!in_array($_GET["ProductID"], $product_array_id))
				{
					$count = count($_SESSION["cart"]);
					// Add to array featuring these attributes
					$product_array = array
					(
						'Product_ID'			=>	$_GET["ProductID"],
						'Product_Name'			=>	$_POST["hidden_name"],
						'Product_Price'			=>	$_POST["hidden_price"],
						'Product_Quantity'		=>	$_POST["quantity"]
					);
					// Declares array as session cart
					$_SESSION["cart"][$count] = $product_array;
					// Notifies customer that product has been added to order
					echo '<script>alert("Product has been added to your order")</script>';
				}
				
				// If the product is already within the order
				else
				{
					// Notifies customer that product is already within the order
					echo '<script>alert("Product has already been added.")</script>';
				}
			}
			
			// If cart does not already exists then do this
			else
			{
				// Create array featuring these attributes
				$product_array = array
				(
					'Product_ID'			=>	$_GET["ProductID"],
					'Product_Name'			=>	$_POST["hidden_name"],
					'Product_Price'			=>	$_POST["hidden_price"],
					'Product_Quantity'		=>	$_POST["quantity"]		
				);
				// Declares array as session cart
				$_SESSION["cart"][0] = $product_array;
				// Notifies customer that product has been added to order
				echo '<script>alert("Product has been added to your order")</script>';
			}
		}
		// If the customer wants to remove the product from the order and the remove button is pressed
		if(isset($_GET["action"]))
		{
			if($_GET["action"] == "delete")
			{
				foreach($_SESSION["cart"] as $keys => $values)
				{
					if($values["Product_ID"] == $_GET["ProductID"])
					{
						unset($_SESSION["cart"][$keys]);
						echo '<script>alert("Product has been removed from order")</script>';
					}
				}
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welsh Weight-Lifting LTD</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class="page">		
			<div class = "header">
				<a href="productPage.php" class="logo">
				<img src="images/logo.png" alt="Logo"></a>
				<h1 class = "title">Welsh Weight-Lifting Products</h1>			
			</div>
			<div class="tab-content">
			<div class="row">
			<!-- This is to have only three products to a row, and makes the not awkwardly reposition -->
			<div class="seperateRow">
			<?php
			// In order to only select from the database where the productID = 19
			$query = "SELECT * FROM Product WHERE ProductID = 19";
					$result = mysqli_query($conn, $query);
					
					// Will do this since the product was manually entered into the database by me, so they will be present.
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>
				<!-- Within this div is purely the first product only, to seperate them on the website -->
				<div id="prod1">
					<!-- Posts this within the url, gets ID from database -->
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					
					<!-- Echos name, gets name from database -->
					<br><h1><?php echo $row["Name"]; ?></h1><br>
					
					<!-- Displays image from within the images folder, reference to all images are present in testing doc -->
					<img src="images/liftingStraps.png" alt="Lifting Straps" class="prodImg">
					
					<!-- Echos price, gets price from database -->
					Price per pair: £<?php echo $row["Price"]; ?> <br>
					
					<!-- Echos description, gets description from database -->
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					
					<!-- Sets quantity to 1 by default, this input allows customer to order as many of this product as they would like -->
					<input type="number" name="quantity" value="1">
					
					<!-- This is the hidden name, but is present so that it can be added to the array -->
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					
					<!-- This is the hidden price, but is present so that it can be added to the array -->
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					
					<!-- Customer will click this so that the product is added to the array / cart -->
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						// Closes the while loop
						}
					// Closes the if statement
					}
			?>
				
			<?php
			// In order to only select from the database where the productID = 2
			$query = "SELECT * FROM Product WHERE ProductID = 2";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>	
				<div id="prod2">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>
					<img src="images/wristStraps.png" alt="Wrist Straps" class="prodImg">
					Price per pair: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
				
			<?php
			// In order to only select from the database where the productID = 3
			$query = "SELECT * FROM Product WHERE ProductID = 3";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>	
				<div id="prod3">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>		
					<img src="images/liquidChalk.png" alt="Liquid Chalk" class="prodImg">
					Price per bottle: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
			</div>	
			
			<!-- Creates a new row with the next three products -->
			<div class="seperateRow">	
			<?php
			// In order to only select from the database where the productID = 4
			$query = "SELECT * FROM Product WHERE ProductID = 4";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>
				<div id="prod4">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>				
					<img src="images/gloves.png" alt="Gym Gloves" class="prodImg">
					Price per pair: £<?php echo $row["Price"]; ?><br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
				
			<?php
			// In order to only select from the database where the productID = 5
			$query = "SELECT * FROM Product WHERE ProductID = 5";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>	
				<div id="prod5">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>				
					<img src="images/handGrip.png" alt="Hand Grip" class="prodImg">
					Price per grip: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
			
			<?php
			// In order to only select from the database where the productID = 6
			$query = "SELECT * FROM Product WHERE ProductID = 6";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>
				<div id="prod6">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>					
					<img src="images/protein.png" alt="Protein Powder" class="prodImg">
					Price per bag: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
			</div>
			
			<!-- Creates a new row with the final three products -->
			<div class="seperateRow">
			<?php
			// In order to only select from the database where the productID = 7
			$query = "SELECT * FROM Product WHERE ProductID = 7";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>
				<div id="prod7">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>					
					<img src="images/creatine.png" alt="Creatine Monohydrate" class="prodImg">
					Price per bag: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
			
			<?php
			// In order to only select from the database where the productID = 8
			$query = "SELECT * FROM Product WHERE ProductID = 8";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>			
				<div id="prod8">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>				
					<img src="images/barbellPad.png" alt="Barbell Pad" class="prodImg">
					Price per pad: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
				
			<?php
			// In order to only select from the database where the productID = 9
			$query = "SELECT * FROM Product WHERE ProductID = 9";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
			?>
				<div id="prod9">
					<form method="POST" action="productPage.php?action=add&ProductID=<?php echo $row["ProductID"];?>">
					<br><h1><?php echo $row["Name"]; ?></h1><br>				
					<img src="images/belt.png" alt="Lifting Belt" class="prodImg">
					Price per belt: £<?php echo $row["Price"]; ?> <br>
					<p class="prodDescription"><?php echo $row["Description"]; ?></p>
					<input type="number" name="quantity" value="1">
					<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
					<br><input type="submit" value="Add to order" name="addToOrder"><br><br>
					</form>
				</div>
			<?php
						}
					}
			?>
			</div>
			<br><br>
			<!-- With help from this youtube video to fully understand how to do the order basket element https://www.youtube.com/watch?v=0wYSviHeRbs -->
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
				<br><br>
				<form action="productPage.php" method="POST">				
				<input type="submit" name="orderSubmit" value="Proceed with your order">
				<?php
					if(isset($_POST['orderSubmit']))
						{	
							// If cart is empty notify customer that they cannot progress with empty cart
							if (empty($_SESSION["cart"])) 
							{
								echo '<script>alert("Cannot proceed to next page whilst order basket is empty.")</script>';
							}
							
							// If cart does contain at least one product then the customer can proceed
							else
							{
								echo "<script>window.location.href='orderPage.php';</script>";
							}
						}					
				?>
				</form>
				<!-- Clicking this will take the admin to input their login details -->
				<a id="adminBtn" href="loginPage.php">Admin Page</a>
				<?php
				// Closes connection to database
				$conn->close();
				// Exits session
				exit;
				?>				
			</div>
			</div>		
	</body>
</html>