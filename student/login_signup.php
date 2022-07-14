<?php

    $var=false;
    $showalert = false;
    $showerror = false;
    $showalertlogin = false;
    $showerrorlogin = false;
    $error=false;
    $onetimetest = false;
// loginpost method from here

        if(isset($_POST['login'])){
            $servername ="localhost";
            $username = "root";
            $password ="";
            $database ="onlinequiz";
            $conn = mysqli_connect("localhost","root","","onlinequiz");
            if(!$conn){
                die(mysqli_error($conn));
            }
            $username = $_POST['user'];
            $password =$_POST['pass'];
            $subject_id =$_POST['subject_id'];
           

// onetimetest
                $sql1 = "SELECT * from `onlinequiz`.`signup`" ;
                $result1 = mysqli_query($conn , $sql1) or die( mysqli_error($conn));
                while( $data = mysqli_fetch_array($result1)){
                    if( $subject_id == $data['subject_id']){
                        // after using hash fucntion 
                        $sql = "SELECT * from `onlinequiz`.`student` where username ='$username' " ;
                        $result = mysqli_query($conn , $sql);
                        $num = mysqli_num_rows($result);
                        if($num == 1){
                            while($row = mysqli_fetch_assoc($result)){
                                if(password_verify($password , $row['password'])){
                                    session_start();
                                    $_SESSION['user'] = $username;
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['subject_id'] = $subject_id;
                                    $_SESSION['onetimetest'] = false;
                                   
                                    header('location:onetimetest.php');
                                }
                                else{
                                    $showalertlogin = true;
                                }
                            }
                        }
                        else{
                            $showerrorlogin = true;
                        }
                    }
                    else{
                        $error = true;
                    }
                }
            
        

    }

// signup post method from here
       
    if(isset($_POST['signup'])){
                $servername ="localhost";
                $username = "root";
                $password ="";
                $database ="onlinequiz";
                $conn = mysqli_connect("localhost","root","","onlinequiz");
                if(!$conn){
                    die(mysqli_error($conn));
                }
            
                $username= $_POST['username'];
                $pass = $_POST['password'];
                $cpass = $_POST['cpassword'];
               // $subject_id = $_POST['subject_id'];
               $existsql = "SELECT * FROM `student` WHERE username ='$username'";
               $result = mysqli_query($conn , $existsql);
               $numExitRows = mysqli_num_rows($result);
               if($numExitRows > 0 ){
                   $showalert= true;
               }
                else{
                    if($pass == $cpass &&  $username !="" ){
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $sql ="INSERT INTO `onlinequiz`.`student` VALUES ('$username', '$hash', '$cpass')";
                        $result = mysqli_query($conn , $sql);
                        if($result){
                            $showerror = true;
                        }
                    }
                    else{
                        $var = true;
                    }
                }
            }
        
    
?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login_signup.css">
    <title>student section</title>
 <style>
     #head{
        margin-top: 3%;
     }
     .page input{
    border: solid;
    border-radius:28px;
    border-style: inset;
    }
    .signup {
    float: left;
    margin: 10%;
    padding-left: 10%;
    padding: 2%;
   border:none;
   font-weight:500px;
}
.login {
    float: right;
    margin: 10%;
    padding-right: 10%;
    padding: 2%;
   border: none;
   font-weight:500px;
}
     body{
        font-family: ui-monospace;
        background :url(../img/img4.jpg);
        background-size:cover;
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
            background-color: lightgreen;
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
<?php require 'nav.php' ; ?>
    <div class="scroll">
        <marquee behavior="scroll" direction="left" style="font-size: 23px;">
        Welcome to our online examination website , please sign up first and then login here then your test start .NOTE:- please give correct subject_id then your paper start.</marquee>
  </div>
<?php
if($showerror == true){
   echo '<script>alert("You successfully signup now login to Your accunt,Thank you.")</script>';
 }

if($showalert){
  echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  Error, Username Already Exists.
  </div>
</div>';
}

if($var){
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Error, keep password and confirm password equal or username not be a blank.
    </div>
  </div>';
  }

  if($showerrorlogin){
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Error, Username does not exist.
    </div>
  </div>';
  }


  if($showalertlogin){
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Error,Please Check your password .
    </div>
  </div>';
  }

  if($error){
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
    Error,Please Check your Subject id.
    </div>
  </div>';
  }

  
?>


    <h1 id="head">Student Section</h1>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="page">
    <div class="signup">
        <form id="form" class=box action="login_signup.php" method="post">
                <h2 >SIGN UP</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">USERNAME</label>
                    <input  name ="username" maxlength="255" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                    <div id="emailHelp" class="form-text"> Never share your password with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" >Password</label>
                    <input  name ="password" maxlength="255" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" > confirm Password</label>
                    <input  name ="cpassword" maxlength="255" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter confirm password">
                </div>

                <br>
                <center><button name="signup" type="submit" class="btn" >signup</button></center>
                <br>
        </form>
    </div>









 
    <div class="login">   
        <form  action="login_signup.php" class="box" method="post">
            <h2 >LOGIN </h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">USERNAME</label>
                <input placeholder="Enter username" name="user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input placeholder="Enter password" name ="pass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Subject_id</label>
                <input placeholder="Enter Subject_id" name ="subject_id" type="password" class="form-control" id="exampleInputPassword1">
            </div>
           
            <center><button name="login" type="submit" class="btn">Login</button></center>
        </form>
    </div>    
</div>




  </body>
</html>