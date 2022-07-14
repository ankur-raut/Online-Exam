<?php


// $conn = mysqli_connect($servername,$username,$password);
/*if($conn){
    echo "good luck congradulations";
}
else{
    die( "sorry failed connection".mysql_connect_error());
}
*/
/*
$sql = "INSERT INTO `signup`.`signup` (`username`, `password`, `cpassword`) VALUES ('mharaj', 'shriram', 'shriram')";
$result = mysqli_query($conn , $sql);
if($result){
    echo "inserted succesfully";
}*/
//$sql ="CREATE DATABASE STUDENTBANDDA";
//mysqli_query($conn , $sql);
//$sql ="CREATE TABLE `signup`.`signup` ( `username` INT(11) NOT 
//NULL , `password` VARCHAR(11) NOT NULL , `cpassword` VARCHAR(11) NOT NULL ) ;"

$servername ="localhost";
$username = "root";
$password ="";
$database ="onlinequiz";
$conn = new mysqli("localhost","root","","onlinequiz");
if(!$conn){
    die(mysqli_error($conn));
}

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
  /*  $username= $_POST['username'];
    $pass= $_POST['pass'];
    $cpass= $_POST['cpass'];
    $sql = false;
    $sql = "INSERT INTO `signup`.`signup` VALUES ('$username', '$pass', '$cpass')";
   
   //use to execute query
   $result = $conn->query($sql);

    echo $password;
    if($result){
        echo "data inserted thank you";
     }
     else{
         echo "error";
     }
    // }
*/
?>

