<!doctype html>
<html>
<head>
	<!-- OSTRICH content management system | visit http://ostrich-dev.com/cms for more info -->
	<link rel="stylesheet" type="text/css" href="styles/main.css" />
	<link rel="stylesheet" type="text/css" href="styles/pagination.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="author" content="<?php echo get_title(); ?>" />
	<meta name="og:title" content="ostrich" />
	<?php
		if (isset($_POST['post_submit'])) {
			echo "<meta http-equiv=\"refresh\" content=\"1; URL=posts.php\" />";
		}elseif (isset($_POST['page_submit'])) {
			echo "<meta http-equiv=\"refresh\" content=\"1; URL=pages.php\" />";
		}
	?>
	<meta name="keywords" content="content, management, organization, data, webapp, CMS" />
	<meta name="generator" content="Ostrich your open-source content management system" />
	<meta name="description" content="open-source content management system" />
	<meta name="developer" content="ostrich-dev" />
	<link rel="shortcut icon" type="image/x-icon" href="images/ostrich.png" />
	<title><?php echo get_title(); ?></title>
</head>
<body>