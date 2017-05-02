<?php
session_start();
include("library/connection.php");
//get the id frin delete.php 
$id_number = $_GET['id_number'];
$book_title = $_GET['book_title'];
$sql = mysql_query("select * from books where book_title='$book_title'");
	while($row=mysql_fetch_array($sql))
	{
		$curstock=$row['no_copies'];
	}

	$current = $curstock+ 1;

	$sql="update books set no_copies = '$current' where book_title = '$book_title'";
	mysql_query($sql) or die ('Error updating no. copies');
		$query = "Delete from reserve_books where id_number=$id_number";
		mysql_query($query);
		if($_SESSION['username']=="administrator")
		header("Location: reservedlist.php");
	else
		header("Location: sr.php");
?>
