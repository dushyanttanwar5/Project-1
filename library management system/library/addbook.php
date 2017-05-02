<!DOCTYPE html>
<html>
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
	 	<table cellspacing="6">
		<form class="form" method="POST" action="insertbook.php">
	

		<tr>
			<td>Book Title</td>
			<td><input type="text" pattern="[A-Za-z ]{2,}" name="bookname" required></td>
		</tr>
				<tr>
			<td>Author</td>
			<td><input type="text" pattern="[A-Za-z ]{2,}"  name="author" required></td>
		</tr>
		<tr>
			<td>Book Category</td>
			<td><select name="bookcat">
		<option>COMPUTER</option>
		<option>MATHEMATICS</option>
		<option>MANAGEMENT</option>
		<option>LAW</option>
		<option>COMMERCE</option>
	</select></td>
		</tr>
		<tr>
			<td>No. of Copies</td>
			<td><input type="number" min="1" name="bookcop" required></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><input type="text" name="bookstat"  value="available" readonly></td>
		</tr>
		<tr>
				<td></td>
				<td><button name="borrowbook"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
		</tr>
		</table><br/>

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
