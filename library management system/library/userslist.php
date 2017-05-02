<!DOCTYPE html >
<html>
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
<form class="adduserform" method="POST">
	<table>
		<td colspan="2"><strong><h3><center>Add User Account</center></h3></td>
		<tr>
		<td>Name </td><td><input type="text" pattern="[a-zA-Z ]{2,}" name ="name"  required></td>
		<tr>
		<td>Username</td><td><input type="text" pattern="[a-z]+[0-9]{4}"   name ="user" required></td>
		<tr>
		<td>Password</td><td><input type="number"  name ="pass" min="100000"  max="999999" required></td>
		
	<tr>
	<td><button name="adduser"><a class="-buttonform" ><span class="-home">Add user</span></a></button></td>
	<tr>
		<td>
	<?php
		if(isset($_POST['adduser']))
		{
				include("library/connection.php");
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$name = $_POST['name'];
				$result = mysql_query("select * from user where username ='$user' OR password='$pass'");
				if ( mysql_num_rows($result) == 0)
				{
				$query="INSERT INTO user(username, password , Name) VALUES ('$user','$pass', '$name')";
					mysql_query($query);
					if($query)
					{

						echo "<font color='red'><blink>User Inserted!</blink></font>";
					}
				}
					else
					{
					echo "User Connot Insert(Duplicate Username or Password)!";
				}}
	?>
	</td>
	</table>
	</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr width="625">
<strong><h1>User Accounts</h1></strong>
<hr width="625">
<br> <center><form class="form1" action="userslist2.php" method="POST">

<input class="i" type="number" name="id" min="100000"  max="999999" placeholder="Student-ID"required >
<input class="s" type="submit" name="submit" value="Search">
</form></center>	
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


