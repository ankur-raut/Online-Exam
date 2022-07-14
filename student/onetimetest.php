<?php
 $onetimetest = false;
 $show = false;


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
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
 $username = $_SESSION['user'];
 $table = $_SESSION['subject_id'];
 $resulttable = $table.'result';


//  echo $username.'<br>';
//  echo $table.'<br>';
// echo $resulttable.'<br>';

$s = "select * from `onlinequiz`.`$resulttable` where names='$username'";   
$r = mysqli_query($conn,$s) or die( mysqli_error($conn));
if(!$r){
      mysqli_error($r);
 }
 $d = mysqli_fetch_array($r);
 //echo $d['names'];   
     if($d['names'] != $username){

         header('location:dashboard.php');
    }
    else{
        $onetimetest = true; 
        if( $onetimetest == true){
            echo '<script>alert("You cannot give test again ,sorry.")</script>';
            
          }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
.opps {
    position: absolute;
    top: 40%;
    left: 46%;
    width: 40em;
    height: 31em;
    margin-top: -9em;
    margin-left: -15em;
    /* border: 1px solid #ccc; */
    background-color: white;
    padding: 5%;
}
   </style>
    <title>OOps,</title>
</head>
<body>
    <?php //require "nav.php"
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 20px;">
    <div class="container-fluid">
       <h4>Welcome , Student</h4>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>

          <li class="nav-item">
        <a class="nav-link" href="login_signup.php" id="navbar" role="button">
          logout
        </a>
      </li>
     </div>
</div>
</nav>' ?>

     <div class="opps">
        <center><img src="../img/img19.png" alt="no"></center> 
         <h2>OOPS, You cannot give test again ,
             <center> Sorry</center></h2>
             <center><h4>Go Back to the login page</h4></center>
     </div>
</body>
</html>




