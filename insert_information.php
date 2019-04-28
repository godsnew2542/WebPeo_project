<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    <h1>insert_information</h1>

  <?php

    $sql = 'select * from flight where FlightNo = "'.$_POST['Flight'].'"';
    $result = mysqli_query($connect, $sql);
    echo $_POST['Flight'];
    if($_SESSION['class'] == "economy"){
        while($row = mysqli_fetch_assoc($result)){
          echo $row['FlightNo'];
          echo '&nbsp;';
          echo $row['Type'];
          echo '&nbsp';
          echo $row['FlightFrom'];
          echo '&nbsp;';
          echo $row['FlightTo'];
          echo '&nbsp;';
          echo $row['Distance'];
          echo '&nbsp;';
          echo $row['Arrive'];
          echo '&nbsp;';
          echo $row['Eco_Price'];
        }
        }else if($_SESSION['class'] == "business"){
         while($row = mysqli_fetch_assoc($result)){

        echo $row['FlightNo'];
        echo '&nbsp;';
        echo $row['Type'];
        echo '&nbsp';
        echo $row['FlightFrom'];
        echo '&nbsp;';
        echo $row['FlightTo'];
        echo '&nbsp;';
        echo $row['Distance'];
        echo '&nbsp;';
        echo $row['Arrive'];
        echo '&nbsp;';
        echo $row['Business_Price'];
         }
        }
      } else {

  header("location:login.php");
}
?>

</body>

</body>
</html>