<?php
include ("database.php");
if(isset($_POST['form1']))
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	try
	{
		if(empty($user))
			throw new Exception("Username can not Empty");
		
		if(empty($pass))
			throw new Exception("Password can not Empty");
		
		$pass=md5($pass);
		
		$num=0;
		$result=mysql_query("select * from tbl_admin where username='$user' and password='$pass' and id=1");
		$num=mysql_num_rows($result);
		//$a=mysql_query("select username from tbl_admin where id=1");
		//var_dump($num);
		//exit;
		//$b=mysql_query("select password from tbl_admin where id=1");
		if($num>0)
		{
			session_start();
			$_SESSION['name']="saurov";
			header('location:index.php');
		}
		else
		{
			throw new Exception("Invalid Username and/or Password");
			//header('location:login.php');
		}
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
		<title>Welcome to Login</title>
	</head>
	<body>
		<h2>Login</h2>
		
		<?php
		if(isset($msg))
		{echo $msg;}	
		?>
		
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="user"></td>
			</tr>
			
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="form1" value="Login"></td>
			</tr>
		</table>
	</form>

	</body>
</html>