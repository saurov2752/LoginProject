<?php

ob_start();
session_start();
if($_SESSION['name']!="saurov")
{
	header('location:login.php');
}

?>

<?php  include ("database.php");  ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Data view page</title>
		
		<script>
		function confirm_delete()
		{
			return confirm("Are you sure want to delete?");  //here confirm is a keyword;
		}
		</script>
		
	</head>
	<body>
		<h2>All Data</h2>
		
		<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<th>Serial No</th>
			<th>Student_Id</th>
			<th>Name</th>
			<th>Roll</th>
			<th>Mail</th>
			<th>Action</th>
		</tr>
		
		<?php
		$i=0;
		$result=mysql_query("select * from tbl_student");
		while($row=mysql_fetch_array($result))
		{
			$i++;
		?>
		
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['st_id']; ?></td>
			<td><?php echo $row['st_name']; ?></td>
			<td><?php echo $row['st_roll']; ?></td>
			<td><?php echo $row['st_mail']; ?></td>
			<td>
			<a href="update.php?id=<?php echo $row['st_id']; ?>">Edit</a> &nbsp; | &nbsp;
			<a onclick="return confirm_delete();" href="delete.php?id=<?php echo $row['st_id']; ?>">Delete</a>
			</td>
			</tr>
		
		<?php	
		}
		?>
		
		</table>
		<br>
		
		<a href="index.php">Back</a>

	</body>
</html>