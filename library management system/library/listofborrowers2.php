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
if ($_SESSION['username']!="administrator")
{
	header('Location: index.php');
}
?>

<body>

</div>

<div class="container">	
<?php
	include("library/header.php");
?>
	<div class="navigation">
		<a href="index.php">HOME</a>
		<a href="reservedlist.php">RESERVED BOOKS</a>
		<a href="returnbook.php">RETURN BOOK</a>
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
		<a href="userslist.php">USERS</a>
		<a href="logout.php">LOGOUT</a>
		<div class="clearer"><span></span></div>
	</div>

	<div class="main">		
		
		<div class="content">
		<div class="node">
	
		<div class="menu">

<br>
|  <a href="booklist.php">Book List</a> |
<br>
<br>
<hr width="600">
<strong><h1>Borrowers</h1></strong>
<hr width="600">
<br>
<?php
include("library/connection.php");
$id= $_POST['id'];
$sql1 = mysql_query("select * from user where password ='$id'")
or die('Error in query : $sql1. ' .mysql_error());
if (mysql_num_rows($sql1) > 0)
{
 $sql2 = mysql_query("select * from borrowers where id_number='$id'")
   or die('Error in query : $sql2. ' .mysql_error());
   
if (mysql_num_rows($sql2) > 0) 
{            
	echo "<table border='1' cellspacing='0' cellpadding='10' class='table' width='600'>";
	echo "<td>ID Number</td>";
	echo "<td>Name</td>";
	echo "<td>Course</td>";
	echo "<td>Year</td>";
	echo "<td>Sectiom</td>";
	echo "<td>Date Of Borrow</td>";
	echo "<td>Return Date</td>";
	echo "<td>Book Title</td>";
	echo "<td>No of Copies</td>";
	echo "<td colspan='2'>Action</td>";
	
	echo "<tr>";
		

		}
else
{
	echo "No Borrowed Books!";				
}
while ($row = mysql_fetch_array($sql2))
	{
	echo "<tr>";
	echo "<td>".$row['id_number']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['course']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['section']."</td>";
	echo "<td>".$row['date_borrow']."</td>";
	echo "<td>".$row['date_will_return']."</td>";
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['no_copies']."</td>
	 <td title ='Renew'><a href=\"editborrowers.php?id_number=$row[id_number]\"><center><img src='img/edit.png'></center></a></td>";
	echo "<td><a href=deleteborrowers.php?id_number='".$row['id_number']."'><center><img src='img/delete.png'></center></a></td>";
}
}
else
{
	echo "Invalid Student-ID!";
}
		
			 


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






   
   







