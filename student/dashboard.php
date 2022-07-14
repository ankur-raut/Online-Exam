<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login_signup.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
    <style>
        body{
            background :url(../img/img3.jpg);
        background-size:cover;
        }
        ol {
    margin: auto;
    margin-left: 23%;
    margin-right: 20%;
    margin-top: 6%;
    padding-top: 2%;
    padding-bottom: 2%;
    font-size: 20px;
    background-color: ghostwhite;
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
           font-size:25px;
       }
       .middle{
        
       }
    </style>
 

<script type="text/javascript">
        function timeout(){
            
            var minute = Math.floor(timeLeft/60);
            var second = timeLeft%60;
           
            if(timeLeft<=0){
                clearTimeout(tm);
               // document.getElementById("form").submit();
                document.getElementById('myButton').removeAttribute('disabled');
            }
            else{
                document.getElementById("time").innerHTML=minute +":"+second;
                
            }
            timeLeft--;
           
            var tm = setTimeout(function(){timeout()},1000);
        }
    </script>

<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
</script> 


</head>
<body onload="timeout()">
    <?php  require "nav.php"; ?>
    <div class="scroll">
<marquee behavior="scroll" direction="left">
  NOTE: Please read the instructions carefully then start exam. </marquee>
  </div>
    <div class ="container my-3">
<div class="alert alert-success " role="alert" >
  <h4 class="alert-heading">Welcome ,<?php echo $_SESSION['user'] ?> </h4>
  <p>Hi ,You are login through <?php echo $_SESSION['user'] ?> username.  </p>
  <hr>
  <p class="mb-0">Welcome to our online exam website .if you want to logout then use this link <a href="../logout.php">Logout</a></p>
</div>
</div>
<div class="middle">
   <center style="font-size:30px;"><b> INSTRUCTIONS</b></center>
       <ol>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ut assumenda deserunt illo, ratione quam iste natus obcaecati dolores culpa facilis error, ea, officiis nisi doloremque laboriosam labore dolore temporibus!</li>
        </ol><br><br>
    <div class="timer">
       <center> <script type="text/javascript">
            var timeLeft = (1/5)*60;
        </script>    
        <div id="time" style="font-size: 40px;" >timeout</div></h2>
    </div></center>
        <form action="quiz.php" id="form">
        <br><center><button disabled id="myButton"  class="btn btn-primary">START QUIZ</button></center>
      <br><br><br>  </form>
</div>


</body>
</html>