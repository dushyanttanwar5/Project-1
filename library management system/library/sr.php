<!DOCTYPE html >
<html >
<head>

<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>


<title>Library System</title>

</head>

<?php

// Inialize session
session_start();


// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}

?>

<body>

</div>

<div class="container">	
<?php
	include("library/header.php");
?>
	<div class="main">		
		
		<div class="navigation">
		<a href="index.php">HOME</a>
        <a href="sr.php">RESERVED BOOKS</a>
		<a href="books.php">BOOKS</a>
		<?php
		if ($_SESSION['username']!="administrator")
		echo "<a href=\"download.php\">E-BOOKS</a>";
?>
<?php 
		if ($_SESSION['username']=="administrator")
		
        echo "<a href=\"upload.php\">E-BOOKS</a>";
		
		?>
		<?php 
		if ($_SESSION['username']=="administrator")

		echo "<a href=\"requests.php\">REQUESTS</a>";
		?>

		<?php
		if ($_SESSION['username']!="administrator")
		echo "<a href=\"request.php\">REQUEST BOOKS</a>";
?>	
		<a href="logout.php">LOGOUT</a>
		<div class="clearer"><span></span></div>
		</div>
		
		<div class="content">
			<div class="node">
			<div class="menu">

<br>
<br>
<hr width="600">
<strong><h1>Reserved Books</h1></strong>
<hr width="600">
<br>
			<?php
include("library/connection.php");
$username=$_SESSION['username'];
	include("library/connection.php");
	$query = "SELECT * FROM user where username='$username'";
	$result = mysql_query($query);
	while($rows = mysql_fetch_array($result))
	{	
		$pass = $rows['password'];
	}	
			 
$quer="select * from reserve_books where date_tobe_borrow < CURDATE() ";
 $result=mysql_query($quer);
 if (mysql_num_rows($result) > 0) 
 {
 while($row = mysql_fetch_array($result))
	{	
        $book_title=$row['book_title'];
	}
	$sql1 = mysql_query("select * from books where book_title='$book_title'");
	while($row=mysql_fetch_array($sql))
	{
		$curstock=$row['no_copies'];
	}

	$current = $curstock + 1;

	$sql2="update books set no_copies = '$current' where book_title = '$book_title'";
	mysql_query($sql2) or die ('Error updating no. copies');	

 $query = "Delete from reserve_books where date_tobe_borrow < CURDATE()"; 
mysql_query($query); 
}
 $sql = mysql_query("select * from reserve_books where  id_number = $pass")
   or die('Error in query : $sql. ' .mysql_error());
   
if (mysql_num_rows($sql) > 0) 
{            
	echo "<table border='1' cellspacing='0' cellpadding='10' class='table' width='600'>";
	
	if ($_SESSION['username'] == "administrator")
	{
		echo "<td>ID Number</td>";
		echo "<td>Name</td>";
	}
	echo "<td>Course</td>";
	echo "<td>Year</td>";
	echo "<td>Sectiom</td>";
	echo "<td>Date To Borrow</td>";
	echo "<td>Book Title</td>";
	echo "<td>No of Copies</td>";
	echo "<td>Action</td>";
	echo "<tr>";
		}
else
	echo "No Reserved Book from the Database!";		
while ($row = mysql_fetch_array($sql))
	{
	echo "<tr>";
	
	if ($_SESSION['username'] == "administrator")
	{
	echo "<td>".$row['id_number']."</td>";
	echo "<td>".$row['name']."</td>";
	}
	echo "<td>".$row['course']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['section']."</td>";
	echo "<td>".$row['date_tobe_borrow']."</td>";
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['no_copies']."</td>
	<td title ='Delete'><a href=\"deletereserved.php?id_number=$row[id_number]&book_title=$row[book_title]\"><center><img src='img/delete.png'></center></a></td>";
}		
			 
mysql_free_result($sql);

?>

</form>
</table>
	</div>
	</div>
	  </div>
	  



	
		<div class="clearer"><span></span></div>

	</div>

	
		<div class="clearer"><span></span></div>
<footer>	
		<div class="copyright">
			<?php
		include("library/footer.php");
		?>
			
			</div>
	</footer>
	</div>

</div>

</body>

</html>






   
   






