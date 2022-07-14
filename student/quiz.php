<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login_signup.php");
  exit;
};

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="quiz.css">
  <title>Document</title>

  <script type="text/javascript">
        function timeout(){
            
            var minute = Math.floor(timeLeft/60);
            var second = timeLeft%60;
            if(timeLeft<=0){
                clearTimeout(tm);
                  document.getElementById("form").submit();
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

<style>
  body{
    background-color:white;
  }
  .btn {
    background-color: black;
    border: solid;
    border-radius: 13px;
    width: 200px;
    color:white;
  }
  .btn:hover{
  background: #2ecc71;
  }
  .head {
    clear: both;
    margin-left: 5%;
    background: white;
    margin-right: 8%;
}
</style>




</head>
<body onload="timeout()">

 
        <center><button id="btn1" class="btn btn-primary" > fullscreen</button></center>
            <script type="text/javascript">
                  var btn1 = document.getElementById("btn1")
                   var e1 = document.documentElement;
                  btn1.addEventListener("click",()=>{
                       if(e1.requestFullscreen){
                            e1.requestFullscreen();
                        }
                        else{
                          e1.exitFullscreen();
                        } 
                   })
             </script>
             
        <div class="head" ><h2 class="h2">Test  
          <script type="text/javascript">
              var timeLeft = 30*60;
          </script>    
         <div id="time" style="font-size: 40px; float:right" >timeout</div></h2></div>
        
            <div class="test">
          <form id="form" action="ans.php"  method="post">
                <?php 
                $table = $_SESSION['subject_id'];
                $sql = "select * from `onlinequiz`.`$table`";
                $result = mysqli_query($conn , $sql);
                    while( $row = mysqli_fetch_array($result)){
                      echo'<table>';
                      echo '<tr><th>Question_id: ' .$row{'qu_id'}.'</tr></th>' ;
                      echo '<tr><th>Question: ' .$row{'question'}.'</tr></th>' ;
                      //echo '<hr>';
                      if(isset($row{'option1'})){
                      echo '<tr><td><input class="form-check-input" type="radio" id="option1" name="'.$row{'qu_id'}.'" value="1"><label for="option1">option1</label> : ' .$row{'option1'}.'</tr></td>';
                      }
                      if(isset($row{'option2'})){
                      echo '<tr><td><input class="form-check-input" type="radio" id="option2" name="'.$row{'qu_id'}.'" value="2"><label for="option2">option2</label> : ' .$row{'option2'}.'</tr></td>';
                      }
                      if(isset($row{'option3'})){
                      echo '<tr><td><input class="form-check-input" type="radio" id="option3"name="'.$row{'qu_id'}.'" value="3"><label for="option3">option3</label> : ' .$row{'option3'}.'</tr></td>';
                      }
                      if(isset($row{'option4'})){
                      echo '<tr><td><input class="form-check-input" type="radio" id="option4" name="'.$row{'qu_id'}.'" value="4"> <label for="option4">option4</label> : ' .$row{'option4'}.'</tr></td>' ;
                      }
                      echo '<input checked="checked" style="display:none" class="form-check-input" type="radio" id="option4" name="'.$row{'qu_id'}.'" value="null">';
                      echo'<hr></table>';
                    
                    };
                ?>
               <center><br><input type="submit" class="btn btn-success" value="Submit Quiz"></center> 

          </form>
        </div>
 
</body>
</html>