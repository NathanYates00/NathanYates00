<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Conversions Version Two</title>
		<link rel="stylesheet" href="screen.css">
	</head>
	<body class="conversion">
		<form action="conversionVer2.php" method="GET">
			<h1>Conversions Version Two page</h1>
			
			<!-- Buttons to take the user to the different type of conversions -->
			<div class="menu">
				<a href="#speed2">Speed conversions</a>
				<a href="#length2">Length conversions</a>
				<a href="#currency2">Currency conversions</a>
				<a href="#weight2">Weight conversions</a>
				<a href="#temperature2">Temperature conversions</a>
				<a href="#pressure2">Pressure conversions</a>
			</div>
			<div class="tab-content">
				<!-- Speed conversions -->
				<div id="speed2">
					<br><h1>Speed conversions</h1><br>
					Convert from: <br>
					<label for="firstSpeed">Input the initial measurement and choose the speed unit:</label>
					
					<!-- Takes the users required number to be converted -->
					<input type="number" name="speedNumber">
					
					<!-- Takes the users first unit that is to be converted -->
						<select name="firstSpeed" id="firstSpeed">
							<option value="metre/s">Metres per second</option>
							<option value="feet/s">Feet per second</option>
							<option value="mph">Miles per hour</option>
							<option value="kph">Kilometres per hour</option>
							<option value="knot">Knots</option>
						</select><br><br>
					Convert to: <br>
					<label for="secondSpeed">Choose the required conversion speed unit:</label>
					
					<!-- Takes the users second unit to be converted to -->
						<select name="secondSpeed" id="secondSpeed">
							<option value="metre/s">Metres per second</option>
							<option value="feet/s">Feet per second</option>
							<option value="mph">Miles per hour</option>
							<option value="kph">Kilometres per hour</option>
							<option value="knot">Knots</option>
							<option value="allSpeeds">All speeds</option>
						</select><br><br>
					<input type="submit" value="Convert now" name="speedSubmit"><br><br>
					<?php  
					function speedConvert()
					{
						// If the text box is empty
						if (empty($_GET["speedNumber"])) 
						{
						  $speedAnswer = "Please input a number to convert.";
						  echo $speedAnswer;
						}
						
						// If the text box is not empty
						if (!empty($_GET["speedNumber"])) 
						{
							
							// Takes the number inputted by the user, as well as the first and second units, sets these as variables
							$speedNumber = $_GET["speedNumber"];
							$firstSpeed = $_GET["firstSpeed"];
							$secondSpeed = $_GET["secondSpeed"];
							
							// Switch statement for the first unit chosen by the user
							switch ($firstSpeed)
							{
								case "metre/s":
									// Individual switch statements depending on the first unit chosen
									switch ($secondSpeed)
									{
										// Depending which of the second units are chosen, this will output the correct statement
										case "metre/s":
										
										// This sets the conversion to the answer, so that it can be output for the user once it breaks out of the switch statement
										$speedAnswer = $speedNumber." Metres per second = ".$speedNumber." Metres per second";
										break;
										
										// Numbers are rounded up and output to two decimal places, giving the user a more accurate conversion
										case "feet/s":
										$speedAnswer = $speedNumber." Metres per second = ".number_format((float)$speedNumber * 3.281, 2, '.', '') ." Feet per second";
										break;
										
										case "mph":
										$speedAnswer = $speedNumber." Metres per second = ".number_format((float)$speedNumber * 2.237, 2, '.', '')." Miles per hour";
										break;
										
										case "kph":
										$speedAnswer = $speedNumber." Metres per second = ".number_format((float)$speedNumber * 3.6, 2, '.', '')." Kilometre per hour";
										break;
										
										case "knot":
										$speedAnswer = $speedNumber." Metres per second = ".number_format((float)$speedNumber * 1.944, 2, '.', '') ." Knots";
										break;
										
										// If this is chosen, all answers will be output
										case "allSpeeds":
										$speedAnswer = $speedNumber." Metres per second = ".$speedNumber." Metres per second". "<br><br>".
										$speedNumber." Metres per second = ".number_format((float)$speedNumber * 3.281, 2, '.', '') ." Feet per second". "<br><br>".
										$speedNumber." Metres per second = ".number_format((float)$speedNumber * 2.237, 2, '.', '')." Miles per hour". "<br><br>".
										$speedNumber." Metres per second = ".number_format((float)$speedNumber * 3.6, 2, '.', '')." Kilometre per hour". "<br><br>".
										$speedNumber." Metres per second = ".number_format((float)$speedNumber * 1.944, 2, '.', '') ." Knots";
										break;
									}
								break;

								case "feet/s":
									switch ($secondSpeed)
									{
										case "metre/s":
										$speedAnswer = $speedNumber." Feet per second = ".number_format((float)$speedNumber / 3.281, 2, '.', '') ." Metres per second";
										break;
										
										case "feet/s":
										$speedAnswer = $speedNumber." Feet per second = ".$speedNumber." Feet per second";
										break;
										
										case "mph":
										$speedAnswer = $speedNumber." Feet per second = ".number_format((float)$speedNumber / 1.467, 2, '.', '')." Miles per hour";
										break;
										
										case "kph":
										$speedAnswer = $speedNumber." Feet per second = ".number_format((float)$speedNumber * 1.097, 2, '.', '')." Kilometre per hour";
										break;
										
										case "knot":
										$speedAnswer = $speedNumber." Feet per second = ".number_format((float)$speedNumber / 1.688, 2, '.', '') ." Knots";
										break;
										
										case "allSpeeds":
										$speedAnswer = $speedNumber." Feet per second = ".number_format((float)$speedNumber / 3.281, 2, '.', '') ." Metres per second". "<br><br>".
										$speedNumber." Feet per second = ".$speedNumber." Feet per second". "<br><br>".
										$speedNumber." Feet per second = ".number_format((float)$speedNumber / 1.467, 2, '.', '')." Miles per hour". "<br><br>".
										$speedNumber." Feet per second = ".number_format((float)$speedNumber * 1.097, 2, '.', '')." Kilometre per hour". "<br><br>".
										$speedNumber." Feet per second = ".number_format((float)$speedNumber / 1.688, 2, '.', '') ." Knots";
										break;
									}
								break;

								case "mph":
									switch ($secondSpeed)
									{
										case "metre/s":
										$speedAnswer = $speedNumber." Miles per hour = ".number_format((float)$speedNumber / 2.237, 2, '.', '') ." Metres per second";
										break;
										
										case "feet/s":
										$speedAnswer = $speedNumber." Miles per hour = ".number_format((float)$speedNumber * 1.467, 2, '.', '') ." Feet per second";
										break;
										
										case "mph":
										$speedAnswer = $speedNumber." Miles per hour = ".$speedNumber." Miles per hour";
										break;
										
										case "kph":
										$speedAnswer = $speedNumber." Miles per hour = ".number_format((float)$speedNumber * 1.609, 2, '.', '')." Kilometre per hour";
										break;
										
										case "knot":
										$speedAnswer = $speedNumber." Miles per hour = ".number_format((float)$speedNumber / 1.151, 2, '.', '') ." Knots";
										break;
										
										case "allSpeeds":
										$speedAnswer = $speedNumber." Miles per hour = ".number_format((float)$speedNumber / 2.237, 2, '.', '') ." Metres per second". "<br><br>".
										$speedNumber." Miles per hour = ".number_format((float)$speedNumber * 1.467, 2, '.', '') ." Feet per second". "<br><br>".
										$speedNumber." Miles per hour = ".$speedNumber." Miles per hour". "<br><br>".
										$speedNumber." Miles per hour = ".number_format((float)$speedNumber * 1.609, 2, '.', '')." Kilometre per hour". "<br><br>".
										$speedNumber." Miles per hour = ".number_format((float)$speedNumber / 1.151, 2, '.', '') ." Knots";
										break;
									}
								break;

								case "kph":
									switch ($secondSpeed)
									{
										case "metre/s":
										$speedAnswer = $speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 3.6, 2, '.', '') ." Metres per second";
										break;
										
										case "feet/s":
										$speedAnswer = $speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 1.097, 2, '.', '') ." Feet per second";
										break;
										
										case "mph":
										$speedAnswer = $speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 1.609, 2, '.', '')." Miles per hour";
										break;
										
										case "kph":
										$speedAnswer = $speedNumber." Kilometre per hour = ".$speedNumber." Kilometre per hour";
										break;
										
										case "knot":
										$speedAnswer = $speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 1.852, 2, '.', '') ." Knots";
										break;
										
										case "allSpeeds":
										$speedAnswer = $speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 3.6, 2, '.', '') ." Metres per second". "<br><br>".
										$speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 1.097, 2, '.', '') ." Feet per second". "<br><br>".
										$speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 1.609, 2, '.', '')." Miles per hour". "<br><br>".
										$speedNumber." Kilometre per hour = ".$speedNumber." Kilometre per hour". "<br><br>".
										$speedNumber." Kilometre per hour = ".number_format((float)$speedNumber / 1.852, 2, '.', '') ." Knots";
										break;
									}
								break;
								
								case "knot":
									switch ($secondSpeed)
									{
										case "metre/s":
										$speedAnswer = $speedNumber." Knots = ".number_format((float)$speedNumber / 1.944, 2, '.', '') ." Metres per second";
										break;
										
										case "feet/s":
										$speedAnswer = $speedNumber." Knots = ".number_format((float)$speedNumber * 1.688, 2, '.', '') ." Feet per second";
										break;
										
										case "mph":
										$speedAnswer = $speedNumber." Knots = ".number_format((float)$speedNumber * 1.151, 2, '.', '')." Miles per hour";
										break;
										
										case "kph":
										$speedAnswer = $speedNumber." Knots = ".number_format((float)$speedNumber * 1.852, 2, '.', '')." Kilometre per hour";
										break;
										
										case "knot":
										$speedAnswer = $speedNumber." Knots = ".$speedNumber." Knots";
										break;
										
										case "allSpeeds":
										$speedAnswer = $speedNumber." Knots = ".number_format((float)$speedNumber / 1.944, 2, '.', '') ." Metres per second". "<br><br>".
										$speedNumber." Knots = ".number_format((float)$speedNumber * 1.688, 2, '.', '') ." Feet per second". "<br><br>".
										$speedNumber." Knots = ".number_format((float)$speedNumber * 1.151, 2, '.', '')." Miles per hour". "<br><br>".
										$speedNumber." Knots = ".number_format((float)$speedNumber * 1.852, 2, '.', '')." Kilometre per hour". "<br><br>".
										$speedNumber." Knots = ".$speedNumber." Knots";
										break;
									}
								break;
							}
							
							// Echos the answer to the conversion
							echo $speedAnswer;
						}
					}
					
					// This is to trigger the function above, if the submit button for speed conversions is clicked, then the function can be triggered
					if ($_GET["speedSubmit"])
					{
						speedConvert();
					}
					?>
					<br><br>
				</div>
				
				<!-- Length conversions -->
				<div id="length2">
					<br><h1>Length conversions</h1><br>
					Convert from: <br>
					<label for="firstLength">Input the initial measurement and choose the length unit:</label>
					<input type="number" name="lengthNumber">
						<select name="firstLength" id="firstLength">
							<option value="metre">Metre(s)</option>
							<option value="centimetre">Centimetre(s)</option>
							<option value="inch">Inch(es)</option>
							<option value="foot">Foot/Feet</option>
							<option value="mile">Mile(s)</option>
							<option value="kilometre">Kilometre(s)</option>
							<option value="yard">Yard(s)</option>
						</select><br><br>
					Convert to: <br>
					<label for="secondLength">Choose the required conversion length unit:</label>
						<select name="secondLength" id="secondLength">
							<option value="metre">Metre(s)</option>
							<option value="centimetre">Centimetre(s)</option>
							<option value="inch">Inch(es)</option>
							<option value="foot">Foot/Feet</option>
							<option value="mile">Mile(s)</option>
							<option value="kilometre">Kilometre(s)</option>
							<option value="yard">Yard(s)</option>
							<option value="allLengths">All lengths</option>
						</select><br><br>
					<input type="submit" value="Convert now" name="lengthSubmit"><br><br>
					<?php  
					function lengthConvert() 
					{
						if (empty($_GET["lengthNumber"])) 
						{
						  $lengthAnswer = "Please input a number to convert.";
						  echo $lengthAnswer;
						}
						
						if (!empty($_GET["lengthNumber"])) 
						{
							$lengthNumber = $_GET["lengthNumber"];
							$firstLength = $_GET["firstLength"];
							$secondLength = $_GET["secondLength"];
							
							switch ($firstLength)
							{
								case "metre":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Metre(s) = ".$lengthNumber." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Metre(s) = ".$lengthNumber * 100 ." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 39.370, 2, '.', '')." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 3.2808, 2, '.', '')." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Metre(s) = ".number_format((float)$lengthNumber / 1609, 2, '.', '') ." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 0.001, 2, '.', '') ." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 1.0936, 2, '.', '')." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Metre(s) = ".$lengthNumber." Metre(s)". "<br><br>".
										$lengthNumber." Metre(s) = ".$lengthNumber * 100 ." Centimetre(s)". "<br><br>".
										$lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 39.370, 2, '.', '')." Inch(es)". "<br><br>".
										$lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 3.2808, 2, '.', '')." Foot/Feet". "<br><br>".
										$lengthNumber." Metre(s) = ".number_format((float)$lengthNumber / 1609, 2, '.', '') ." Mile(s)". "<br><br>".
										$lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 0.001, 2, '.', '') ." Kilometre(s)". "<br><br>".
										$lengthNumber." Metre(s) = ".number_format((float)$lengthNumber * 1.0936, 2, '.', '')." Yard(s)";
										break;
									}
								break;

								case "centimetre":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".$lengthNumber / 100 ." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".$lengthNumber." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber * 0.39370, 2, '.', '')." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 30.48, 2, '.', '')." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 160934, 2, '.', '') ." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 100000, 2, '.', '') ." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 91.44, 2, '.', '')." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Centimetre(s) = ".$lengthNumber / 100 ." Metre(s)". "<br><br>".
										$lengthNumber." Centimetre(s) = ".$lengthNumber." Centimetre(s)". "<br><br>".
										$lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber * 0.39370, 2, '.', '')." Inch(es)". "<br><br>".
										$lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 30.48, 2, '.', '')." Foot/Feet". "<br><br>".
										$lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 160934, 2, '.', '') ." Mile(s)". "<br><br>".
										$lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 100000, 2, '.', '') ." Kilometre(s)". "<br><br>".
										$lengthNumber." Centimetre(s) = ".number_format((float)$lengthNumber / 91.44, 2, '.', '')." Yard(s)";
										break;
									}
								break;

								case "inch":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 39.37, 2, '.', '')." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Inch(es) = ".$lengthNumber * 2.54 ." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Inch(es) = ".$lengthNumber." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 12, 2, '.', '')." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 63360, 2, '.', '') ." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 39370, 2, '.', '') ." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 36, 2, '.', '')." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 39.37, 2, '.', '')." Metre(s)". "<br><br>".
										$lengthNumber." Inch(es) = ".$lengthNumber * 2.54 ." Centimetre(s)". "<br><br>".
										$lengthNumber." Inch(es) = ".$lengthNumber." Inch(es)". "<br><br>".
										$lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 12, 2, '.', '')." Foot/Feet". "<br><br>".
										$lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 63360, 2, '.', '') ." Mile(s)". "<br><br>".
										$lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 39370, 2, '.', '') ." Kilometre(s)". "<br><br>".
										$lengthNumber." Inch(es) = ".number_format((float)$lengthNumber / 36, 2, '.', '')." Yard(s)";
										break;
									}
								break;

								case "foot":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 3.281, 2, '.', '')." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".$lengthNumber * 30.48 ." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".$lengthNumber * 12 ." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".$lengthNumber." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 5280, 2, '.', '') ." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 3281, 2, '.', '') ." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 3, 2, '.', '')." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 3.281, 2, '.', '')." Metre(s)". "<br><br>".
										$lengthNumber." Foot/Feet = ".$lengthNumber * 30.48 ." Centimetre(s)". "<br><br>".
										$lengthNumber." Foot/Feet = ".$lengthNumber * 12 ." Inch(es)". "<br><br>".
										$lengthNumber." Foot/Feet = ".$lengthNumber." Foot/Feet". "<br><br>".
										$lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 5280, 2, '.', '') ." Mile(s)". "<br><br>".
										$lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 3281, 2, '.', '') ." Kilometre(s)". "<br><br>".
										$lengthNumber." Foot/Feet = ".number_format((float)$lengthNumber / 3, 2, '.', '')." Yard(s)";
										break;
									}
								break;
								
								case "mile":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber * 1609 ." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber * 160934 ." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber * 63360 ." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber * 5280 ." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Mile(s) = ".number_format((float)$lengthNumber * 1.609, 2, '.', '') ." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber * 1760 ." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Mile(s) = ".$lengthNumber * 1609 ." Metre(s)". "<br><br>".
										$lengthNumber." Mile(s) = ".$lengthNumber * 160934 ." Centimetre(s)". "<br><br>".
										$lengthNumber." Mile(s) = ".$lengthNumber * 63360 ." Inch(es)". "<br><br>".
										$lengthNumber." Mile(s) = ".$lengthNumber * 5280 ." Foot/Feet". "<br><br>".
										$lengthNumber." Mile(s) = ".$lengthNumber." Mile(s)". "<br><br>".
										$lengthNumber." Mile(s) = ".number_format((float)$lengthNumber * 1.609, 2, '.', '') ." Kilometre(s)". "<br><br>".
										$lengthNumber." Mile(s) = ".$lengthNumber * 1760 ." Yard(s)";
										break;
									}
								break;
								
								case "kilometre":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber * 1000 ." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber * 100000 ." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber * 39370 ." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber * 3281 ." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".number_format((float)$lengthNumber / 1.609, 2, '.', '') ." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber * 1094 ." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Kilometre(s) = ".$lengthNumber * 1000 ." Metre(s)". "<br><br>".
										$lengthNumber." Kilometre(s) = ".$lengthNumber * 100000 ." Centimetre(s)". "<br><br>".
										$lengthNumber." Kilometre(s) = ".$lengthNumber * 39370 ." Inch(es)". "<br><br>".
										$lengthNumber." Kilometre(s) = ".$lengthNumber * 3281 ." Foot/Feet". "<br><br>".
										$lengthNumber." Kilometre(s) = ".number_format((float)$lengthNumber / 1.609, 2, '.', '') ." Mile(s)". "<br><br>".
										$lengthNumber." Kilometre(s) = ".$lengthNumber." Kilometre(s)". "<br><br>".
										$lengthNumber." Kilometre(s) = ".$lengthNumber * 1094 ." Yard(s)";
										break;
									}
								break;
								
								case "yard":
									switch ($secondLength)
									{
										case "metre":
										$lengthAnswer = $lengthNumber." Yard(s) = ".number_format((float)$lengthNumber / 1.094, 2, '.', '')." Metre(s)";
										break;
										
										case "centimetre":
										$lengthAnswer = $lengthNumber." Yard(s) = ".$lengthNumber * 91.44 ." Centimetre(s)";
										break;
										
										case "inch":
										$lengthAnswer = $lengthNumber." Yard(s) = ".$lengthNumber * 36 ." Inch(es)";
										break;
										
										case "foot":
										$lengthAnswer = $lengthNumber." Yard(s) = ".$lengthNumber * 3 ." Foot/Feet";
										break;
										
										case "mile":
										$lengthAnswer = $lengthNumber." Yard(s) = ".number_format((float)$lengthNumber / 1760, 2, '.', '')." Mile(s)";
										break;
										
										case "kilometre":
										$lengthAnswer = $lengthNumber." Yard(s) = ".number_format((float)$lengthNumber / 1094, 2, '.', '')." Kilometre(s)";
										break;
										
										case "yard":
										$lengthAnswer = $lengthNumber." Yard(s) = ".$lengthNumber." Yard(s)";
										break;
										
										case "allLengths":
										$lengthAnswer = $lengthNumber." Yard(s) = ".number_format((float)$lengthNumber / 1.094, 2, '.', '')." Metre(s)". "<br><br>".
										$lengthNumber." Yard(s) = ".$lengthNumber * 91.44 ." Centimetre(s)". "<br><br>".
										$lengthNumber." Yard(s) = ".$lengthNumber * 36 ." Inch(es)". "<br><br>".
										$lengthNumber." Yard(s) = ".$lengthNumber * 3 ." Foot/Feet". "<br><br>".
										$lengthNumber." Yard(s) = ".number_format((float)$lengthNumber / 1760, 2, '.', '')." Mile(s)". "<br><br>".
										$lengthNumber." Yard(s) = ".number_format((float)$lengthNumber / 1094, 2, '.', '')." Kilometre(s)". "<br><br>".
										$lengthNumber." Yard(s) = ".$lengthNumber." Yard(s)";
										break;
									}
								break;
							}
							echo $lengthAnswer;
						}
					}
					if ($_GET["lengthSubmit"])
					{
						lengthConvert();
					}
					?>
					<br><br>
				</div>
				
				<!-- Currency conversions -->
				<div id="currency2">
					<br><h1>Currency conversions</h1><br>
					(Currency conversion rates are correct on 26th of December 2021, rates may be different in future)<br><br><br>
					Convert from: <br>
					<label for="firstCurrency">Input the initial measurement and choose the currency unit:</label>
					<input type="number" name="currencyNumber">
						<select name="firstCurrency" id="firstCurrency">
							<option value="gbp">Pound sterling (GBP)</option>
							<option value="eur">Euro (Eur)</option>
							<option value="usd">United States Dollar (USD)</option>
							<option value="yen">Japanese Yen</option>
						</select><br><br>
					Convert to: <br>
					<label for="secondCurrency">Choose the required conversion currency unit:</label>
						<select name="secondCurrency" id="secondCurrency">
							<option value="gbp">Pound sterling (GBP)</option>
							<option value="eur">Euro (Eur)</option>
							<option value="usd">United States Dollar (USD)</option>
							<option value="yen">Japanese Yen</option>
							<option value="allCurrency">All currency</option>
						</select><br><br>
					<input type="submit" value="Convert now" name="currencySubmit"><br><br>
					<?php  
					function currencyConvert()
					{
						if (empty($_GET["currencyNumber"])) 
						{
						  $currencyAnswer = "Please input a number to convert.";
						  echo $currencyAnswer;
						}
						
						if (!empty($_GET["currencyNumber"])) 
						{ 
							$currencyNumber = $_GET["currencyNumber"];
							$firstCurrency = $_GET["firstCurrency"];
							$secondCurrency = $_GET["secondCurrency"];
							
							switch ($firstCurrency)
							{
								case "gbp":
									switch ($secondCurrency)
									{
										case "gbp":
										$currencyAnswer = $currencyNumber." Pound sterling = ".$currencyNumber." Pound sterling";
										break;
										
										case "eur":
										$currencyAnswer = $currencyNumber." Pound sterling = ".number_format((float)$currencyNumber * 1.19, 2, '.', '') ." Euro";
										break;
										
										case "usd":
										$currencyAnswer = $currencyNumber." Pound sterling = ".number_format((float)$currencyNumber * 1.34, 2, '.', '') ." United States Dollar";
										break;
										
										case "yen":
										$currencyAnswer = $currencyNumber." Pound sterling = ".number_format((float)$currencyNumber * 154.42, 2, '.', '') ." Japanese Yen";
										break;
	
										case "allCurrency":
										$currencyAnswer = $currencyNumber." Pound sterling = ".$currencyNumber." Pound sterling". "<br><br>".
										$currencyNumber." Pound sterling = ".number_format((float)$currencyNumber * 1.19, 2, '.', '') ." Euro". "<br><br>".
										$currencyNumber." Pound sterling = ".number_format((float)$currencyNumber * 1.34, 2, '.', '') ." United States Dollar"."<br><br>".
										$currencyNumber." Pound sterling = ".number_format((float)$currencyNumber * 154.42, 2, '.', '') ." Japanese Yen";
										break;
									}
								break;
								
								case "eur":
									switch ($secondCurrency)
									{
										case "gbp":
										$currencyAnswer = $currencyNumber." Euro = ".number_format((float)$currencyNumber * 0.84, 2, '.', '') ." Pound sterling";
										break;
										
										case "eur":
										$currencyAnswer = $currencyNumber." Euro = ".$currencyNumber." Euro";
										break;
										
										case "usd":
										$currencyAnswer = $currencyNumber." Euro = ".number_format((float)$currencyNumber * 1.13, 2, '.', '') ." United States Dollar";
										break;
										
										case "yen":
										$currencyAnswer = $currencyNumber." Euro = ".number_format((float)$currencyNumber * 129.80, 2, '.', '') ." Japanese Yen";
										break;
	
										case "allCurrency":
										$currencyAnswer = $currencyNumber." Euro = ".number_format((float)$currencyNumber * 0.84, 2, '.', '') ." Pound sterling". "<br><br>".
										$currencyNumber." Euro = ".$currencyNumber." Euro". "<br><br>".
										$currencyNumber." Euro = ".number_format((float)$currencyNumber * 1.13, 2, '.', '') ." United States Dollar"."<br><br>".
										$currencyNumber." Euro = ".number_format((float)$currencyNumber * 129.80, 2, '.', '') ." Japanese Yen";
										break;
									}
								break;
								
								case "usd":
									switch ($secondCurrency)
									{
										case "gbp":
										$currencyAnswer = $currencyNumber." United States Dollar = ".number_format((float)$currencyNumber * 0.74, 2, '.', '')." Pound sterling";
										break;
										
										case "eur":
										$currencyAnswer = $currencyNumber." United States Dollar = ".number_format((float)$currencyNumber * 0.89, 2, '.', '')." Euro";
										break;
										
										case "usd":
										$currencyAnswer = $currencyNumber." United States Dollar = ".$currencyNumber." United States Dollar";
										break;
										
										case "yen":
										$currencyAnswer = $currencyNumber." United States Dollar = ".number_format((float)$currencyNumber * 114.84, 2, '.', '')." Japanese Yen";
										break;
	
										case "allCurrency":
										$currencyAnswer = $currencyNumber." United States Dollar = ".number_format((float)$currencyNumber * 0.74, 2, '.', '')." Pound sterling". "<br><br>".
										$currencyNumber." United States Dollar = ".number_format((float)$currencyNumber * 0.89, 2, '.', '')." Euro". "<br><br>".
										$currencyNumber." United States Dollar = ".$currencyNumber." United States Dollar"."<br><br>".
										$currencyNumber." United States Dollar = ".number_format((float)$currencyNumber * 114.84, 2, '.', '')." Japanese Yen";
										break;
									}
								break;
								
								case "yen":
									switch ($secondCurrency)
									{
										case "gbp":
										$currencyAnswer = $currencyNumber." Japanese Yen = ".$currencyNumber * 0.0065 ." Pound sterling";
										break;
										
										case "eur":
										$currencyAnswer = $currencyNumber." Japanese Yen = ".$currencyNumber * 0.0077 ." Euro";
										break;
										
										case "usd":
										$currencyAnswer = $currencyNumber." Japanese Yen = ".$currencyNumber * 0.0087 ." United States Dollar";
										break;
										
										case "yen":
										$currencyAnswer = $currencyNumber." Japanese Yen = ".$currencyNumber." Japanese Yen";
										break;
	
										case "allCurrency":
										$currencyAnswer = $currencyNumber." Japanese Yen = ".$currencyNumber * 0.0065 ." Pound sterling". "<br><br>".
										$currencyNumber." Japanese Yen = ".$currencyNumber * 0.0077 ." Euro". "<br><br>".
										$currencyNumber." Japanese Yen = ".$currencyNumber * 0.0087 ." United States Dollar"."<br><br>".
										$currencyNumber." Japanese Yen = ".$currencyNumber." Japanese Yen";
										break;
									}
								break;
							}
							echo $currencyAnswer;
						}
					}
					if ($_GET["currencySubmit"])
					{
						currencyConvert();
					}
					?>
					<br><br>
				</div>
				
				<!-- Weight conversions -->
				<div id="weight2">
					<br><h1>Weight conversions</h1><br>
					Convert from: <br>
					<label for="firstWeight">Input the initial measurement and choose the weight unit:</label>
					<input type="number" name="weightNumber">
						<select name="firstWeight" id="firstWeight">
							<option value="gram">Grams</option>
							<option value="kiloG">Kilograms</option>
							<option value="metTon">Metric tons</option>
							<option value="pound">Pounds</option>
							<option value="stone">Stone</option>
							<option value="impTon">Imperial tons</option>
						</select><br><br>
					Convert to: <br>
					<label for="secondWeight">Choose the required conversion weight unit:</label>
						<select name="secondWeight" id="secondWeight">
							<option value="gram">Grams</option>
							<option value="kiloG">Kilograms</option>
							<option value="metTon">Metric tons</option>
							<option value="pound">Pounds</option>
							<option value="stone">Stone</option>
							<option value="impTon">Imperial tons</option>
							<option value="allWeights">All weights</option>
						</select><br><br>
					<input type="submit" value="Convert now" name="weightSubmit"><br><br>
					<?php  
					function weightConvert()
					{
						if (empty($_GET["weightNumber"])) 
						{
						  $weightAnswer = "Please input a number to convert.";
						  echo $weightAnswer;
						}
						
						if (!empty($_GET["weightNumber"])) 
						{ 
							$weightNumber = $_GET["weightNumber"];
							$firstWeight = $_GET["firstWeight"];
							$secondWeight = $_GET["secondWeight"];
							
							switch ($firstWeight)
							{
								case "gram":
									switch ($secondWeight)
									{
										case "gram":
										$weightAnswer = $weightNumber." Grams = ".$weightNumber." Grams";
										break;
										
										case "kiloG":
										$weightAnswer = $weightNumber." Grams = ".$weightNumber / 1000 ." Kilograms";
										break;
										
										case "metTon":
										$weightAnswer = $weightNumber." Grams = ".number_format((float)$weightNumber / 1000000, 2, '.', '') ." Metric tons";
										break;
										
										case "pound":
										$weightAnswer = $weightNumber." Grams = ".number_format((float)$weightNumber / 454, 2, '.', '') ." Pounds";
										break;
										
										case "stone":
										$weightAnswer = $weightNumber." Grams = ".number_format((float)$weightNumber / 6350, 2, '.', '') ." Stone";
										break;
										
										case "impTon":
										$weightAnswer = $weightNumber." Grams = ".number_format((float)$weightNumber / 907185, 2, '.', '') ." Imperial tons";
										break;
										
										case "allWeights":
										$weightAnswer = $weightNumber." Grams = ".$weightNumber." Grams". "<br><br>".
										$weightNumber." Grams = ".$weightNumber / 1000 ." Kilograms". "<br><br>".
										$weightNumber." Grams = ".number_format((float)$weightNumber / 1000000, 2, '.', '') ." Metric tons"."<br><br>".
										$weightNumber." Grams = ".number_format((float)$weightNumber / 454, 2, '.', '') ." Pounds". "<br><br>".
										$weightNumber." Grams = ".number_format((float)$weightNumber / 6350, 2, '.', '') ." Stone". "<br><br>".
										$weightNumber." Grams = ".number_format((float)$weightNumber / 907185, 2, '.', '') ." Imperial tons";
										break;
									}
								break;
								
								case "kiloG":
									switch ($secondWeight)
									{
										case "gram":
										$weightAnswer = $weightNumber." Kilograms = ".$weightNumber * 1000 ." Grams";
										break;
										
										case "kiloG":
										$weightAnswer = $weightNumber." Kilograms = ".$weightNumber." Kilograms";
										break;
										
										case "metTon":
										$weightAnswer = $weightNumber." Kilograms = ".$weightNumber / 1000 ." Metric tons";
										break;
										
										case "pound":
										$weightAnswer = $weightNumber." Kilograms = ".number_format((float)$weightNumber * 2.205, 2, '.', '') ." Pounds";
										break;
										
										case "stone":
										$weightAnswer = $weightNumber." Kilograms = ".number_format((float)$weightNumber / 6.35, 2, '.', '') ." Stone";
										break;
										
										case "impTon":
										$weightAnswer = $weightNumber." Kilograms = ".number_format((float)$weightNumber / 1016, 2, '.', '') ." Imperial tons";
										break;
										
										case "allWeights":
										$weightAnswer = $weightNumber." Kilograms = ".$weightNumber * 1000 ." Grams". "<br><br>".
										$weightNumber." Kilograms = ".$weightNumber." Kilograms". "<br><br>".
										$weightNumber." Kilograms = ".$weightNumber / 1000 ." Metric tons"."<br><br>".
										$weightNumber." Kilograms = ".number_format((float)$weightNumber * 2.205, 2, '.', '') ." Pounds". "<br><br>".
										$weightNumber." Kilograms = ".number_format((float)$weightNumber / 6.35, 2, '.', '') ." Stone". "<br><br>".
										$weightNumber." Kilograms = ".number_format((float)$weightNumber / 1016, 2, '.', '') ." Imperial tons";
										break;
									}
								break;
								
								case "metTon":
									switch ($secondWeight)
									{
										case "gram":
										$weightAnswer = $weightNumber." Metric tons = ".$weightNumber * 1000000 ." Grams";
										break;
										
										case "kiloG":
										$weightAnswer = $weightNumber." Metric tons = ".$weightNumber * 1000 ." Kilograms";
										break;
										
										case "metTon":
										$weightAnswer = $weightNumber." Metric tons = ".$weightNumber." Metric tons";
										break;
										
										case "pound":
										$weightAnswer = $weightNumber." Metric tons = ".number_format((float)$weightNumber * 2204.62, 2, '.', '') ." Pounds";
										break;
										
										case "stone":
										$weightAnswer = $weightNumber." Metric tons = ".number_format((float)$weightNumber * 157.473, 2, '.', '') ." Stone";
										break;
										
										case "impTon":
										$weightAnswer = $weightNumber." Metric tons = ".number_format((float)$weightNumber / 1.016, 2, '.', '') ." Imperial tons";
										break;
										
										case "allWeights":
										$weightAnswer = $weightNumber." Metric tons = ".$weightNumber * 1000000 ." Grams". "<br><br>".
										$weightNumber." Metric tons = ".$weightNumber * 1000 ." Kilograms". "<br><br>".
										$weightNumber." Metric tons = ".$weightNumber." Metric tons"."<br><br>".
										$weightNumber." Metric tons = ".number_format((float)$weightNumber * 2204.62, 2, '.', '') ." Pounds". "<br><br>".
										$weightNumber." Metric tons = ".number_format((float)$weightNumber * 157.473, 2, '.', '') ." Stone". "<br><br>".
										$weightNumber." Metric tons = ".number_format((float)$weightNumber / 1.016, 2, '.', '') ." Imperial tons";
										break;
									}
								break;
								
								case "pound":
									switch ($secondWeight)
									{
										case "gram":
										$weightAnswer = $weightNumber." Pounds = ".number_format((float)$weightNumber * 453.592, 2, '.', '') ." Grams";
										break;
										
										case "kiloG":
										$weightAnswer = $weightNumber." Pounds = ".number_format((float)$weightNumber / 2.20462, 2, '.', '') ." Kilograms";
										break;
										
										case "metTon":
										$weightAnswer = $weightNumber." Pounds = ".number_format((float)$weightNumber / 2204.62, 2, '.', '') ." Metric tons";
										break;
										
										case "pound":
										$weightAnswer = $weightNumber." Pounds = ".$weightNumber." Pounds";
										break;
										
										case "stone":
										$weightAnswer = $weightNumber." Pounds = ".number_format((float)$weightNumber / 14, 2, '.', '') ." Stone";
										break;
										
										case "impTon":
										$weightAnswer = $weightNumber." Pounds = ".number_format((float)$weightNumber / 2240, 2, '.', '') ." Imperial tons";
										break;
										
										case "allWeights":
										$weightAnswer = $weightNumber." Pounds = ".number_format((float)$weightNumber * 453.592, 2, '.', '') ." Grams". "<br><br>".
										$weightNumber." Pounds = ".number_format((float)$weightNumber / 2.20462, 2, '.', '') ." Kilograms". "<br><br>".
										$weightNumber." Pounds = ".number_format((float)$weightNumber / 2204.62, 2, '.', '') ." Metric tons"."<br><br>".
										$weightNumber." Pounds = ".$weightNumber." Pounds". "<br><br>".
										$weightNumber." Pounds = ".number_format((float)$weightNumber / 14, 2, '.', '') ." Stone". "<br><br>".
										$weightNumber." Pounds = ".number_format((float)$weightNumber / 2240, 2, '.', '') ." Imperial tons";
										break;
									}
								break;
								
								case "stone":
									switch ($secondWeight)
									{
										case "gram":
										$weightAnswer = $weightNumber." Stone = ".number_format((float)$weightNumber * 6350.29, 2, '.', '') ." Grams";
										break;
										
										case "kiloG":
										$weightAnswer = $weightNumber." Stone = ".number_format((float)$weightNumber * 6.35029, 2, '.', '') ." Kilograms";
										break;
										
										case "metTon":
										$weightAnswer = $weightNumber." Stone = ".number_format((float)$weightNumber / 157, 2, '.', '') ." Metric tons";
										break;
										
										case "pound":
										$weightAnswer = $weightNumber." Stone = ".number_format((float)$weightNumber * 14, 2, '.', '') ." Pounds";
										break;
										
										case "stone":
										$weightAnswer = $weightNumber." Stone = ".$weightNumber." Stone";
										break;
										
										case "impTon":
										$weightAnswer = $weightNumber." Stone = ".number_format((float)$weightNumber / 160, 2, '.', '') ." Imperial tons";
										break;
										
										case "allWeights":
										$weightAnswer = $weightNumber." Stone = ".number_format((float)$weightNumber * 6350.29, 2, '.', '') ." Grams". "<br><br>".
										$weightNumber." Stone = ".$weightNumber * 6.35029 ." Kilograms". "<br><br>".
										$weightNumber." Stone = ".number_format((float)$weightNumber / 157, 2, '.', '') ." Metric tons"."<br><br>".
										$weightNumber." Stone = ".number_format((float)$weightNumber * 14, 2, '.', '') ." Pounds". "<br><br>".
										$weightNumber." Stone = ".$weightNumber." Stone". "<br><br>".
										$weightNumber." Stone = ".number_format((float)$weightNumber / 160, 2, '.', '') ." Imperial tons";
										break;
									}
								break;
								
								case "impTon":
									switch ($secondWeight)
									{
										case "gram":
										$weightAnswer = $weightNumber." Imperial tons = ".number_format((float)$weightNumber * 1016046, 2, '.', '')." Grams";
										break;
										
										case "kiloG":
										$weightAnswer = $weightNumber." Imperial tons = ".number_format((float)$weightNumber * 1016.05, 2, '.', '')  ." Kilograms";
										break;
										
										case "metTon":
										$weightAnswer = $weightNumber." Imperial tons = ".number_format((float)$weightNumber * 1.01605, 2, '.', '') ." Metric tons";
										break;
										
										case "pound":
										$weightAnswer = $weightNumber." Imperial tons = ".number_format((float)$weightNumber * 2240, 2, '.', '') ." Pounds";
										break;
										
										case "stone":
										$weightAnswer = $weightNumber." Imperial tons = ".number_format((float)$weightNumber * 160, 2, '.', '') ." Stone";
										break;
										
										case "impTon":
										$weightAnswer = $weightNumber." Imperial tons = ".$weightNumber." Imperial tons";
										break;
										
										case "allWeights":
										$weightAnswer = $weightNumber." Imperial tons = ".number_format((float)$weightNumber * 1016046, 2, '.', '')." Grams". "<br><br>".
										$weightNumber." Imperial tons = ".number_format((float)$weightNumber * 1016.05, 2, '.', '')  ." Kilograms". "<br><br>".
										$weightNumber." Imperial tons = ".number_format((float)$weightNumber * 1.01605, 2, '.', '') ." Metric tons"."<br><br>".
										$weightNumber." Imperial tons = ".number_format((float)$weightNumber * 2240, 2, '.', '') ." Pounds". "<br><br>".
										$weightNumber." Imperial tons = ".number_format((float)$weightNumber * 160, 2, '.', '') ." Stone". "<br><br>".
										$weightNumber." Imperial tons = ".$weightNumber." Imperial tons";
										break;
									}
								break;
							}
							echo $weightAnswer;
						}
					}
					if ($_GET["weightSubmit"])
					{
						weightConvert();
					}
					?>
					<br><br>
				</div>
				
				<!-- Temperature conversions -->
				<div id="temperature2">
					<br><h1>Temperature conversions</h1><br>
					Convert from: <br>
					<label for="firstTemp">Input the initial measurement and choose the temperature unit:</label>
					<input type="number" name="tempNumber">
						<select name="firstTemp" id="firstTemp">
							<option value="cel">Celsius (°C)</option>
							<option value="fahren">Fahrenheit (°F)</option>
							<option value="kelv">Kelvin (K)</option>
						</select><br><br>
					Convert to: <br>
					<label for="secondTemp">Choose the required conversion temperature unit:</label>
						<select name="secondTemp" id="secondTemp">
							<option value="cel">Celsius (°C)</option>
							<option value="fahren">Fahrenheit (°F)</option>
							<option value="kelv">Kelvin (K)</option>
							<option value="allTemps">All temperatures</option>
						</select><br><br>
					<input type="submit" value="Convert now" name="tempSubmit"><br><br>
					<?php  
					function tempConvert()
					{
						if (empty($_GET["tempNumber"])) 
						{
						  $tempAnswer = "Please input a number to convert.";
						  echo $tempAnswer;
						}
						
						if (!empty($_GET["tempNumber"])) 
						{ 
							$tempNumber = $_GET["tempNumber"];
							$firstTemp = $_GET["firstTemp"];
							$secondTemp = $_GET["secondTemp"];
							
							switch ($firstTemp)
							{
								case "cel":
									switch ($secondTemp)
									{
										case "cel":
										$tempAnswer = $tempNumber." Celsius (°C) = ".$tempNumber." Celsius (°C)";
										break;
										
										case "fahren":
										$tempAnswer = $tempNumber." Celsius (°C) = ".number_format((float)($tempNumber * 1.8) + 32, 2, '.', '') ." Fahrenheit (°F)";
										break;
										
										case "kelv":
										$tempAnswer = $tempNumber." Celsius (°C) = ".number_format((float)$tempNumber + 273.15, 2, '.', '') ." Kelvin (K)";
										break;
										
										case "allTemps":
										$tempAnswer = $tempNumber." Celsius (°C) = ".$tempNumber." Celsius (°C)". "<br><br>".
										$tempNumber." Celsius (°C) = ".number_format((float)($tempNumber * 1.8) + 32, 2, '.', '') ." Fahrenheit (°F)". "<br><br>".
										$tempNumber." Celsius (°C) = ".number_format((float)$tempNumber + 273.15, 2, '.', '') ." Kelvin (K)";
										break;
									}
								break;
								
								case "fahren":
									switch ($secondTemp)
									{
										case "cel":
										$tempAnswer = $tempNumber." Fahrenheit (°F) = ".number_format((float)($tempNumber - 32) / 1.8, 2, '.', '') ." Celsius (°C)";
										break;
										
										case "fahren":
										$tempAnswer = $tempNumber." Fahrenheit (°F) = ".$tempNumber." Fahrenheit (°F)";
										break;
										
										case "kelv":
										$tempAnswer = $tempNumber." Fahrenheit (°F) = ".number_format((float)((($tempNumber - 32) * 5) / 9) + 273.15, 2, '.', '') ." Kelvin (K)";
										break;
										
										case "allTemps":
										$tempAnswer = $tempNumber." Fahrenheit (°F) = ".number_format((float)($tempNumber - 32) / 1.8, 2, '.', '') ." Celsius (°C)". "<br><br>".
										$tempNumber." Fahrenheit (°F) = ".$tempNumber." Fahrenheit (°F)". "<br><br>".
										$tempNumber." Fahrenheit (°F) = ".number_format((float)((($tempNumber - 32) * 5) / 9) + 273.15, 2, '.', '') ." Kelvin (K)";
										break;
									}
								break;
								
								case "kelv":
									switch ($secondTemp)
									{
										case "cel":
										$tempAnswer = $tempNumber." Kelvin (K) = ".number_format((float)$tempNumber - 273.15, 2, '.', '') ." Celsius (°C)";
										break;
										
										case "fahren":
										$tempAnswer = $tempNumber." Kelvin (K) = ".number_format((float)((($tempNumber - 273.15) * 9) / 5) + 32, 2, '.', '') ." Fahrenheit (°F)";
										break;
										
										case "kelv":
										$tempAnswer = $tempNumber." Kelvin (K) = ".$tempNumber ." Kelvin (K)";
										break;
										
										case "allTemps":
										$tempAnswer = $tempNumber." Kelvin (K) = ".number_format((float)$tempNumber - 273.15, 2, '.', '') ." Celsius (°C)". "<br><br>".
										$tempNumber." Kelvin (K) = ".number_format((float)((($tempNumber - 273.15) * 9) / 5) + 32, 2, '.', '') ." Fahrenheit (°F)". "<br><br>".
										$tempNumber." Kelvin (K) = ".$tempNumber ." Kelvin (K)";
										break;
									}
								break;
							}
							echo $tempAnswer;
						}
					}
					if ($_GET["tempSubmit"])
					{
						tempConvert();
					}
					?>
					<br><br>
				</div>
				
				<!-- Pressure conversions -->
				<div id="pressure2">
					<br><h1>Pressure conversions</h1><br>
					Convert from: <br>
					<label for="firstPressure">Input the initial measurement and choose the pressure unit:</label>
					<input type="number" name="pressureNumber">
						<select name="firstPressure" id="firstPressure">
							<option value="bar">Bar</option>
							<option value="psi">Pound per Square Inch (PSI)</option>
							<option value="sap">Standard atmosphere</option>
							<option value="torr">Torr</option>
						</select><br><br>
					Convert to: <br>
					<label for="secondPressure">Choose the required conversion pressure unit:</label>
						<select name="secondPressure" id="secondPressure">
							<option value="bar">Bar</option>
							<option value="psi">Pound per Square Inch (PSI)</option>
							<option value="sap">Standard atmosphere</option>
							<option value="torr">Torr</option>
							<option value="allPressures">All pressures</option>
						</select><br><br>
					<input type="submit" value="Convert now" name="pressureSubmit"><br><br>
					<?php  
					function pressureConvert()
					{
						if (empty($_GET["pressureNumber"])) 
						{
						  $pressureAnswer = "Please input a number to convert.";
						  echo $pressureAnswer;
						}
						
						if (!empty($_GET["pressureNumber"])) 
						{ 
							$pressureNumber = $_GET["pressureNumber"];
							$firstPressure = $_GET["firstPressure"];
							$secondPressure = $_GET["secondPressure"];
							
							switch ($firstPressure)
							{
								case "bar":
									switch ($secondPressure)
									{
										case "bar":
										$pressureAnswer = $pressureNumber." Bar = ".$pressureNumber." Bar";
										break;
										
										case "psi":
										$pressureAnswer = $pressureNumber." Bar = ".number_format((float)$pressureNumber * 14.504, 2, '.', '') ." Pound per Square Inch";
										break;
										
										case "sap":
										$pressureAnswer = $pressureNumber." Bar = ".number_format((float)$pressureNumber / 1.013, 2, '.', '')." Standard atmosphere";
										break;
										
										case "torr":
										$pressureAnswer = $pressureNumber." Bar = ".number_format((float)$pressureNumber * 750, 2, '.', '')." Torr";
										break;
										
										case "allPressures":
										$pressureAnswer = $pressureNumber." Bar = ".$pressureNumber." Bar". "<br><br>".
										$pressureNumber." Bar = ".number_format((float)$pressureNumber * 14.504, 2, '.', '') ." Pound per Square Inch". "<br><br>".
										$pressureNumber." Bar = ".number_format((float)$pressureNumber / 1.013, 2, '.', '')." Standard atmosphere". "<br><br>".
										$pressureNumber." Bar = ".number_format((float)$pressureNumber * 750, 2, '.', '')." Torr";
										break;
									}
								break;
								
								case "psi":
									switch ($secondPressure)
									{
										case "bar":
										$pressureAnswer = $pressureNumber." Pound per Square Inch = ".number_format((float)$pressureNumber / 14.504, 2, '.', '') ." Bar";
										break;
										
										case "psi":
										$pressureAnswer = $pressureNumber." Pound per Square Inch = ".$pressureNumber." Pound per Square Inch";
										break;
										
										case "sap":
										$pressureAnswer = $pressureNumber." Pound per Square Inch = ".number_format((float)$pressureNumber / 14.696, 2, '.', '')." Standard atmosphere";
										break;
										
										case "torr":
										$pressureAnswer = $pressureNumber." Pound per Square Inch = ".number_format((float)$pressureNumber * 51.715, 2, '.', '')." Torr";
										break;
										
										case "allPressures":
										$pressureAnswer = $pressureNumber." Pound per Square Inch = ".number_format((float)$pressureNumber / 14.504, 2, '.', '') ." Bar". "<br><br>".
										$pressureNumber." Pound per Square Inch = ".$pressureNumber." Pound per Square Inch". "<br><br>".
										$pressureNumber." Pound per Square Inch = ".number_format((float)$pressureNumber / 14.696, 2, '.', '')." Standard atmosphere". "<br><br>".
										$pressureNumber." Pound per Square Inch = ".number_format((float)$pressureNumber * 51.715, 2, '.', '')." Torr";
										break;
									}
								break;
								
								case "sap":
									switch ($secondPressure)
									{
										case "bar":
										$pressureAnswer = $pressureNumber." Standard atmosphere = ".number_format((float)$pressureNumber * 1.013, 2, '.', '') ." Bar";
										break;
										
										case "psi":
										$pressureAnswer = $pressureNumber." Standard atmosphere = ".number_format((float)$pressureNumber * 14.696, 2, '.', '') ." Pound per Square Inch";
										break;
										
										case "sap":
										$pressureAnswer = $pressureNumber." Standard atmosphere = ".$pressureNumber." Standard atmosphere";
										break;
										
										case "torr":
										$pressureAnswer = $pressureNumber." Standard atmosphere = ".number_format((float)$pressureNumber * 760, 2, '.', '')." Torr";
										break;
										
										case "allPressures":
										$pressureAnswer = $pressureNumber." Standard atmosphere = ".number_format((float)$pressureNumber * 1.013, 2, '.', '') ." Bar". "<br><br>".
										$pressureNumber." Standard atmosphere = ".number_format((float)$pressureNumber * 14.696, 2, '.', '') ." Pound per Square Inch". "<br><br>".
										$pressureNumber." Standard atmosphere = ".$pressureNumber." Standard atmosphere". "<br><br>".
										$pressureNumber." Standard atmosphere = ".number_format((float)$pressureNumber * 760, 2, '.', '')." Torr";
										break;
									}
								break;
								
								case "torr":
									switch ($secondPressure)
									{
										case "bar":
										$pressureAnswer = $pressureNumber." Torr = ".number_format((float)$pressureNumber / 750, 2, '.', '') ." Bar";
										break;
										
										case "psi":
										$pressureAnswer = $pressureNumber." Torr = ".number_format((float)$pressureNumber / 51.715, 2, '.', '') ." Pound per Square Inch";
										break;
										
										case "sap":
										$pressureAnswer = $pressureNumber." Torr = ".number_format((float)$pressureNumber / 760, 2, '.', '')." Standard atmosphere";
										break;
										
										case "torr":
										$pressureAnswer = $pressureNumber." Torr = ".$pressureNumber." Torr";
										break;
										
										case "allPressures":
										$pressureAnswer = $pressureNumber." Torr = ".number_format((float)$pressureNumber / 750, 2, '.', '') ." Bar". "<br><br>".
										$pressureNumber." Torr = ".number_format((float)$pressureNumber / 51.715, 2, '.', '') ." Pound per Square Inch". "<br><br>".
										$pressureNumber." Torr = ".number_format((float)$pressureNumber / 760, 2, '.', '')." Standard atmosphere". "<br><br>".
										$pressureNumber." Torr = ".$pressureNumber." Torr";
										break;
									}
								break;
							}
							echo $pressureAnswer;
						}
					}
					if ($_GET["pressureSubmit"])
					{
						pressureConvert();
					}
					?>
					<br><br>
				</div>
				<br>
				<a id="button" href="conversionVer1.php">Go to Conversion Version One</a>
			</div>
		</form>
	</body>
</html>
