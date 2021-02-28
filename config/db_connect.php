<?php 
	//connect to database
	$conn = mysqli_connect('localhost', 'admin', 'admin', 'the_todo_app');

	//check the connection
	if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error();
	}
?>