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
<strong><h1>Reservation Form</h1></strong>
<hr width="600">
<?php
    $username=$_SESSION['username'];
	include("library/connection.php");
	//selecting data from records based on id
	$query = "SELECT * FROM user where username='$username'";
	//initializing result as a query
	$result = mysql_query($query);
	//display records from records table 
	while($rows = mysql_fetch_array($result))
	{	
		$uname = $rows['username'];
		$pass = $rows['password'];
		$name = $rows['Name'];
	}	
?>
<table cellspacing="6">
<form class="form" action="library/reservedformprocess.php" method="POST">
	<td><label>ID number<label></td>
	<td>
	<input type="password" name="id_num" value="<?php echo $pass?>" readonly >
	</td>
	<tr>
	<td>Name</td>
	<td><input type="text" name="name" value="<?php echo $name?>" readonly ></td>
	<tr>
	<td>E-mail</td>
	<td><input type="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required></td>
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
	<td>Date To be Borrowed</td>
	<td><input type="date" name="date_tobe_borrow" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d",strtotime("+10 days")); ?>" required></td>
	<tr>
	<td>Book Title</td>
	<td><input type="text" name="book_title" value="<?php echo $_GET['name']; ?>" readonly></td>
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


<body>
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










	

   
   

