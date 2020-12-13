<?php
include "db.php";
include("auth.php");

if(isset($_POST['add_todo'])){
    $user_id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $todo = $_POST['todo'];
    $sql= "INSERT INTO list(user_id,user_name,todo)
    VALUES ('{$user_id}','{$username}','{$todo}')";
}
if($db->query($sql) == TRUE)
    { 
        $_SESSION['success']="List Successfully added";
        echo "<script>window.open('user_home.php','_self')</script>";
    }
    else{
        $_SESSION['success']="Sorry some error occured, Try again!";
        echo "<script>window.open('user_home.php','_self')</script>";
    }
?>