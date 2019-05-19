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
	<title>Justin Schnees Gas Budget Calculator</title>
</head>
<body>
<main>
<?php
		// post variable data
		$distance = $_POST['distance'];
		$avgMPG = $_POST['avgMPG'];
		$octaneValues = $_POST['octaneValues'];
		$weeklyGroceries = $_POST['weeklyGroceries'];
		if ((!empty($_POST['distance'])) && (is_numeric($_POST['distance'])) && (!empty($_POST['avgMPG'])) && (is_numeric($_POST['avgMPG'])) && (!empty($_POST['octaneValues'])) ):

		// declare variables and give them a value of 0
		$distance = $avgMPG = $octaneValues = 0;
		
		// miles until next fill up
		$milesFillUp = ($distance * $avgMPG);

		// travel distance calculations
		$distanceMonth = ($distance * 4);
		$distanceYear = ($distanceMonth * 12);

		// calculations for cost
		$weekCost = number_format((($distance / $avgMPG) * $octaneValues),2);
		$monthCost = number_format(($weekCost * 4),2); // Weekly cost times 4 weeks
		$yearCost = number_format(($monthCost * 12),2); // Weekly cost times 12 months

		// fuel discount variables and equations - easier to edit
		$weekCost = number_format((($distance / $avgMPG) * $octaneValues),2);

		// fuel discount variables and equations - easier to edit
		$distMPG = number_format(($distance / $avgMPG),2); // week cost - sans the octaneValues

		// array of discounts
		$fuelDiscounts = array_map(
			 function ($ratio) use ($octaneValues) {
					 return number_format(($octaneValues - $ratio), 2);
			 },
			 [0.0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0]
		);

		$fuelDiscountIndex = min((int)$weeklyGroceries / 100, 10);
		$fuelDiscount = $fuelDiscounts[$fuelDiscountIndex];

		// calculatins of the discount for week, month and year
		$discount = number_format(($distMPG * $fuelDiscount), 2);
		$monthDiscount = number_format(($discount * 4),2);
		$yearDiscount = number_format(($monthDiscount * 12),2);

			/// hides all divs to prevent errors spam
			else :
				$distance = $avgMPG = $octaneValues = 0;
				echo "Enter values for Distance, Average MPG and Fuel Cost";
				?>
				<style type="text/css">div, h2{
				display:none;
				}</style>
				<?php
			endif;
?>
				<h2>Your Total Estimated Cost</h2>

				<div title="Selected octaneValues">Selected octaneValues <span class="variableStyle"><i class="fas fa-dollar-sign"></i><?php echo "$octaneValues" ?></span>/gal</div>

				<div title="Vehicle's Average MPG">Vehicle's Average MPG <span class="variableStyle"><?php echo "$avgMPG" ?></span>/gal</div>

				<div title="Miles to next Fill Up">Miles to Next Fill Up <span class="variableStyle"><?php echo "$milesFillUp" ?></span></div>
				<div title="Average Commute in Miles">Average Commute</div>
					<div class="subtext"><span class="variableStyle"><?php echo "$distance" ?></span> miles per week</div>
					<div class="subtext"><span class="variableStyle"><?php echo "$distanceMonth" ?></span> miles per month</div>
					<div class="subtext"><span class="variableStyle"><?php echo "$distanceYear" ?></span> miles per year</div>

				<!-- weekly fuel cost  -->
				<div>Total Weekly Fuel Cost <span class="variableStyle"><i class="fas fa-dollar-sign"></i><?php echo"$weekCost" ?></span></div>
<?php
				if (!empty($weeklyGroceries) && ($weeklyGroceries > 100))
				{	/* hide fuel points discount for month if not entered*/
					echo "<div class=\"subtext\">With Discount <span class=\"variableStyle\"><i class=\"fas fa-dollar-sign\"></i>$discount</span></div> ";
				}
?>
				<!-- monthly fuel cost -->
				<div>Total Monthly Fuel Cost <span class="variableStyle"><i class="fas fa-dollar-sign"></i><?php echo "$monthCost" ?></span></div>
<?php
				if (!empty($weeklyGroceries) && ($weeklyGroceries > 100))
				{
					/* hide fuel points discount for month if not entered*/
					echo "<div class=\"subtext\">With Discount <span class=\"variableStyle\"><i class=\"fas fa-dollar-sign\"></i>$monthDiscount</span></div>";
				}
?>
				<!-- yearly fuel cost -->
				<div>Total Yearly Fuel Cost <span class="variableStyle"><i class="fas fa-dollar-sign"></i><?php echo "$yearCost" ?></span></div>
<?php
				if (!empty($weeklyGroceries) && ($weeklyGroceries > 100))
 				{
					/* hide fuel points discount for year if not entered*/
					echo "<div class=\"subtext\">With Discount <span class=\"variableStyle\"><i class=\"fas fa-dollar-sign\"></i>$yearDiscount</span></div>";
				}
?>

<form>
	<input type="button" value="Go back!" class="button" onclick="history.back()">
</form>
</main>
</body>
</html>
