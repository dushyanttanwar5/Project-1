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
	<div class="but">|<a href="listofborrowers.php">List of Borrowers</a>|
	</div>
	<br>
	<br>
<hr width="600">
<strong><h1>Borrow Form</h1></strong>
<hr width="600">
<table cellspacing="6">
<form class="form" action="library/borrowedbookprocess.php" method="POST" name="t1">
	<td><label>ID number<label></td>
	<td><input type="number" name="id_num" required></td>
	
	<tr>
	<td>Name</td>
	<td><input type="text" name="name" required></td>
	
	<tr>
	<td>Course</td>
	<td><select name="course">
		<option>BCA</option>
		<option>BBA</option>
		<option>BJMC</option>
	</select>
	</td>
	<tr>
	<td>Year</td>
	<td><select name="year">
		<option value="I">I</option>
		<option value="II">II</option>
		<option value="III">III</option>
	</select></td>
	<tr>
	<td>Section</td>
	<td><select name="section">
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
	</select></td>
	<tr>
	<td>Date Borrowed</td>
	<td><input type="text" id="date" name="date_borrow" readonly></td>
	<tr>
	<td>Return Date</td>
	<td><input type="date" name="date_will_return"  value="<?php echo date("Y-m-d",strtotime("+7 days")); ?>" readonly></td>
	<tr>
	<td>Book Title</td>
	<td><input type="text" name="book_title" value="<?php echo $_GET['name'];?>" readonly></td>
	<tr>
	<td>No. Copies</td>
	<td><input type="text" name="no_copies" value="1"readonly></td>
	<tr>
		<td>
	<td><button name="borrowbook"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
	<tr>
	<td>
	
	</td>
	</form>
	</table>

<script>
function addDate(){
date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var year = date.getFullYear();

if (document.getElementById('date').value == ''){
document.getElementById('date').value = month + '/' + day + '/' + year;
}
}
</script>
<body onload="addDate();">
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






   
   

