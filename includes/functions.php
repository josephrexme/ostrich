<?php
	require_once('config.php');

	function redirect_to($location = NULL){
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	function get_title(){
		echo WEBSITE;
	}

	function get_url(){
		echo SITE_URL;
	}
	function bloginfo($param = WEBSITE){
		switch ($param) {
			case 'title':
				echo WEBSITE;
				break;
			case 'url':
				echo SITE_URL;
				break;
			case 'description':
				echo DESCRIPTION;
				break;
			case 'keywords':
				echo KEYWORDS;
				break;
			default:
				echo WEBSITE;
				break;
		}
	}
	function get_profile_thumb(){
		echo "<img src=\"images/profile_thumb.jpg\" alt=\"img\" />";
	}

	function get_credential($field){
		global $conn;
		$query = "SELECT * FROM users WHERE id = :user_id";
		$action = $conn->prepare($query);
		$action->execute(array(':user_id' => $_SESSION['user_id']));
		foreach ($action as $son) {
			$output = $son[$field];
			return $output;
		}
	}
	function get_posts($post_section){
		global $conn;
		$query = 'SELECT * FROM posts WHERE id = '.$_GET['post'];
		$fetch_posts = $conn->prepare($query);
		$fetch_posts->execute();
		foreach ($fetch_posts as $post) {
		 	$post_result = $post[$post_section];
		 	return $post_result;
		 } 
	}
	function get_pages($page_section){
		global $conn;
		if (isset($_GET['page'])) {
			$query = 'SELECT * FROM pages WHERE id = '.$_GET['page'];
			$fetch_pages = $conn->prepare($query);
			$fetch_pages->execute();
			foreach ($fetch_pages as $page) {
			 	$page_result = $page[$page_section];
			 	return $page_result;
			 }
		}
	}
	function edit_page(){
		if (isset($_SESSION['user_id'])) {
			$edit_file = "<a href=\"edit_page.php?page=".$_GET['page']."\">Edit page</a>";
			return $edit_file;
		}
	}
	function edit_post(){
		if (isset($_SESSION['user_id'])) {
			$edit_file = "<a href=\"edit_post.php?post=".$_GET['post']."\">Edit post</a>";
			return $edit_file;
		}
	}
	//Function for pagination
	function get_total($cat){
		global $conn;
		$stmt = $conn->prepare("SELECT id FROM {$cat}");
		$stmt->execute();
		$total = $stmt->rowCount();
		return $total;
	}
	function truncate_loop($content){
		global $post;
		if (strlen($content) > 700) {
			$truncated = "<h1><a href=\"post.php?post=".urlencode($post['id'])."\">".$post['title']."</a></h1><br />";
			$truncated .= "<article>".substr($content, 0, 700).
			"&nbsp;&nbsp;<a href=\"post.php?post=".urlencode($post['id'])."\"><button class=\"truncate\">Read more..</button></a>
			</article><br /><hr class=\"seperator\" />";
		}else{
			$truncated = "<h1><a href=\"post.php?post=".urlencode($post['id'])."\">".$post['title']."</a></h1><br />";
			$truncated .= "<article>".$content."</article><br /><hr class=\"seperator\" />";
		}
		return $truncated;
	}
	//Widgets
	function get_social($facebook,$twitter,$youtube,$gplus){
		echo "<ul class=\"social\">
		<li><a href=\"http://facebook.com/{$facebook}\">
		<img src=\"images/social/facebook.png\" alt=\"facebook\" /></a></li>
		<li><a href=\"http://twitter.com/{$twitter}\">
		<img src=\"images/social/twitter.png\" alt=\"twitter\" /></a></li>
		<li><a href=\"http://youtube.com/{$youtube}\">
		<img src=\"images/social/youtube.png\" alt=\"youtube\" /></a></li>
		<li><a href=\"http://plus.google.com/{$gplus}\">
		<img src=\"images/social/google.png\" alt=\"gplus\" /></a></li>
		</ul>";
	}
?>