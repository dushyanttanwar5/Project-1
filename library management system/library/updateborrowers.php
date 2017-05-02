<?php
session_start();
 
	if($_SESSION['username']!="administrator")
{
	header('Location: index.php');
} 
else
{
		include("library/connection.php");
		if(isset($_POST['update'])){
				$transaction_id = $_GET['transaction_id'];
				$id_number=$_POST['id_number'];
				$name=$_POST['name'];
				$year = $_POST['year'];
				$course = $_POST['course'];
				$section = $_POST['section'];
				$date_borrow = $_POST['date_borrow'];
				$date_will_return = $_POST['date_will_return'];
				$book_title = $_POST['book_title'];
				$no_copies = $_POST['no_copies'];
				//updating database from your table
				$sql="UPDATE borrowers set id_number='$id_number',name='$name',course='$course',year='$year',section='$section', 
				date_borrow='$date_borrow', date_will_return='$date_will_return',book_title='$book_title',no_copies='$no_copies' 
				where transaction_id='".$transaction_id."'";
				mysql_query($sql) or die('Error');
				header("Location: listofborrowers.php");
			}
		}
			?>
