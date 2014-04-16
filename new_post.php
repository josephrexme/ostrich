<?php session_start(); ?>
<?php require_once('includes/dbconnection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
	redirect_to('index.php');
}
?>
<?php
	if (isset($_POST['post_submit'])) {
		try {
			$title = $_POST['title'];
			$content = $_POST['content'];
			if (!empty($title) && !empty($content)) {
				$query = "INSERT INTO posts (title, content) VALUES (:title, :content)";
				$update_posts = $conn->prepare($query);
				$update_posts->execute(array(':title' => $title, ':content' => $content));
				$message = "<p class=\"notify\">New post has been successfully created!</p>";
			} else {
				$message = "<p class=\"notify\">Failed to add new post</p>";
			}
			
		} catch (PDOException $e) {
			echo "Query errors: ".$e->getMessage();
		}
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
			<h1>New Post</h1>
			<hr /><br />
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" placeholder="Enter title here" name="title" class="ostitles" /><br /><br />
				<textarea name="content" class="ostext" cols="80" rows="20"></textarea><br />
				<input type="submit" class="osbutton" value="Publish" name="post_submit" />&nbsp;
				<?php
					if (isset($message)) {
						echo $message;
					}
				?>
			</form>
		</div>
	</div>
</body>
</html>