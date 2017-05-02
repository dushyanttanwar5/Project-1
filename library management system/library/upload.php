<!DOCTYPE HTML>
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
if ($_SESSION['username']!= "administrator") 
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
<div class="content">
			<div class="node">
			<div class="menu">

<br><br>
<hr width="600">
<strong><h1>Upload Books</h1></strong>
<hr width="600"><center>	
<form enctype="multipart/form-data" class="form1" action="" name="form" method="post">
<table border="0" cellspacing="20" cellpadding="10" id="table">
<tr>
	<td><h4>Category :</h4></td>
	<td><select name="cat">
		<option>Maths</option>
		<option>Computers</option>
		<option>Commerce</option>
		<option>Accounts</option>
	</select>
	</td>
	</tr>
<tr>
<td><h4>Upload File :</h4></td>
<td >
<input  type="file" name="photo" id="photo" required /></td>
</tr>
<br><br>
<tr>
<td>     </td>
<td><input type="submit" class="s" name="submit" id="submit" value="Submit" />
</td>
</tr>
</table>
</form>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conn=mysql_connect("localhost","root","") or die(mysql_error());
$sdb=mysql_select_db("demo",$conn) or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  
  $cat=$_POST['cat'];
  move_uploaded_file($temp,"files/".$name);
$insert=mysql_query("insert into upload(category,name)values('$cat','$name')");
if($insert){
echo "<h3>Upload Successful!</h3>";
}
else{
die(mysql_error());
}
}
?>

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


