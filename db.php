<?php 
    $db=new mysqli("localhost","root","","todo");
	if(!$db)
	{
		echo "Database is  Not Connected";
	}
?>