<?php
		define(TITLE, "Menu Item | Franklin's Fine Dining");
		include ('includes/header.php');
		

		function strip_bad_chars($input)
		{
			# code...
			$output= preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
			return($output);
		}


		if (isset($_GET['item'])) {
			# code...
			// To be safe from PHP attack !!!! WOwwwwww ......
			$menuItem= strip_bad_chars($_GET['item']);
			$dish= $menuItems[$menuItem];
		}


		// Suggested Tip
		function suggestedTip($price, $tip)
		{
			# code...
			echo $price * $tip ;
			// echo money_format("%0.2n", 200);
		}

?>

<hr>
<div id="dish">
	<h1><?php echo $dish[title]; ?>  <span class="price"><sup>$</sup><?php echo $dish[price]; ?></span></h1>
	<p><?php echo $dish[blurb]; ?></p>

	<br>

	<p><strong>Suggested Beverage: <?php echo $dish[drink]; ?></strong></p>
	<p><em>Suggested Tip: <sup>$</sup><?php suggestedTip($dish[price], 0.2); ?></em></p>
</div>
<hr>
<a href="menu.php" class="button previous">&laquo; Back to Menu</a>



<?php

	include ('includes/footer.php');

?>