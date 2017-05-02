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
if (!isset($_SESSION['username'])) 
{
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
	<div class="main">		
		
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
		
		<div class="content">
			<div class="node">
			<div class="menu">

<br><br>
<hr width="600">
<strong><h1>Borrowed Books</h1></strong>
<hr width="600">
<?php
			include('library/connection.php');
			$id= $_POST['id'];
			$sql1 = mysql_query("select * from user where password ='$id'")
or die('Error in query : $sql1. ' .mysql_error());
if (mysql_num_rows($sql1) > 0)
{
			echo "<table border=1 id='tab' width='100%' cellapdding=10 cellspacing=0>";
			$locate =mysql_query("select * from borrowers  where id_number='$id'");
		if (mysql_num_rows($locate) > 0)
		{
			echo "<tr>";
			echo "<th>ID Number</th>";
			echo "<th>Name</th>";
			echo "<th>Course</th>";
			echo "<th>Year</th>";
			echo "<th>Section</th>";
			echo "<th>Borrowed Date</th>";
			echo "<th>Date to Return</th>";
			echo "<th>Book Title</th>";
			echo "<th>Copies</th>";
			echo "<th>Return</th>";
			echo "</tr>";
		}
		else{
			echo "No Borrowed Books!" ;
		}
			while($rows=mysql_fetch_array($locate))
			{
				echo "<tr>";
				echo "<td>".$rows['id_number']."</td>";
				echo "<td>".$rows['name']."</td>";
				echo "<td>".$rows['course']."</td>";
				echo "<td>".$rows['year']."</td>";
				echo "<td>".$rows['section']."</td>";
				echo "<td>".$rows['date_borrow']."</td>";
				echo "<td>".$rows['date_will_return']."</td>";
				echo "<td>".$rows['book_title']."</td>";
				echo "<td>".$rows['no_copies']."</td>";
				echo "<td title=Return><a href='returnform.php?book_title=".$rows['book_title']."&id_number=".$rows['id_number']."&cop=".$rows['no_copies']."&name=".$rows['name']."&course=".$rows['course']."&year=".$rows['year']."&section=".$rows['section']."&dob=".$rows['date_borrow']."&dor=".$rows['date_will_return']."'><center><img src='img/return.png'></center></a></td>";
				echo "</tr>";
			}echo "</table>";
		}
			
			else
{
	echo "Invalid Student-ID!";
}	
		?>

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






   
   






		