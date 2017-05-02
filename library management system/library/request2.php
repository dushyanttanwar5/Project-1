<?php
			 if (isset($_POST['bookname']))
			  { 
					include('library/connection.php');
					$bookname=$_POST['bookname'];
					$author=$_POST['author'];
					$cat=$_POST['bookcat'];
					$id=$_POST['id'];
					$name=$_POST['name'];
					
					
					$query ="insert into request (id,name,book,author,category) values('$id','$name','$bookname','$author','$cat')";
					if(mysql_query($query))
					{
						header("Location:request3.php");
							echo "Book Added Successfuly | <a href='booklist.php'>Book List</a>";
					}
						
			}
		?>