<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- time -->
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
            <li><a href="#">Homepage</a></li>
            <li><a href="History.php">History</a></li>
            <li><a href="logout.php?logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br> <br>
    <form name="registration" action="Flight.php" method="post">
      <h1>Homepage</h1>
      
      <!-- ตกแต่ง -->
      <div>
      Flight From <select name="Flight_From">
        <?php
        $sql = 'SELECT distinct FlightFrom FROM flight order by FlightFrom asc';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
          echo mysql_error() . '<br>';
          die('Can not access database!');
        } else {
          echo '<option value="" selected>----</option>';

          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=';
            while (list($key, $value) = each($row)) {
              echo $value;
              echo '>';
              echo $value;
              echo '</option>';
            }
          }
        }
        ?>
        <br>
      </select>

      <br><br>
      Flight To <select name="Flight_To">
        <?php
        $sql = 'SELECT distinct FlightTo FROM flight order by FlightTo asc';
        $result_1 = mysqli_query($connect, $sql);

        if (!$result_1) {
          echo mysql_error() . '<br>';
          die('Can not access database!');
        } else {
          echo '<option value="" selected>----</option>';
          while ($row = mysqli_fetch_assoc($result_1)) {
            echo '<option value=';
            while (list($key, $value) = each($row)) {
              echo $value;
              echo '>';
              echo $value;
              echo '</option>';
            }
          }
        }
        ?>
        <br>
      </select>
      <br><br>


      จำนวนผู้โดยสาร <br> 
      <?php //ห้ามเกิน9 คน ?>
                          
      ผู้ใหญ่ : <input name="Adult" type="text" placeholder="" required pattern="[\d0-9]{1}"> <br>
      เด็ก : <input name="child" type="text" placeholder="" required pattern="[\d0-9]{1}"> <br>

      วันออกเดินทาง
      <input class="datepicker" width="200" placeholder="04/18/2019" required>
      <script>
        $('.datepicker').datepicker({
          uiLibrary: 'bootstrap3'
        });
      </script>

<!-- TGทำต่อ -->ชั้นที่นั่ง
      <select name="class">
        <option value="" selected>-------</option>
        <option value="economy">Economy</option>
        <option value="business">Business</option>
      </select>
      <br>

        <label for="RFname">ชื่อผู้จอง</label>
       <input type="text" name="RFname">

       <label for="RFname">นามสกุลผู้จอง</label>
       <input type="text" name="RLname">
       <br>

      <button type="submit" name="Search">Search</button> <br> <br>

    </div>
    
    </form>
    


  <?php
} else {
  header("location:login.php");
}
?>

</body>

</html>