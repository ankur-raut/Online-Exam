<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
     include "learn.php";
     
     if($id = $_GET['deleteid'] != null){
         $id = $_GET['deleteid'];
         $table = $_SESSION['subject_id'];
         $del = mysqli_query($conn,"DELETE from `onlinequiz`.`$table` where  qu_id= $id");
         if($del){
            mysqli_close($conn);
            header("location: table.php");//relocate the page after the delete
            exit;
        }
        else{
            echo "error for deleting the row";
        }
   
     }
     
     
      
     


?>