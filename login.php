<?php
  
   //$result = false;
   $login = false;
   $showerror =false;
   if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "learn.php";
    $username = $_POST['username'];
    $password =$_POST['pass'];
    $subject =$_POST['subject'];
    $subject_id =$_POST['subject_id'];
    //before using hash value  
   // $sql = "select * from `signup`.`signup` where password='$password'AND username='$username'" ;
    // after using hash fucntion 
    $sql = "SELECT * from `onlinequiz`.`signup` where username ='$username' and subject_id='$subject_id' " ;
    $result = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      while($row = mysqli_fetch_assoc($result)){
         if(password_verify($password , $row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['subject_id']=$subject_id;
            header("location: wlcome.php");
         }
         else{
          $showerror = true;
        }
      }
      
    }
    else{
      $showerror = "please check your credential";
    }
   
  }


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
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
#form {
  padding: 15%;
  padding-top: 1%;
  margin: 5%;
  margin-left: 0%;
  margin-right: 41%;
  color:white;
  font-weight:500px;
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
            #form input{
                border: solid;
              border-radius:28px;
              border-style: inset;
            }
    </style>
</head>
<body>
<?php require 'nav.php' ?>



<div class="scroll">
<marquee behavior="scroll" direction="left">
  Welcome to our online examination website , please hello Admin login here first for entering.</marquee>
  </div>


<?php
if($login){
  echo '<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    You login successfully , Thank you.
  </div>
</div>';
}
if($showerror){
  echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    please check your credencials.
  </div>
</div>';
}


?>

 <form id="form" action="login.php" method="post">
 <h2 id="login" style="color:white; weight: 300px;"><b>Login</b></h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">USERNAME</label>
    <input  placeholder="Enter username" name ="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
    <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name ="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Subject</label>
    <input name ="subject" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter subject">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">subject_id</label>
    <input name ="subject_id" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter subject_id">
  </div>
  
 <center> <button  type="submit" class="btn">Submit</button></center>
</form>
</body>
</html>