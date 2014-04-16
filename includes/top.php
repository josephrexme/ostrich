<?php
echo "<div id=\"topmost\">
		<span class=\"trademark\"><a href=\"http://ostrich-dev.com\" target=\"_blank\"><img src=\"images/logo.png\" alt=\"ostrich logo\"></a></span>
		<span class=\"greet\"> &nbsp;Hello, ". ucwords($_SESSION['username'])."
			&nbsp;<ul id=\"coolMenu\">
			<li>
			<a href=\"#\"><img src=\"images/settings.png\" alt=\"settings\"></a>
			<ul class=\"noJS\">
				<li><a href=\"admin.php\">Dashboard</a></li>
				<li><a href=\"settings.php\">Settings</a></li>
				<li><a href=\"logout.php\">Log out</a></li>
			</ul>
			</li>
		</ul></span>
	</div>";