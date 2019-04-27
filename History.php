<html>

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
            <li><a href="#">History</a></li>
            <li><a href="logout.php?logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1>History</h1>
    <?php
    $sql = "select * from reserve_flight where User_ID = '" . $_SESSION['User_ID'] . "' ";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
      echo mysql_error() . '<br>';
      die('Can not access database!');
    }else if(mysqli_num_rows($result) == 0){
      echo "ไม่มีประวัติของคุณ";
    } else {

      while ($row = mysqli_fetch_assoc($result)) {
        echo 'FirstName: '. $row['RFname'] .'<br>';
        echo 'LastName: '.$row['RLname'].'<br>';
        echo 'Class: '.$row['Class'].'<br>';
        echo 'Price: '.$row['Price'].'<br>';
        echo 'Date reserve: '.$row['Date_reserve'].'<br>';
        echo 'Trv date: '.$row['Trv_date'].'<br>';
      }
    }
  } else {
    header("location:login.php");
  }
  ?>
</body>
</html>