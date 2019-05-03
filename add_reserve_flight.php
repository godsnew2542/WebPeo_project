<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>
        <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
    </head>
    <body>
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
    <h1>thank you</h1>
    
    
<?php
  require('db.php');
 
  if($_SESSION['class']=="economy"){
    $sql = 'INSERT into reserve_flight values
    ("","'.$_SESSION['User_ID'].'",
              "'.$_POST['RFname'].'",
              "'.$_POST['RLname'].'",
              "Economy",
              "'.$_POST['Adult'].'",
              "'.$_POST['child'].'",
              "'.$_POST['price'].'",
              "'.date('Y-m-d').'",
              "'.$_POST['TrDate'].'")';
    
  }else if($_SESSION['class']=="business"){
    $sql = 'INSERT into reserve_flight values
    ("","'.$_SESSION['User_ID'].'",
              "'.$_POST['RFname'].'",
              "'.$_POST['RLname'].'",
              "Business",
              "'.$_POST['Adult'].'",
              "'.$_POST['child'].'",
              "'.$_POST['price'].'",
              "'.date('Y-m-d').'",
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
</body>
</html>