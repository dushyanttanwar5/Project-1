<?php
	include('connection.php');
	$id_num = $_POST['id_num'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$course = $_POST['course'];
	$year = $_POST['year'];
	$section = $_POST['section'];
	$year = $_POST['year'];
	$date_tobe_borrow = $_POST['date_tobe_borrow'];
	$book_title = $_POST['book_title'];
	$no_copies = $_POST['no_copies'];
	$copy=mysql_query("select * from reserve_books where id_number='$id_num'");
	if (mysql_num_rows($copy) == 1)
	{
		header("Location:../rc.php");


	}
else
{
	$sql = mysql_query("select * from books where book_title='$book_title'");
	while($row=mysql_fetch_array($sql)){
		$curstock=$row['no_copies'];
	}

	$current = $curstock-$no_copies;

	$sql="update books set no_copies = '$current' where book_title = '$book_title'";
	mysql_query($sql) or die ('Error updating no. copies');

		$query="INSERT INTO reserve_books (id_number,name, course,year ,section, date_tobe_borrow, book_title, no_copies ) VALUES ('$id_num','$name', '$course','$year' ,'$section', '$date_tobe_borrow', '$book_title','$no_copies')";
		mysql_query($query);
		if($query){
			header("Location:../phpmailer/examples/gmail.php?x=$email & a=$name & b=$book_title & c=$date_tobe_borrow");
		}
}
?>

