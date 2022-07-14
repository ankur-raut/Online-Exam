<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
 $conn = new mysqli("localhost","root","","onlinequiz");
    if(!$conn){
      die(mysqli_error($conn));
    }
   $showalert = false; 
  $id = $_GET['updateid'];
  $table = $_SESSION['subject_id'];
  $sql = "select * from `onlinequiz`.`$table` where qu_id='$id'";
  $result=mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);

  $question_id =$row['qu_id'];
  $question = $row['question'];
  $option1 = $row['option1'];
  $option2 = $row['option2'];
  $option3 = $row['option3'];
  $option4 = $row['option4'];
  $answer = $row['answer'];

  if(isset($_POST['submit'])){
    $question_id =$_POST['question_id'];
    $question =$_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer  = $_POST['answer'];

    $sql ="update `onlinequiz`.`$table` set  qu_id='$id' ,question='$question'
    ,option1='$option1',option2='$option2',option3='$option3',option4='$option4'
    ,answer='$answer' where qu_id='$id' ";
    $result=mysqli_query($conn,$sql);
    if($result){
      $showalert = true;
    }
    else{
      die(mysqli_error($conn));
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
   
  </head>
  <body>
     <?php require "nav.php" ?> 
<?php
    if($showalert){
 /*echo '<script>alert("You successfully updated question ,Thank you.")</script>';*/
 header('location:table.php');
}
?> 

   <div class="main">
  <h2> Update questions</h2>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
     

<div class="form">
    <form  id="form"  method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Question_id</label>
    <input name="question_id" type="varchar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
    value= " <?php echo $question_id; ?>">
    <div id="emailHelp" class="form-text">Enter the question id </div>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Question</label>
    <input  name="question" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
    value="<?php echo $question; ?>">
    <div id="emailHelp" class="form-text">Add question here in our test.</div>
  </div>
  <div class="option">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option 1</label>
    <input name="option1" type="text" class="form-control" id="exampleInputPassword1"
    value="<?php echo $option1; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option2</label>
    <input  name ="option2" type="text" class="form-control" id="exampleInputPassword1"
    value="<?php echo $option2; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option 3</label>
    <input name ="option3" type="text" class="form-control" id="exampleInputPassword1"
    value="<?php echo $option3; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Option 4</Option></label>
    <input name ="option4" type="text" class="form-control" id="exampleInputPassword1"
    value="<?php echo $option4; ?>">
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Answer</Option></label>
    <input name ="answer" type="varchar" class="form-control" id="exampleInputPassword1"
    value="<?php echo $answer; ?>">
  </div>
  <button name="submit" type="submit" class="btn btn-primary">update</button>
</form>
</div>
</div>
</div> 
  </body>
</html>