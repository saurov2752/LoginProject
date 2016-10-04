<?php

ob_start();
session_start();
if($_SESSION['name']!="saurov")
{
	header('location:login.php');
}

?>

<?php

include ("database.php");

if(isset($_POST["form1"]))
{
	$current_pass=$_POST["current_password"];
	$new_pass=$_POST["New_Password"];
	$confirm_pass=$_POST["Confirm_Password"];
	
	try
	{
		if(empty($current_pass))
		{
			throw new Exception("Current password cant empty");
		}
		
		if(empty($new_pass))
		{
			throw new Exception("New password cant empty");
		}
		
		if(empty($confirm_pass))
		{
			throw new Exception("Confirm password cant empty");
		}
		
		$current_pass=md5($current_pass);
		
		$num=0;
		$result=mysql_query("select password from tbl_admin where id=1 and password='$current_pass'");
		$row=mysql_fetch_array($result);
		$num=mysql_num_rows($result);
		
		if($num==0) throw new Exception("Current password Invalid");
		
		if($new_pass != $confirm_pass) throw new Exception("Password fields does not match");
		
		$new_pass=md5($new_pass);
		
		mysql_query("update tbl_admin set password='$new_pass' where id=1");
		
		$success_masg="Password updated successfully";
		
	}
	
	catch(Exception $e)
	{
		$msg=$e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Password change</title>
	</head>
	<body>
		<h2>Change Your Password</h2>
		
		<?php

		if(isset($msg)){echo $msg;}
		if(isset($success_masg)){echo $success_masg;}

		?>
		
		<form action="" method="post">
		<table>
			<tr>
				<td>Current Password</td>
				<td><input type="text" name="current_password"></td>
			</tr>
			<tr> 
				<td>New Password</td>
				<td><input type="text" name="New_Password"></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="text" name="Confirm_Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="form1" value="Update"></td>
			</tr>
		</table>
		</form>
		
		<a href="index.php">Home</a>

	</body>
</html>