<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
    
    $showalert = false;
    $result = false;
  // $servername ="localhost";
  // $username = "root";
  // $password ="";
  // $database ="signup";
  // $conn = new mysqli("localhost", "root", "", "signup");
  // if($conn){
  //     echo "database coneected";
  // }
  // mysqli_select_db($conn,"signup");
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      require_once "learn.php";
      $question_id =$_POST['question_id'];
        $question =$_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $answer  = $_POST['answer'];
        $sql = false;
       
        $table = $_SESSION['subject_id'];
       $sql = "INSERT INTO `onlinequiz`.`$table` VALUES ('$question_id','$question', '$option1', '$option2', '$option3', '$option4', '$answer')";
       $result = mysqli_query($conn , $sql) or die( mysqli_error($conn));; 
       if($result){
          $showalert = true;
          //$count = $count + 1;
          //echo "inserted successful";
         // $_SESSION['question_id'] = $question_id;
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
      <link rel="stylesheet" href="test.css">
    <title>Test</title>
   <style>
     body{
    background:url(img/img5.jpg);
    background-size:cover;  
    color:black;
    font: weight 700px;
    }
    #form input{
                border: solid;
              border-radius:28px;
              border-style: inset;
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
    <?php require "nav.php" ?>
<?php
    if($showalert){
 echo '<script>alert("You successfully added question ,Thank you.")</script>';
}
?>

   <div class="main">
  <h2>Add questions</h2>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
     

<div class="form">
    <form  id="form" action="test.php" method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Question_id</label>
    <input placeholder="enter question_id" name="question_id" type="varchar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Enter the question id </div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Question</label>
    <input placeholder="enter question" name="question" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Add question here in our test.</div>
  </div>
  <div class="option">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option 1</label>
    <input placeholder="enter option1" name="option1" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option2</label>
    <input placeholder="enter option2" name ="option2" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option 3</label>
    <input placeholder="enter option3"name ="option3" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option 4</Option></label>
    <input placeholder="enter option4"name ="option4" type="text" class="form-control" id="exampleInputPassword1">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Answer</Option></label>
    <input placeholder="enter answer_id For.ex 1/2/3/4"name ="answer" type="varchar" class="form-control" id="exampleInputPassword1">
  </div>
  <center><button type="submit" class="btn ">Submit</button></center>
</form>
</div>
</div>
</div> 
  </body>
</html>