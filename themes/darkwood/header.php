<!doctype html>
<html>
<head>
	<!-- OSTRICH content management system | visit http://ostrich-dev.com/cms for more info -->
	<!-- Compulsory styles -->
	<link rel="stylesheet" type="text/css" href="styles/pagination.css" />
	<link rel="stylesheet" type="text/css" href="styles/main.css" />
	<!-- end of compulsory styles -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); echo "/themes/darkwood/style.css"; ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="author" content="<?php bloginfo('title'); ?>" />
	<meta name="keywords" content="<?php bloginfo('keywords'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="images/ostrich.png" />
	<title><?php bloginfo('title'); ?></title>
</head>
<body>
<?php 
if (isset($_SESSION['user_id'])) {
	include('includes/top.php');
}
?>
<div id="wrap">
	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></h1>
</div>