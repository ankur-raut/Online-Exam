<?php

//$result = false;
$var1 = false;
$var2 = false;
$var3 = false;
$showalert = false;
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  require_once "learn.php";
    $username= $_POST['username'];
    $pass= $_POST['pass'];
    $cpass= $_POST['cpass'];
    $subject= $_POST['subject'];
    $subject_id= $_POST['subject_id'];

    
   // $sql = false;
    // check user name exsit
    
   $existsql = "SELECT * FROM `signup` WHERE username ='$username' and subject_id = '$subject_id'";
   $existsql1 = "SELECT subject_id FROM `signup` WHERE subject_id = '$subject_id'";
   $result = mysqli_query($conn , $existsql);
   $result1 = mysqli_query($conn , $existsql1);
   $numExitRows1 = mysqli_num_rows($result1);
   $numExitRows = mysqli_num_rows($result);
   if($numExitRows1>0){
     $var3=true;
   }
   else{
    if($numExitRows > 0){
      $var2 = true;
    }
    else{
        $exist = false;

        if($pass == $cpass && $username !="" ){
          $hash = password_hash($pass, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `onlinequiz`.`signup` VALUES ('$username', '$hash', '$cpass','$subject','$subject_id')";
           $result = mysqli_query($conn , $sql);
           if($result){
             $showalert = true;
             $sql ="CREATE TABLE `onlinequiz`.`$subject_id`(
              qu_id int(11),
              question varchar(255),
              option1 varchar(255),
              option2 varchar(255),
              option3 varchar(255),
              option4 varchar(255),
              answer varchar(255)
          )";
          $result = mysqli_query($conn,$sql);
               
         
          $resulttable = $subject_id.'result'; 
          $sql1 ="CREATE TABLE `onlinequiz`.`$resulttable`(
              names varchar(255),
              marks varchar(255),
              totalmarks varchar(255),
              attempted varchar(255),
              notattempted varchar(255),
              percentages varchar(255)
          )";
          $result1 = mysqli_query($conn,$sql1);
          if(!$result1){
            mysqli_error($result);
          }
          header("location:login.php");
          }
         }
         else{
           $var1 = true;
         }
    }
   //use to execute query
   //$result = $conn->query($sql);
    }
  }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <style>
 #form {
    padding: 4%;
    padding-top: 2%;
    margin: 5%;
    margin-left: 10%;
    margin-right: 49%;
    color: honeydew;
    font-weight: 700;
    background:none;
}
body{
  background :url(img/img5.jpg);
  background-size:cover;
}
#form input:hover{
  background-color: rgb(198, 220, 228);
    size: 2%;
    cursor: pointer;
    transform: scale(1.1);
}
#form input{
  border: solid;
border-radius:28px;
border-style: inset;
}
   .scroll {
    padding-left: 20%;
    padding-right: 20%;
    margin-left: 2%;
    margin-right: 2%;
    background-color: lightgreen;
   }
  marquee {
    font-size: x-large;
    color: black;
  }
  .btn {
    background-color: black;
    border: solid;
    border-radius: 13px;
    width: 100px;
    color:white;
}
  .btn:hover{
  background: #2ecc71;
}
    </style>
</head>
<body>
<?php require 'nav.php' ?>
<div class="scroll">
<marquee behavior="scroll" direction="left">
  Welcome to our online examination website , please sign up here first for entering.</marquee>
  </div>

<?php
if($showalert){
  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    You successfully sign up , Thank you.
  </div>
</div>';
}
if($var1){
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Error , keep Password and Confirm Password Same .
    </div>
  </div>';
}

if($var2){
  echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  Error, Username Already Exists.
  </div>
</div>';
}
if($var3){
  echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  Error, Subject_id Already Exists.
  </div>
</div>';
}
?>

<form id="form" action="signup.php" method="post">
 <h2 id="login">SIGN UP</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">USERNAME</label>
    <input  name ="username" maxlength="11"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
    <div id="emailHelp" class="form-text"> Never share your password with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Password</label>
    <input  name ="pass" maxlength="255" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" > confirm Password</label>
    <input  name ="cpass" maxlength="11" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter confirm password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Subject</label>
    <input  name ="subject" maxlength="11" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter confirm password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color:black"> subject_id</label>
    <input  name ="subject_id" maxlength="11" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter confirm password">
  </div>

<br>
 <center><button type="submit" class="btn" name ="submit">Submit</button></center> 
<br>



</form>
</body>
</html>




