<?php
session_start();
include("library/connection.php");
$id = $_GET['id'];
$book = $_GET['book'];

		$query = "Delete from request where id='$id' AND book='$book'";
		mysql_query($query);
		if($_SESSION['username']=="administrator")
		header("Location: requests.php");
	else
		header("Location: requestss.php");

?>
