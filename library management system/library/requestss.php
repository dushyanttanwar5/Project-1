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
<strong><h1>Requests</h1></strong>
<hr width="600">
<br>
				
		
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
		$pass = $rows['password'];
		$name = $rows['Name'];
	}	
			echo "<table border=1 id='tab' width='100%' cellpadding=0 cellspacing=0>";
			$locate =mysql_query("select * from request where id='$pass'");
		if (mysql_num_rows($locate) == 0)
		{
			echo"No Request Placed";
		}
		else
		{
			echo "<tr>";
			echo "<th>id</th>";
			echo "<th>name</th>";

echo "<th>book</th>";
			echo "<th>author</th>";
			echo "<th>category</th>";
			echo "<th>status</th>";
			echo "<th>delete</th>";
			echo "</tr>";
			while($rows=mysql_fetch_array($locate)){
				echo "<tr>";
				echo "<td><center>".$rows['id']."</center></td>";
				echo "<td><center>".$rows['name']."</center></td>";
				echo "<td><center>".$rows['book']."</center></td>";
				echo "<td><center>".$rows['author']."</center></td>";
				echo "<td><center>".$rows['category']."</center></td>";
				echo "<td><center>".$rows['status']."</center></td>";
				echo"<td title ='Delete'><a href=\"deleterequest.php?id=$rows[id] &book=$rows[book]\"><center><img src='img/delete.png'></center></a></td>";
				echo "</tr>";

			}
			echo "</table>";

		}	
		echo "<br><br>";	
		?></div>
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


	
