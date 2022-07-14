<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="welcome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Welcome ,<?php echo  $_SESSION['username'] ?></title>
<style>
 body{
      background:url(img/img16.jpg);
      background-size:cover;    
  }
  .middle{
    display : flex;
    flex-direction : column;
  }
  .intructions {
    padding: 4%;
    padding-left: 15%;
    padding-right: 15%;
    margin: 2%;
    margin-top: 2%;
    font-size: 22px;
    font-style: italic;
}
#int{
  text-align: center;
  font-size:35px;
  padding: 
}
#head {
    margin-left: 4%;
    margin-top: 0%;
    margin-bottom: 5%;
    /* position: relative;
  animation-name: example;
  animation-duration: 3s;  
  animation-fill-mode: forwards; */
}
.btn1 {
    align-items: center;
    padding: 5%;
    padding-top: 0%;
    margin-left: 40%;
    margin-right: 30%;
}
 

</style>




</head>
<body>
<?php require 'nav.php' ?>


<div class ="container my-3">
<div class="alert alert-success " role="alert" >
  <h4 class="alert-heading">Welcome ,<?php echo $_SESSION['username'] ?> </h4>
  <p>Hi ,You are login through <?php echo $_SESSION['username'] ?> username.  </p>
  <hr>
  <p class="mb-0">Welcome to our online exam website .if you want to logout then use this link <a href="logout.php">Logout</a></p>
</div>
</div>


    <div class="main">
          <h1 id="head">Hello , <?php echo $_SESSION['username'] ?></h1>
          <h2 id="int">Instructions</h2>
    </div>
    <div class="middle">
          <div class = "intructions">
          <ul>
              <li> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid voluptatem tempora omnis rem et cumque, beatae reiciendis, ea ad pariatur repellat quisquam, deleniti eveniet nihil accusantium maiores atque corrupti voluptatum.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint tempora reiciendis, iusto alias cumque rem error? Porro quibusdam modi quia officiis dolores. Deleniti quae dolore placeat! Nostrum ratione beatae dolor.</li>
          </ul>
          <h2>Please read all instruction carefully</h2> <br>
          </div>
        
        </div>
        
</body>
</html>