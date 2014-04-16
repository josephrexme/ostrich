<?php session_start(); ?>
<?php require_once('includes/dbconnection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/password.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
	redirect_to('index.php');
}
?>
<?php
try {
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);
		if (!empty($username) && !empty($password)) {
			$check = $conn->prepare('SELECT * FROM users WHERE username = :username');
			$check->execute(array(':username' => $username));
				if ($check->rowCount() == 1) {
					$message = "<p class=\"notify\">Oops! something went wrong :-) The user already exists!</p>";
				}else{
					$bind = array(':username' => $username, ':hashed_password' => $hashed_password);
					$query = "INSERT INTO users (username, hashed_password) VALUES (:username, :hashed_password)";
					$result = $conn->prepare($query);
					$result->execute($bind);
					$message = "<p class=\"notify\">New user \"{$username}\" has been successfully registered!</p>";
				}
			}else{
				$message = "<p class=\"notify\">Fill the required fields</p>";
			}
		}elseif (isset($_POST['submit_edit'])) {
			$credentials = array(
				'firstname' => $_POST['firstname'],
				'lastname'  => $_POST['lastname'],
				'acc_uname' => $_POST['acc_uname'],
				'acc_pass'  => $_POST['acc_pass'],
				'email'		=> $_POST['email'],
				'website'	=> $_POST['website'] );
			foreach ($credentials as $values) {
				if (!empty($values)) {
					$query = "UPDATE users SET ";
					$query .= "firstname = :firstname, ";
					$query .= "lastname = :lastname, ";
					$query .= "username = :username, ";
					$query .= "hashed_password = :password, ";
					$query .= "email = :email, ";
					$query .= "website = :website ";
					$query .= "WHERE id = ".$_SESSION['user_id'];
					$result_set = $conn->prepare($query);
					extract($credentials);
					$result_set->execute(array(
						':firstname' => $firstname,
						':lastname' => $lastname,
						':username' => $acc_uname,
						':password' => password_hash($acc_pass, PASSWORD_BCRYPT),
						':email' => $email,
						':website' => $website));
					if (!$result_set) {
						$message2 = "<p class=\"notify\">Settings failed to update!</p>";
					}else{
						$message2 = "<p class=\"notify\">Settings updated successfully!</p>";
					}
				}else{
					$message2 = "<p class=\"notify\">There are still blank fields</p>";
				}
			}
		}elseif (isset($_POST['delete'])) {
			$query = 'DELETE FROM users WHERE id = :id';
			$result = $conn->prepare($query);
			$result->execute(array(':id' => $_SESSION['user_id']));
			if (!$result) {
				$message2 = "<p class=\"notify\">Failed to delete user!</p>";
			} else {
				redirect_to('delete_user.php');
				}
		}
} catch (PDOException $e) {
	echo "Database query error: ".$e->getMessage();
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
				<li><a href="settings.php">Settings</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
			</li>
		</ul></span>
	</div>
	<div id="wrap">
		<h1><a href="<?php echo get_url(); ?>"><?php echo get_title(); ?></a></h1>
	</div>
	<div id="menuWrap">
		<img src="images/ostrich.png" alt="ostrich" />
		<ul class="menuList">
			<li><a href="posts.php">Manage Posts</a></li>
			<li><a href="pages.php">Manage Pages</a></li>
			<li><a href="admin.php">Return to Dashboard</a></li>
			<li><a href="index.php">Return to your website</a></li>
		</ul>
	</div>
	<div id="contentWrap">
		<div>
		<h2>ADD NEW USER</h2><br />
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Username: <input type="text" class="osinputs" name="username" />&nbsp;&nbsp;
			Password: <input type="password" placeholder="********" class="osinputs" name="password" />&nbsp;&nbsp;
			<input type="submit"class="osbutton" name="submit" value="Add User" />
		</form>
		<?php if (isset($message)) {
			echo $message;
		} ?><br />
		<hr /><br />
		<div class="fl">
		<h2>EDIT YOUR ACCOUNT</h2>
		<?php if (isset($message2)) {
			echo $message2;
		} ?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>Firstname: </td>
				<td><input type="text" value="<?php echo get_credential('firstname'); ?>" class="osinputs" name="firstname" /></td>
			</tr>
			<tr>
				<td>Lastname: </td>
				<td><input type="text" value="<?php echo get_credential('lastname'); ?>" class="osinputs" name="lastname" /></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="acc_uname" value="<?php echo get_credential('username'); ?>" class="osinputs" /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="acc_pass" required="true" placeholder="*******" class="osinputs" /></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="email" name="email" class="osinputs" value="<?php echo get_credential('email'); ?>" placeholder="example@mailserver.com" /></td>
			</tr>
			<tr>
				<td>Website: </td>
				<td><input type="url" name="website" class="osinputs" value="<?php echo get_credential('website'); ?>" placeholder="http://website.com" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" class="osbutton" name="submit_edit" value="Save Changes" />&nbsp;&nbsp;
					<input type="submit" class="osbutton" name="delete" value="Delete User" /></td>
			</tr>
		</table>
		</div>
		<div class="fr" style="margin-right: 20px">
			<h2>REGISTERED ACCOUNTS</h2><br />
			<p><?php
			$sel = $conn->query('SELECT * FROM users');
			foreach ($sel as $all) {
				echo '<ul style=\'padding-left: 20px;\' type=\'square\'><li>'.$all['username'].'</li></ul>';
			}
			?>
			</p><br />
			<p><b>Log in as a user to update or delete</b></p>
		</div>
		</div>
		</div>
	</div>
</body>
</html>
<?php $conn = null; ?>