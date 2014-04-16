<?php session_start(); ?>
<?php require_once('includes/dbconnection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
	redirect_to('index.php');
}
?>
<?php
	//Pagination Class for blog post pagination
	require('includes/paginator.php');
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
			<li><a href="admin.php">Return to Dashboard</a></li>
			<li><a href="index.php">Return to your website</a></li>
		</ul>
	</div>
	<!-- Content Area -->
	<div id="contentWrap">
		<div>
			<h1 class="fl">Pages</h1>
			<a href="new_page.php"><button class="osbutton fr">New page +</button></a>
			<br /><br /><hr /><br />
			<ul id="platform">
<?php
	//create a new object for pagination
	$paginate = new Paginator('7','p');
	$total = get_total('pages');
	$paginate->set_total($total);
	$page_set = $conn->prepare("SELECT * FROM pages ORDER BY id DESC ".$paginate->get_limit());
	$page_set->execute();
	foreach ($page_set as $page) {
		echo "<li><a href=\"edit_page.php?page=" .urlencode($page['id'])."\">" .
		ucwords($page['title']). "</a></li>";
	}
?>
			</ul>
<?php echo $paginate->page_links(); ?>
		</div>
	</div>
</body>
</html>