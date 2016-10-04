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

$result=mysql_query("delete from tbl_student where st_id='$id'");
header('location: view.php');
?>