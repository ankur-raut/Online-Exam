<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login_signup.php");
  exit;
}
$servername ="localhost";
$username = "root";
$password ="";
$database ="onlinequiz";
$conn = mysqli_connect("localhost","root","","onlinequiz");
if(!$conn){
  die(mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><title> Result</title>
     <style>
         .div{
             padding-left :15%;
             padding-right:15%;
         }
     </style>


    </head>
<body>
    <?php require "nav.php"; ?><br>
     <center><h2>RESULT TABLE</h2></center>
<br>
<br>
<div class="div">
<table  class="table table-success table-striped">
  <thead>
    <tr>
      
      <th scope="col">name</th>
      <th scope="col">Marks Obtained</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Attempted.</th>
      <th scope="col">Not Attempted</th>
      <th scope="col">Percentage</th>
    </tr>
  </thead>
  <tbody>
   
  <?php 
  $table = $_SESSION['subject_id'];
  $resulttable = $table.'result'; 
  $record = mysqli_query($conn,"SELECT Distinct * from `onlinequiz`.`$resulttable` order by `marks` DESC");
  if($record){
      while($data = mysqli_fetch_array($record)){
        echo '
        <tr>

        <td>'.$data['names'].'</td>
        <td>'.$data['marks'].'</td>
        <td>'.$data['totalmarks'].'</td>
        <td>'.$data['attempted'].'</td>
        <td>'.$data['notattempted'].'</td>
        <td>'.$data['percentages'].'</td>
      </tr>';
      }

  }
  ?>
      
      
    
  </tbody>
</table>
<center><button type="submit" class="btn btn-danger text-light" ><a href="result_delete.php" style="color:white;"> Delete All Records</a></button></center>
</div>


</body>
</html>