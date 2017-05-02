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
if ($_SESSION['username'] !="administrator")
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
<?php
		if ($_SESSION['username']!="administrator")
		echo "<a href=\"sr.php\">RESERVED BOOKS</a>";
?>		
<?php 
		if ($_SESSION['username']=="administrator")

		echo "<a href=\"reservedlist.php\">RESERVED BOOKS</a>";
		?>
		<?php 
		if ($_SESSION['username']=="administrator")

		echo "<a href=\"returnbook.php\">RETURN BOOK</a>";
		?>
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
        <?php 
		if ($_SESSION['username']=="administrator")

		echo "<a href=\"userslist.php\">USERS</a>";
		?>
		<a href="logout.php">LOGOUT</a>
		<div class="clearer"><span></span></div>
	</div>
	<div class="main">	
		
		<div class="content">
			<div class="node">
			<div class="menu">
			<br>
<br>
<hr width="600">
<strong><h1>Review Request</h1></strong>
<hr width="600">
<br>


	 	<table cellspacing="6">
		<form class="form" method="POST" action="view2.php">
		<tr>
			<td>Book Title</td>
			<td><input type="text" pattern="[A-Za-z ]{2,}" name="bookname" value="<?php echo $_GET['book'];?>" readonly></td>
		</tr>
				<tr>
			<td>Author</td>
			<td><input type="text" pattern="[A-Za-z ]{2,}"  name="author" value="<?php echo $_GET['author'];?>" readonly></td>
		</tr>
		<tr>
			<td>Category</td>
			<td><input type="text"   name="category" value="<?php echo $_GET['category'];?>" readonly></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><select name="status">
		<option>Pending</option>
		<option>Accepted</option>
		<option>Rejected</option>
	</select></td>
		</tr>

		<tr>
				<td></td>
				<td><button name="request"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
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
