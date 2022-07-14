<?php



// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 


session_start();
$_SESSION['loggedin'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


<!-- <script>
  var elem = document.documentElement;
  function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  }
} 
</script> -->
<!-- <?php //if($_SESSION['loggedin']){ ?>
    <script> openFullscreen()</script>
<?php //} ?> -->

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
</head>
<!-- // this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages  -->

<body onload="timeout()">
    <h2>aditya sabde fullscreen mode</h2>
    
    <button id="btn1"> fullscreen</button>
    <button id="btn2">close</button>
    <!--event => onpageshow -->
    <script type="text/javascript">
        var btn1 = document.getElementById("btn1")
        var btn2 = document.getElementById("btn2")
        var e1 = document.documentElement;
        btn1.addEventListener("click",()=>{
            if(e1.requestFullscreen){
                e1.requestFullscreen();
            }
        })

        btn2.addEventListener("click",()=>{
            if(document.exitFullscreen){
                document.exitFullscreen();
            }
        })
    </script> 


 <!-- // this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages 
// this is rough work do not link with anyone pages  -->
<!-- // this page not use this page not use// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use
// this page not use this page not use -->

   <script type="text/javascript">
      var timeLeft = 1*60;
   </script>

   <div id="time" style="font-size: 50px;">timeout</div>
    <form action=".php" id="form"> 
        <input type="text">
        <input type="submit">
    </form>
</body>
</html>