<?php 
 //The config file for connecting to DB
    $db=new mysqli("localhost","root","","todo");
	if(!$db)
	{
		echo "Database is  Not Connected";
	}
?>