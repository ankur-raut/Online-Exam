<?php
$loggedin = false;
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    $loggedin= true;
  }
  // echo'<style> 
  // @keyframes example {
  //   from {top: 0px;}
  //   to {top: 20px; }
  // }
  // .navbar{
  // position: relative;
  // animation-name: example;
  // animation-duration: 3s;  
  // animation-fill-mode: forwards;}
  // </style>';
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
   <h4>Welcome , Student</h4>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>';

      if($loggedin == true){
      echo'<li class="nav-item">
        <a class="nav-link" href="signup.php">sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student/login_signup.php">Student Section</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" id="navbar" role="button">
          Admin login
        </a>
      </li>';
    }
     if($loggedin == false){
      echo '<li class="nav-item">
        <a class="nav-link" href="logout.php" id="navbar" role="button">
          logout
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="test.php">Add questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="table.php">questions table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="result.php">Result table</a>
      </li>';
     }
      echo '</ul>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</div>
</nav>';


?>