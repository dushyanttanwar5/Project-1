<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

<title>Library System</title>

</head>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conn=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("demo",$conn) or die(mysql_error());
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
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
<div class="content">
			<div class="node">
			<div class="menu">
			<br>
<hr width="600">
<strong><h1>Download Books</h1></strong>
<hr width="600"><center><br><br>	
<table cellspacing="6">
<form class="form" method="POST">			
<tr>
		<td ><h4>Category:</h4> </td><br>
		<td><select name="category" style="width: 150px; font-size: 15px;" onchange="this.form.submit();">
<?php
$query =mysql_query("select DISTINCT category from upload ORDER BY category ASC");
						echo "<option>select category</option>";
					while($rs=mysql_fetch_array($query)){
						echo "<option>".$rs['category']."</option>";
					}


?></select></td></tr></table><br/>
<?php
    if (isset($_POST['category'])) 
{
echo "<table border=1 id='tab'  width=40% cellpadding=0 cellspacing=0>";
$categ = $_POST['category'];
$locate =mysql_query("select * from upload where category like '%$categ%'");
echo "<tr><th><h2>Click to Download</h2></th></tr>";

while($row1=mysql_fetch_array($locate))
{
	$x=$row1['name'];
echo "<tr><td align=\"center\"><a href='downpro.php?filename=".$row1['name']."'><h3>$x</h3></a></td>";
echo "</tr>";

 }
 echo "</table>"; }?>

<br />
<br />

</div>
	</div>
	  </div>	<div class="clearer"><span></span></div>

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



