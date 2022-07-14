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

$right = 0;
$wrong =0 ;
$notattempt=0;
$table = $_SESSION['subject_id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
  
   $sql = "select * from `onlinequiz`.`$table`";
   $result = mysqli_query($conn , $sql);
   $count = mysqli_num_rows($result);
  while($data = mysqli_fetch_array($result)){
      $ans = $_POST[$data['qu_id']];
      if($ans == $data['answer']){
          $right = $right + 1;
      }elseif($ans == "null"){
         $notattempt = $notattempt  + 1;
      }else{
         $wrong = $wrong + 1;
      }

   }
  $name = $_SESSION['user'];
  $attempted = $count - $notattempt;
   $percentage = number_format(($right/$count)*100,2);

   
   $resulttable = $table.'result';
   $sql = "INSERT INTO `onlinequiz`.`$resulttable`  
   VALUES ('$name', '$right', '$count', '$attempted','$notattempt' ,'$percentage')";
   
   $result = mysqli_query($conn ,$sql);
   //  if(!$result){
   //    mysqli_error($result);
   //  }     
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RESULT</title>
   <style>
.Box {
    width: 100%;
    margin: 0 auto;
    display:flex;
    flex-direction:row;
    height: 250px;
    padding-bottom: 8%;
}
 .yellow{
   background-color:rgb(245, 245, 24);
    width: 300px;
    margin-right: 1%;
    box-shadow: 5px 10px 18px #888888;
    padding: 3%;
 }
 .red{
   background-color:rgb(224, 43, 43);
   width: 300px;
   margin-right: 1%;
  /* box-shadow: 10px 20px 50px #bdbdbd;*/
  box-shadow: 5px 10px 18px #888888;
   padding: 3%;
 }
.blue{
   background-color:rgb(45, 184, 240);
   width: 300px;
   box-shadow: 5px 10px 18px #888888;
   padding: 3%;
}
.green {
   background-color: rgb(9, 175, 9);
    width: 300px;
    margin-left: 5%;
    margin-right: 1%;
    box-shadow: 5px 10px 18px #888888;
    padding: 3%;
}

   </style>
</head>
<body>
   <?php require "nav.php" ; ?>
   <div class="head">
   <center><h2><?php echo $_SESSION['user'];?> Result</h2></center>
   </div>
<br><br>

<div class="box"style="width=100%; display:flex; flex-direction:row;">
<div class="green" style="color:white;">
   <h2> <b> <?php echo $right; ?></b></h2>
   <h4>Right Answer</h4>
</div>
<div class="red" style="color:white;">
   <h2> <b> <?php echo $wrong; ?></b></h2>
   <h4>WrongAnswer</h4>
</div>
<div class="yellow">
   <h2> <b> <?php echo $count; ?></b></h2>
   <h4>Total questions</h4>
</div>
<div class="blue" style="color:white;">
   <h2> <b> <?php echo $percentage.'%'; ?></b></h2>
   <h4>Percentage</h4>
</div>
  
</div>






<div class="middle">
        <center><br>
        <br>
         <h2> Marks :- <?php echo $right; ?></h2>
      <h3>Attempted Question :- <?php echo $count-$notattempt ?></h3>
      <h3>Not Attempted :- <?php echo $notattempt ?></h3></center>
   </div> 
<br><br>
   <div class="footer" style="background:white;">
  <center style="color=black; font: weight 400px;font-size: 20px;"><b>©AdityaSabde2021</b><br> <h5>Software Engineer at Google</h5></center>
</div>
</body>
</html>