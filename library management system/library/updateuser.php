<?php
session_start();
 
	if($_SESSION['username']!="administrator")
{
	header('Location: index.php');
} 
else
{
		include("library/connection.php");
		if(isset($_POST['updateuser'])){
				$id=$_GET['id'];
				$name=$_POST['name'];
				$username=$_POST['username'];
				$password = $_POST['password'];
				//updating database from your table
				$sql="UPDATE user set Name='$name',username='$username',password='$password' 
				where id='".$id."'";
				mysql_query($sql) or die('Error');
				header("Location: userslist.php");
}			}
			?>
