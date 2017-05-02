<?php
session_start();
 
	if($_SESSION['username']!="administrator")
{
	header('Location: index.php');
} 
else
{
		include("library/connection.php");
		if(isset($_POST['update']))
		{
				$id_number = $_GET['id_number'];
				$id_number=$_POST['id_number'];
				$name=$_POST['name'];
				$year = $_POST['year'];
				$course = $_POST['course'];
				$section = $_POST['section'];
				$date_tobe_borrow = $_POST['date_tobe_borrow'];
				$book_title = $_POST['book_title'];
				$no_copies = $_POST['no_copies'];
				//updating database from your table
				$sql="UPDATE reserve_books set id_number='$id_number',name='$name',course='$course',year='$year',section='$section'
				, date_tobe_borrow='$date_tobe_borrow',book_title='$book_title',no_copies='$no_copies' 
				where id_number='".$id_number."'";
				mysql_query($sql) or die('Error');
				header("Location: reservedlist.php");
			}}
			?>
