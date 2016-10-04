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

if(isset($_REQUEST["id"]))
{
	$id=$_REQUEST["id"];
	
}

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
		
		//$result=mysql_query("insert into tbl_student (st_name,st_roll,st_mail) value ('$name','$roll','$mail')");
		$result=mysql_query("update tbl_student set st_name='$name',st_roll='$roll',st_mail='$mail' where st_id='$id'");
		
		$success_masg="Data updated successfully";
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


	<?php
		$result=mysql_query("select * from tbl_student where st_id='$id'");
		while($row=mysql_fetch_array($result))
		{
			$new_name=$row['st_name'];
			$new_roll=$row['st_roll'];
			$new_mail=$row['st_mail'];
			
		}
	?>
	<br>
	
<!DOCTYPE html>
<html>
	<head>
		<title>Data Update page</title>
	</head>
	<body>
		<h2>Update Data</h2>
		<form action="" method="post">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="i_name" value="<?php echo $new_name;?>"></td>
			</tr>
			<tr>
				<td>Roll</td>
				<td><input type="text" name="i_roll" value="<?php echo $new_roll;?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="i_mail" value="<?php echo $new_mail;?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="form1" value="Update"></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		</form>
		
		<a href="view.php">Back</a>

	</body>
</html>