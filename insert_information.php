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
    <h1>insert_information</h1>

  <?php

    echo '<form method="post" action="confirm_report.php" name="frmInsert">';

    $sql = 'select * from flight where FlightNo = "'.$_POST['Flight'].'"';
    $result = mysqli_query($connect, $sql);

    if($_SESSION['class'] == "economy"){

      $_SESSION['class'] = "economy";
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
          echo '<input type="hidden" name="flight" value="'.$row['FlightNo'].'">';
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
        echo '<input type="hidden" name="flight" value="'.$row['FlightNo'].'">';
         }
        }
      
?>

   <!-- <h1>Information</h1> -->
      <h1>ข้อมูลผู้จอง </h1>  <br>
      <label for="RFname">ชื่อผู้จอง</label>
      <input type="text" name="RFname">
      <br>
      <label for="RLname">นามสกุลผู้จอง</label>
      <input type="text" name="RLname">
      <br><br>

      ผู้ใหญ่  
      <select name="Adult">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>(อายุ &gt; 14 ปี)<br>
      เด็ก  &nbsp&nbsp
      <select name="child">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>(3-14 ปี)<br>
      <br><br>

     วันที่เดินทาง
     <input type="date" name="TrDate">
     
      <input type="submit" name="next" value="Next">

    </form>

<?php
      } else {

  header("location:login.php");
}
?>

</body>

</body>
</html>