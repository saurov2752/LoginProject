<?php

ob_start();
session_start();
if($_SESSION['name']!="saurov")
{
	header('location:login.php');
}
  
?>


<!DOCTYPE html>
<html>
	<head>
		<title>MySQL and PHP daTabase connection</title>
	</head>
	<body>
		<h2>Select your option.</h2>
		<ul>
			<li><a href="insert.php">Insert data</a></li>
			<li><a href="view.php">Show data</a></li>
			<li><a href="change_password.php">Change password</a></li>
		</ul>
		<br>
		<table>
			<tr>
				<td></td>
				<td><a href="logout.php"><input type="submit" value="Logout" name="logout"></a></td>
			</tr>
		</table>

	</body>
</html>