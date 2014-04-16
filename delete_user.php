<?php session_start(); ?>
<?php require_once('includes/dbconnection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
	redirect_to('index.php');
}
?>
<head>
	<!-- OSTRICH-DEV HTML5 validated website content management system -->
	<link rel="stylesheet" type="text/css" href="styles/main.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="author" content="ostrich-dev" />
	<meta http-equiv="refresh" content="4; URL=index.php" />
	<meta name="keywords" content="content, management, organization, data, webapp, CMS" />
	<meta name="generator" content="Ostrich your open-source content management system" />
	<meta name="description" content="open-source content management system" />
	<link rel="shortcut icon" type="image/x-icon" href="images/ostrich.png" />
	<title><?php echo get_title(); ?></title>
</head>
<body>
	<div class="loghead"><img src="images/logo.png" alt="ostrich logo" /></div>
	<div style="margin: 0 auto; text-align: center">
<?php echo "<p class=\"notify\">".$_SESSION['username']." has been successfully deleted!</p>"; ?>
<h1><a href="index.php">Return to Homepage</a></h1>
<br />
<img src="images/ajax-loader.gif" alt="loader" />
<p style="color: #ddd">Redirecting...</p>
<?php session_destroy(); ?>
</div>
</body>
</html>