<!--
Acceptance Criteria
-1) three types of gas and price: 87 octane - 1.79/gal, 89 octane - 1.89/gal, 92 octane - 2.09/gal
-2) average commute mileage - total number of miles I commute to and from work in a week
-3) car's average mpg
-4) whether or not the user gets fuel 10 cent/gal discount for every $100 spent in groceries;
if so, what is average the user spends per week in groceries.
This should be enough variables for you to create an HTML form for a user to enter these values
and do a calculation. What you should end up with is a final dollar amount that the user should
budget per week on gas for his/her car. It is up to you to develop your form to handle the information
required, and do validation on the server side so the user cannot enter incorrect information and get an
error message. Email me if there are any questions about the requirements of this assignment.

*** Notes
Added some extra features to help with accuracy
-->

<!--Crafted by Justin Schnees jschnees.com-->
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta tags -->
	<meta charset="UTF-8">
	<meta name="description" content="Justin Schnees Gas Budget Calculator">
	<meta name="author" content="Justin Schnees">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- links to assets -->
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Justin Schnees Gas Budget Calculator</title>
</head>
<body>
<main>

<!-- create a form -->
<h2 title="Gas Budget Calculator">Gas Budget Calculator</h2>
<form id="myform" action="calculations.php" method="post">

<!-- Average commute label -->
  <div title="Average Weekly Commute in Miles">Average Weekly Commute</div>

<!-- input distance -->
	<div><input type="text" name="distance" placeholder="Enter the distance in miles" value="<?= $_POST['distance'] ?? '' ?>" required></input></div>

<!-- Vehicle MPG label -->
	<div title="Vehicle's Average MPG">Vehicle's Average MPG <br />
	<div class="subtext"><a href="https://www.fueleconomy.gov/feg/findacar.shtml" target="_blank" title="Find your vehicles MPG">Find your vehicles MPG</a></div>
	</div>

<!-- input MPG -->
	<div><input type="text" name="avgMPG" placeholder="Enter your vehicles average MPG"  value="<?= $_POST['avgMPG'] ?? '' ?>" required></input></div>

	<!--  fuel grade label -->
	<div title="Fuel Grade" class="tooltip">Fuel Cost</div>

<!-- select fuel grade -->
	<select name="octaneValues">
			<?php
				// octane prices for each grade
				$octaneValues = ['1.79', '1.89', '2.09'];
				// printing each value in the array

					$octaneLabel = ['87 octane - $1.79/gal', '89 octane - $1.89/gal', '92 octane - $2.09/gal'];

				foreach($octaneValues as $item){
			?>
				<option value="<?php echo ($item); ?>"><?php echo ($item); ?></option>
		<?php
		}
		?>
	</select>
	</div>
<!--  Grocery Bill label -->
	<div title="Enter Weekly Grocery Budget">Weekly Grocery Budget</div>

<!--  input Grocery Budget -->
	<div><input type="text" name="weeklyGroceries" placeholder="Enter your weekly grocery budget"></input></div>
<!-- submit button - loads handle_form -->
<div>
	<ul>
		<li><input type="submit" name="submit" value="calculate" class="button" /></li>
		<li><input type="reset" name="reset" value="reset" class="button" /></li>
	</ul>
</div>

</form>

</main>
</body>
</html>
