<?php session_start(); ?>
<?php require_once('includes/dbconnection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
	redirect_to('index.php');
}
?>
<?php
	if (isset($_GET['page']) && $_GET['page'] == get_pages('id')) {
		$title = get_pages('title');
		$content = get_pages('content');
		try {
			if (isset($_POST['page_submit'])) {
				$title = $_POST['title'];
				$content = $_POST['content'];
				$bind = array(':title' => $title, ':content' => $content, ':id' => get_pages('id'));
				$query = "UPDATE pages SET title = :title, content = :content WHERE id = :id";
				$update = $conn->prepare($query);
				$update->execute($bind);
				if (!$update) {
					$notification = "<p class=\"notify\">Failed to update page</p>";
				}else{
					$notification = "<p class=\"notify\">Page has been updated successfully!</p>";
				}
			}elseif (isset($_POST['delete'])) {
				$query = "DELETE FROM pages WHERE id = :id";
				$update = $conn->prepare($query);
				$update->execute(array(':id' => get_pages('id')));
				if (!$update) {
					$notification = "<p class=\"notify\">Failed to delete page</p>";
				}else{
					redirect_to('pages.php');
				}
			}
		} catch (PDOException $e) {
			echo "Query error: ".$e->getMessage();
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
			<h1>Edit Page</h1>
			<hr /><br />
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?page=".get_pages('id'); ?>">
				<div class="fl">
				<input type="text" placeholder="Enter title here" value="<?php echo $title; ?>" name="title" class="ostitles" /><br /><br />
				<textarea class="ostext" cols="80" name="content" rows="20"><?php echo $content; ?></textarea></div>
				<div class="fr">
				<input type="submit" name="page_submit" class="osbutton" value="Update" />&nbsp;
				<a href="delete_post.php"><button name="delete" class="osbutton">Delete</button></a><br /><br />
				<?php
					if (isset($notification)) {
						echo $notification;
					}
				?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>