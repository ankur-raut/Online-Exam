
<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
// require_once "learn.php";
    // $qu_id = $_SESSION['question_id'];
    // $sql = "DELETE FROM `questions` WHERE qu_id="$qu_id";"


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .table{
            /* padding:4%; */
            margin :1%;
        }

      
  .main {
    /* padding: 8%; */
    margin: 5%;
    padding-top: 1%;
}
    </style>
    <title>Tables</title>
  </head>
  <body>
      <?php require "nav.php" ;?>
<div class="main">
    <h1>Questions in test</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
   <div class="table">

  <table class="table caption-top">
  <caption>List of questions</caption>
  <thead>
    <tr>
      <th scope="col">srno.</th>
      <th scope="col">Questions</th>
      <th scope="col">Option1</th>
      <th scope="col">Option2</th>
      <th scope="col">Option3</th>
      <th scope="col">Option4</th>
      <th scope="col">Ans_id</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>

    <?php 
      //database connection
       include "learn.php";
       //record fetch from database
       $table = $_SESSION['subject_id'];
      
       $sql = "SELECT * from `onlinequiz`.`$table`";        
       $record = mysqli_query($conn,$sql);
  //fetch array record from variable data variable
  if($record){
       while( $data = mysqli_fetch_array($record)){
        $qu_id =  $data['qu_id'];
        $question = $data['question'];
        $option1 =$data['option1'];
        $option2 =$data['option2'];
        $option3 =$data['option3'];
        $option4 = $data['option4'];
        $answer = $data['answer'];
      echo '
        <tr>
             <th >'.$qu_id.'</th>
                <td>'.$question.'</td>
                <td>'.$option1.'</td>
                <td>'.$option2.'</td>
                <td>'.$option3.'</td>
                <td>'.$option4.'</td>
                <td>'.$answer.'</td>
                <td><button class="btn btn-primary"><a href="update.php?updateid='.$qu_id.'" class="text-light">Update</a> </button>
                <button class="btn btn-danger"><a href="delete.php?deleteid='.$qu_id.'" class="text-light">Delete</a> </button>
              </td>
         </tr>'; 
       }
      }

?>
 
  
     </table>
  </div> 
</div>
  </body>
</html>
