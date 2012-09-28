<?php 

if (isset($_POST['submitted'])) 
{
	require_once ('./mysql_connect.php'); 	
	$errors = array(); 
	if (empty($_POST['email'])) 
	{
	$errors[] = 'You forgot to enter your email address.';
	}
	else
		{
		$e = $_POST['email'];
		}
	
	if (empty($_POST['password']))
	{
		$errors[] = 'You forgot to enter your password.';
	}
	else
		{
		$p = $_POST['password'];
		}
	
	if (empty($errors)) {
		$query = "SELECT user_id, name FROM users WHERE email='$e' AND password='$p'";		
		$result = @mysql_query ($query);
		$row = mysql_fetch_array ($result, MYSQL_NUM);

		if ($row) 
		{
			setcookie ('user_id', $row[0]);
			setcookie ('first_name', $row[1]);
			
			$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
			if ((substr($url, -1) == '/') OR (substr($url, -1) == '\\') )
				{
				$url = substr ($url, 0, -1);
				}
			
			$url .= '/loggedin.php';
			
			header("Location: $url");
			exit();
				
		} 
		else 
		{
			$errors[] = 'The email address and password entered do not match.';
		}
		
	}
		
mysql_close();
}
else { // Form has not been submitted.
	$errors = NULL;
}

$page_title = 'Login';
include ('./includes/header.html');

if (!empty($errors)) 
	{
	echo '<h1 id="mainhead">Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg)
	{
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
	}
?>

<h2>Login</h2>
<form action="login.php" method="post">
	<p>Email: <input type="text" name="email" size="20" maxlength="40" /> </p>
	<p>Password: <input type="password" name="password" size="20" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="Login" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
include ('./includes/footer.html');
?>