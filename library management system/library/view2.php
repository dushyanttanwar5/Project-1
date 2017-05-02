<?php

	include("library/connection.php");
	$book = $_POST['bookname'];
	$author = $_POST['author'];
	$status = $_POST['status'];
	$sql="update request set status = '$status' where book='$book' AND author='$author'";
	mysql_query($sql);
	if($sql)
	{
		header("Location: requests.php");
	}

?>