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
			if (isset($_GET['post']) && $_GET['post'] == get_posts('id')) {
				echo "<h1>".get_posts('title')."</h1>".edit_post()."<br /><article>".get_posts('content')."</article>";
			}
		?>
	</div>
</div>
<?php require('themes/darkwood/widgets.php'); ?>
<div id="footer">All rights reserved &copy; 2013 | Developed by <a href="http://ostrich-dev.com" target="_blank">ostrich-dev</a></div>
</body>
</html>
<?php $conn = null; ?>