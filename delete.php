
<?php
session_start(); 
include "database/connection.php";
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query="DELETE FROM crud WHERE id=$id";
    $detete=mysqli_query($con, $query);

    if($detete){
        $_SESSION['delete'] = "Delete user sucessfully";
        header("location: index.php");
    }
 }
 ?>

