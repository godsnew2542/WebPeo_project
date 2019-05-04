<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>
        <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script language="javascript">
        function check() {
            if (!(document.login.email.value == "" &&
                    document.login.password.value == "")) {
                return confirm('คุณแน่ใจแล้วใช่ไหม');
            }
        }
    </script>
    <style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>

    </head>
    <body onload="myFunction()" style="margin:0;">
    <div id="loader"></div>



    <?php
  require('db.php');
  session_start();

  if (isset($_SESSION['User'])) {
    ?>
     <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo '&nbsp' . '&nbsp' . $_SESSION['User'] ?></a>
        </div>
        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Homepage.php">Homepage</a></li>
            <li><a href="History.php">History</a></li>
            <li><a href="logout.php?logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>
    <div style="display:none;" id="myDiv" class="animate-bottom">
  <h1 class="text text-primary">Success!!</h1>
  <h3 class="text text-primary">Thank you for choosing Airplane Modelling!!! <i class="fas fa-plane-departure"></i></h3>
  <br><br><br>
  <p>Back to <a href="Homepage.php">Homepage</a></p>
</div>
    
    <div class="text-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<?php
  require('db.php');
 
  if($_SESSION['class']=="economy"){
    $sql = 'INSERT into reserve_flight values
    ("","'.$_SESSION['User_ID'].'",
              "'.$_POST['FlightNo'].'",
              "'.$_POST['RFname'].'",
              "'.$_POST['RLname'].'",
              "Economy",
              "'.$_POST['Adult'].'",
              "'.$_POST['child'].'",
              "'.$_POST['price'].'",
              "'.date('Y-m-d H:i:s').'",
              "'.$_POST['TrDate'].'")';
    
  }else if($_SESSION['class']=="business"){
    $sql = 'INSERT into reserve_flight values
    ("","'.$_SESSION['User_ID'].'",
              "'.$_POST['FlightNo'].'",
              "'.$_POST['RFname'].'",
              "'.$_POST['RLname'].'",
              "Business",
              "'.$_POST['Adult'].'",
              "'.$_POST['child'].'",
              "'.$_POST['price'].'",
              "'.date('Y-m-d H:i:s').'",
              "'.$_POST['TrDate'].'")';
  }

  $result = mysqli_query($connect, $sql);    
     
        mysqli_close($connect);
  
?>

<?php
      } else {

  header("location:login.php");
}
?>
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
