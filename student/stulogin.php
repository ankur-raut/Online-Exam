<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
// this page not use this page not use// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use


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
                    header('location:dashboard.php');
                }
                else{
                    $showerror = true;
                }
            }
        }
    }

}
?>