<?php
include "db.php";
include("auth.php");

if(isset($_POST['remove'])){
    $id = $_POST['todo_id'];
    $sql = "DELETE FROM list WHERE id=$id";
}
    if($db->query($sql) == TRUE)
    { 
        $_SESSION['success']="List Successfully deleted";
        echo "<script>window.open('user_home.php','_self')</script>";
    }
    else{
        $_SESSION['success']="Sorry some error occured, Try again!";
        echo "<script>window.open('user_home.php','_self')</script>";
    }
?>