<?php
$servername ="localhost";
$username = "root";
$password ="";
$database ="onlinequiz";
$conn = mysqli_connect("localhost","root","","onlinequiz");
if(!$conn){
  die(mysqli_error($conn));
}
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login_signup.php");
  exit;
};
$table = $_SESSION['subject_id'];
$resulttable = $table.'result';
// this file  delete all the record present in result table in admin module.
$sql = "truncate TABLE `onlinequiz`.`$resulttable`";
$result = mysqli_query($conn,$sql);
header('location:result.php');

?>