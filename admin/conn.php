<?php
	$conn = new mysqli("localhost", "root", "", "trashbank");
 
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>