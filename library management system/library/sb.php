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
<strong><h1>Borrowed Books</h1></strong>
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
			 

 $sql = mysql_query("select * from borrowers where  id_number = $pass")
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
	echo "<td>Date Borrow</td>";
	echo "<td>Return Date</td>";
	echo "<td>Book Title</td>";
	echo "<td>No of Copies</td>";
	
	echo "<tr>";
		

		}
else
	echo "No Borrowed Books";				
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
	echo "<td>".$row['date_borrow']."</td>";
	echo "<td>".$row['date_will_return']."</td>";
	echo "<td>".$row['book_title']."</td>";
	echo "<td>".$row['no_copies']."</td>";
}			 
mysql_free_result($sql);   

?>

</form>
</table>
	</div>
	</div>
	  </div>
	  



</table>


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






   
   






