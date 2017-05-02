<!DOCTYPE HTML>
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
				<h1><font color="green"> Book Returned</font></h1><hr /><br />
		<?php
			include('library/connection.php');
			$name = $_POST['book_title'];
			$id = $_POST['id_num'];
			$copy = $_POST['no_copies'];

			$sql = mysql_query("select * from books where book_title='$name'");
			while($row=mysql_fetch_array($sql)){
				$curstock=$row['no_copies'];
			}
			$retvalue = $curstock + $copy;
	
			$return="update books set no_copies = '$retvalue' where book_title = '$name'";
			if(mysql_query($return)){
				echo "<a href='booklist.php'>Book List</a>";
			}

			$delvalue = "delete from borrowers where id_number='$id'";
			mysql_query($delvalue) or die('Error Deleting borrowers info');
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


