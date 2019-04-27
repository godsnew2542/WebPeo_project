<<<<<<< HEAD
<<<<<<< HEAD
<html>
<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Itim|Kanit|PT+Sans|Prompt|Raleway|Slabo+27px|Taviraj" rel="stylesheet">
</head>
<body>
    

<?php
  require('db.php');
  session_start();

  if (isset($_SESSION['User'])) {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
        <?php echo "Welcome" . '&nbsp' . '&nbsp' . $_SESSION['User'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-md-5 ml-auto">
          <?php echo '<a href="Homepage.php">Homepage</a>'; ?> &nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo '<a href="#">History</a>'; ?> &nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div>
    </nav>
    <h1>History</h1>
    <?php
    $sql = "select * from reserve_flight where User_ID = '".$_SESSION['User_ID']."' ";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
      echo mysql_error() . '<br>';
      die('Can not access database!');
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        while (list($key, $value) = each($row)) {
          echo $value;
        }
      }
    }
} else {
  header("location:login.php");
}
?>
</body>
=======
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

>>>>>>> 22cf520e94de9d155dfae6a7176d1f10d53310c2
</html>