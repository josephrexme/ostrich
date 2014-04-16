<?php session_start(); ?>
<?php
	if (isset($_SESSION['user_id'])) {
	header('Location:../admin.php');
}
?>
<?php require_once('../includes/dbconnection.php'); ?>
<?php require_once('../includes/functions.php'); ?>
<?php require_once('../includes/password.php'); ?>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	try {
		if (!empty($username) && !empty($password)) {
			$query = 'SELECT id, username, hashed_password FROM users WHERE username = :username';
			$result_set = $conn->prepare($query);
			$result_set->execute(array(':username' => $username));
			foreach ($result_set as $found) {
				if ((password_verify($password, $found['hashed_password'])) && ($result_set->rowCount() == 1)) {
					$_SESSION['user_id'] = $found['id'];
					$_SESSION['username'] = $found['username'];
					redirect_to('../admin.php');
				}else{
					$message = "<div class=\"notify\">Wrong username/password combination</div>";
				}
			}	
		} else {
			$message = "<div class=\"notify\">Fill in the required fields</div>";
		}
	} catch (PDOException $e) {
		echo "Database query error: ". $e->getMessage();
	}
}
?>
<?php require_once('../includes/functions.php'); ?>
<!doctype html>
<html>
<head>
	<!-- OSTRICH-DEV HTML5 validated website content management system -->
	<link rel="stylesheet" type="text/css" href="../styles/main.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="author" content="Joseph Rex" />
	<meta name="keywords" content="content, management, organization, data, webapp, CMS" />
	<meta name="generator" content="Ostrich your open-source content management system" />
	<meta name="description" content="open-source content management system" />
	<link rel="shortcut icon" type="image/x-icon" href="../images/ostrich.png" />
	<title><?php bloginfo('title'); ?></title>
</head>
<body>
	<div id="authbox">
		<div class="loghead"><img src="../images/logo.png" alt="ostrich logo" /></div>
		<br />
		<form method="post" action="index.php">
		<table>
			<tr>
				<td><b>Username: &nbsp;</b></td>
				<td><input type="text" name="username" class="osinputs" required="required"/></td>
			</tr>
			<tr>
				<td><b>Password: &nbsp;</b></td>
				<td><input type="password" name="password" class="osinputs"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" class="osbutton" value="Log in" /></td>
			</tr>
		</table>
		</form>
		<?php
		if (isset($message)){
			echo $message;
		}
		?>
		<p><a href="<?php bloginfo('url'); ?>">&larr; Back to <?php bloginfo( 'title' ); ?> homepage</a></p>
	</div>
</body>
</html>
<?php $conn = null; ?>