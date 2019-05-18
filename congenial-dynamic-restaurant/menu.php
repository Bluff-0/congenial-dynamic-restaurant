<?php
		define(TITLE, "Menu | Franklin's Fine Dining");
		include ('includes/header.php');
		

?>
<div id="menu-items" class="cf">
	<h1>Our Delicious Menu</h1>
	<p>Like our team, our menu is very small &mdash;, does it ever pack a punch!</p>
	<p><em>Click any menu item to learn more bout it...</em></p>

	<hr>

	<ul>
		<?php foreach ($menuItems as $dish => $item) { ?>
		<li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item[title]; ?></a>  <sup>$</sup><?php echo $item[price]; ?></li>
		<?php }  ?>
	</ul>
	
</div>

<?php

	include ('includes/footer.php');

?>