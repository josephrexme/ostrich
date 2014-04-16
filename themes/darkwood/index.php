<?php
	//Pagination Class for blog post pagination
	require('includes/paginator.php');
?>
<?php include('themes/darkwood/header.php'); ?>
<div id="usercontent">
	<div id="menu">
		<ul class="menulist">
			<li><a href="<?php bloginfo('url'); ?>"><img src="images/home_icon.png" alt="Home"></a></li>
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
	//create a new object for pagination
	$paginate = new Paginator('4','p');
	$total = get_total('posts');
	$paginate->set_total($total);
	$post_set = $conn->prepare("SELECT * FROM posts ORDER BY id DESC ".$paginate->get_limit());
	$post_set->execute();
	foreach ($post_set as $post) {
		echo truncate_loop($post['content']);
	}
?>
<?php echo $paginate->page_links(); ?>
	</div>
</div>
<!-- widget area -->
<?php require('themes/darkwood/widgets.php'); ?>
<div id="footer">
	All rights reserved &copy; 2013 | Developed by <a href="http://ostrich-dev.com" target="_blank">ostrich-dev</a>
</div>
</body>
</html>