<?php session_start(); ?>
<?php require_once('includes/functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
	redirect_to('index.php');
}
?>
<?php include('includes/header.php'); ?>
	<div id="topmost">
		<span class="trademark"><a href="http://ostrich-dev.com" target="_blank"><img src="images/logo.png" alt="ostrich logo"></a></span>
		<span class="greet"><?php echo get_profile_thumb(); ?> &nbsp;Hello, <?php echo ucwords($_SESSION['username']); ?>
			&nbsp;<ul id="coolMenu">
			<li>
			<a href="#"><img src="images/settings.png" alt="settings"></a>
			<ul class="noJS">
				<li><a href="settings.php">Settings</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
			</li>
		</ul></span>
	</div>
	<div id="wrap">
		<h1><a href="<?php echo get_url(); ?>"><?php echo get_title(); ?></a></h1>
	</div>
	<!-- Menu Area -->
	<div id="menuWrap">
		<img src="images/ostrich.png" alt="ostrich" />
		<ul class="menuList">
			<li><a href="posts.php">Manage Posts</a></li>
			<li><a href="pages.php">Manage Pages</a></li>
			<li><a href="users.php">Manage User Account</a></li>
			<li><a href="index.php">Return to your website</a></li>
		</ul>
	</div>
	<!-- Content Area -->
	<div id="contentWrap">
		<div>
		<h2>WELCOME TO OSTRICH CMS!</h2>
		<div class="welcome"> Wanna know about ostrich?</div>
		<p class="fr">Ostrich is a light-weight content management system that is fully featured.<br />
			It was developed by Joseph Rex from <a href="http://ostrich-dev.com">ostrich-dev</a> as a project
			to easily<br />
			manage website contents.</p>
		<img src="images/ostrich_anime.png" alt="Hello Ostrich" width="200" height="150" />
		<br />
		<p>This web application by <a href="http://ostrich-dev.com">ostrich-dev</a> was brought to existence in order to assist
		web developers with a web application they can give their clients in order to manage their contents themselves rather
		than having to call the web developer each time they may need to remove a 'comma'.</p><br />
		<p>Although there are so many content management system out there, I believe that this one will give you a feeling of
		uniqueness. If you don't understand what any of this means, you probably shouldn't be messing around with a web
		application like this.</p><br />
		<p>The navigations around here are quite easy! You can simple make use of the buttons on the left to add new
			users, posts, or pages.</p>
			<div id="dashboard">DASHBOARD</div>
		</div>
	</div>
</body>
</html>
