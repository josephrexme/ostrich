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
				<li><a href="admin.php">Dashboard</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
			</li>
		</ul></span>
	</div>
	<div id="wrap">
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></h1>
	</div>
	<!-- Menu Area -->
	<div id="menuWrap">
		<img src="images/ostrich.png" alt="ostrich" />
		<ul class="menuList">
			<li><a href="posts.php">Manage Posts</a></li>
			<li><a href="pages.php">Manage Pages</a></li>
			<li><a href="users.php">Manage User Account</a></li>
			<li><a href="admin.php">Return to dashboard</a></li>
			<li><a href="index.php">Return to your website</a></li>
		</ul>
	</div>
	<!-- Content Area -->
	<div id="contentWrap">
		<div>
			<h2>SELECT THEMES</h2><hr />
			<ul id="themeThumbs">
				<li><a href="#"><img src="themes/darkwood/screenshot.png"><br />Darkwood</a></li>
			</ul>
		</div>
	</div>
</body>
</html>