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
		if ($_SESSION['username']=="administrator")

		echo "<a href=\"reservedlist.php\">RESERVED BOOKS</a>";
		?>
		<?php 
		if ($_SESSION['username']!="administrator")

		echo "<a href=\"sr.php\">RESERVED BOOKS</a>";
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
			<div class="but">
			<?php 
		if ($_SESSION['username']=="administrator")
			echo"|<a href=\"listofborrowers.php\">Borrowers</a>| <a href=\"addbook.php\">Add Books</a>|<br><br>";
?>
</div>
				      
		<?php
			include('library/connection.php');
			echo "<table border=1 id='tab' width='100%' cellpadding=0 cellspacing=0>";
			$locate =mysql_query("select * from books");
		
			echo "<tr>";
			echo "<th>bookid</th>";
			echo "<th>book title</th>";

echo "<th>author</th>";
			echo "<th>category</th>";
			echo "<th>no. copies</th>";
			echo "<th>status</th>";
				if ($_SESSION['username']=="administrator")
				{
			echo "<th>Borrow</th>";
			} 
			if ($_SESSION['username']!="administrator")
{
			echo "<th>Reserve</th>";}
			echo "</tr>";

			while($rows=mysql_fetch_array($locate)){
				echo "<tr>";
				echo "<td>".$rows['book_id']."</td>";
				echo "<td>".$rows['book_title']."</td>";
				echo "<td>".$rows['Author']."</td>";
				echo "<td>".$rows['book_category']."</td>";
				echo "<td>".$rows['no_copies']."</td>";
				if($rows['no_copies']==!0){
				echo "<td>".$rows['status']."</td>";
				}
				else{
				echo "<td>Not Available</td>";
				}
				if($rows['no_copies']==!0){
					if ($_SESSION['username']=="administrator")
					{
				echo "<td title=Borrow><a href='borrowedform.php?name=".$rows['book_title']."'><center><img src='img/brow.png'></center></a></td>";
				}
				if ($_SESSION['username']!="administrator")
				{
				echo "<td title=Reserve><a href='reservedform.php?name=".$rows['book_title']."'><center><img src='img/reserved.png'></center></a></td>";
				}
				echo "</tr>";
			}}
			echo "</table>";
				
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

