<?php session_start(); ?>
<?php require_once('includes/dbconnection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php include('themes/darkwood/header.php'); ?>
<div id="usercontent">
	<div id="menu">
		<ul class="menulist">
			<li><a href="<?php get_url(); ?>"><img src="images/home_icon.png" alt="Home"></a></li>
			<?php
				$navquery = "SELECT * FROM pages";
				$navresult = $conn->prepare($navquery);
				$navresult->execute();
				foreach ($navresult as $navigations) {
					echo "<li><a href=\"page.php?page=".urlencode($navigations['id'])."\">{$navigations['title']}</a></li>";
				}
			?>
		</ul>
	</div>
	<div id="PageContents">
		<?php
			if (isset($_GET['page']) && $_GET['page'] == get_pages('id')) {
				echo "<h1>".get_pages('title')."</h1>".edit_page()."<br /><article>".get_pages('content')."</article>";
			}
		?>
	</div>
</div>
<?php require('themes/darkwood/widgets.php'); ?>
<div id="footer">All rights reserved &copy; 2013 | Developed by <a href="http://ostrich-dev.com" target="_blank">ostrich-dev</a></div>
</body>
</html>
<?php $conn = null; ?>