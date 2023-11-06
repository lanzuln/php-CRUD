
<?php
session_start(); 
include "database/connection.php";
 if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    
    $query = "DELETE FROM crud WHERE id=$id";
    $delete = mysqli_query($con, $query);

    if($delete){
        $_SESSION['delete'] = "Delete user successfully";
        header("location: index.php");
    }
 }
 ?>
