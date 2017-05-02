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
	<button name="listofborrowers" class="but">|<a href="userslist.php">List of Users</a>|</button>
	<br>
	<br>
<?php
	include("library/connection.php");
	//selecting data from records based on id
	$query = "SELECT * FROM user where id=$_GET[id]";
	//initializing result as a query
	$result = mysql_query($query);
	//display records from records table 
	while($rows = mysql_fetch_array($result))
	{	
		$id = $rows['id'];
		$name = $rows['Name'];
		$username = $rows['username'];
		$password = $rows['password'];		
	}	
?>
<hr width="600">
<strong><h1>Edit User</h1></strong>
<hr width="600">
<table cellspacing="6">
<form class="form" action="updateuser.php?id=<?php echo $id?>" method="POST">
<tr>
		<td>Name </td><td><input type="text" pattern="[a-zA-Z ]{2,}" name ="name" value='<?php echo $name?>' required></td>
<tr>	<td>Username</td>
	<td><input type="text" name="username" pattern="[a-z]+[0-9]{4}" value='<?php echo $username?>' required></td>
	<tr>
	<td>Password</td>
	<td><input type="number" name="password" min="100000"  max="999999" value='<?php echo $password?>' required></td>
	<tr>
		<td>
	<td><button name="updateuser"><a class="-buttonform" ><span class="">Update</span></a></button></td>
	<tr>
	<td>
	</td>
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
