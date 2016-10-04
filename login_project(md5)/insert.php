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
	$name=$_POST["i_name"];
	$roll=$_POST["i_roll"];
	$mail=$_POST["i_mail"];
	
	try
	{
		if(empty($name))
		{
			throw new Exception("Nmae cant Empty");
		}
		
		if(empty($roll))
		{
			throw new Exception("Roll cant Empty");
		}
		
		if(empty($mail))
		{
			throw new Exception("Mail cant Empty");
		}
		
		$result=mysql_query("insert into tbl_student (st_name,st_roll,st_mail) value ('$name','$roll','$mail')");
		$success_masg="Data inserted successfully";
	}
	
	catch(Exception $e)
	{
		$msg=$e->getMessage();
	}
}

?>

<?php

if(isset($msg)){echo $msg;}
if(isset($success_masg)){echo $success_masg;}

?>



<!DOCTYPE html>
<html>
	<head>
		<title>Data Insert page</title>
	</head>
	<body>
		<h2>Insert Data</h2>
		<form action="" method="post">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="i_name"></td>
			</tr>
			<tr>
				<td>Roll</td>
				<td><input type="text" name="i_roll"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="i_mail"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="form1" value="Insert"></td>
			</tr>
		</table>
		</form>
		
		<a href="index.php">Back</a>

	</body>
</html>