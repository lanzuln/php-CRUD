<?php 
include "config.php";
//============ Procedural way 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$con){
    die(mysqli_error($con));
}


//============== connection by OOP 

// $con=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// // if(!$con){
// //     die("ERROR: Could not connect. " . $con->connect_error);
// // }

?>