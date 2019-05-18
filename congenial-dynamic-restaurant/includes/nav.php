<ul>
	<?php
			include('includes/arrays.php');
			foreach ($navItems as $items) {
				# code...
				echo "<li><a href=\"$items[slug]\">$items[title]</a></li>";
			}
	?>
</ul>