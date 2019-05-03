<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
    $(function(){
      $(".close-l-sidenav,.open-l-sidenav").on("click",function(){
          var toggleWidth = ($(".l-sidenav").width()==0)?250:0;
          $(".l-sidenav").width(toggleWidth);
      });
    });
  </script>
  <style>
    /*sidemenu ด้านซ้าย*/
    .l-sidenav {
        position: fixed; 
        z-index: 1040; 
        top: 0; 
        left: 0;    
        height: 100%; 
        width: 0; 
        overflow-x: hidden; 
    }   
    .text-center {
        text-align: center;
    } 
  </style>

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
    <h1 class="text-center text-primary">
      <i class="fas fa-book-open"></i> Your Book</h1>

  <?php

    echo '<form method="post" action="confirm_report.php" name="frmInsert">';

    $sql = 'select * from flight where FlightNo = "'.$_POST['Flight'].'"';
    $result = mysqli_query($connect, $sql);

    if($_SESSION['class'] == "economy"){

      $_SESSION['class'] = "economy";
        while($row = mysqli_fetch_assoc($result)){

          echo '<input type="hidden" name="flight" value="'.$row['FlightNo'].'">';
          echo '<center>';
          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-3">';
                  echo $row['FlightNo'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
                  echo 'Type: ';
                  echo $row['Type'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'From: ';
               echo $row['FlightFrom'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'To: ';
               echo $row['FlightTo'];
               echo '</div>';
          echo '</div>';

          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-3">';
               echo 'Distance: ';
               echo $row['Distance']; echo ' km.';
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'Arrive: ';
               echo $row['Arrive'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'Class: Economy';
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'Price';
               echo $row['Eco_Price'];
               echo '</div>';
          echo '</div>';
          echo '</center>';
         
        }
        }else if($_SESSION['class'] == "business"){
         while($row = mysqli_fetch_assoc($result)){

          echo '<input type="hidden" name="flight" value="'.$row['FlightNo'].'">';
          echo '<center>';
          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-3">';
                  echo $row['FlightNo'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
                  echo 'Type: ';
                  echo $row['Type'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'From: ';
               echo $row['FlightFrom'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'To: ';
               echo $row['FlightTo'];
               echo '</div>';
          echo '</div>';

          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-3">';
               echo 'Distance: ';
               echo $row['Distance']; echo ' km.';
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'Arrive: ';
               echo $row['Arrive'];
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'Class: Business';
               echo '</div>';
               echo '<div class="form-group col-sm-3">';
               echo 'Price: ';
               echo $row['Business_Price'];
               echo '</div>';
          echo '</div>';
          echo '</center>';
         }
        }
      
?>
   <!-- <h1>Information</h1> -->
   <center>
    <h1 class="text text-primary">Information. </h1>  <br>

     <div class="input-group">
       <div class="input-group-prepend">
        <span class="input-group-text">First and last name</span>
     </div>
       <input type="text" aria-label="RFname" class="form-control">
      <input type="text" aria-label="RLname" class="form-control">
    </div>
<br>

      <label for="Adult">Adult</label>
      <select name="Adult" class="custom-select custom-select-lg">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>
      (อายุ &gt; 14 ปี)
      <br>
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
      </center>
    </form>

<?php
      } else {

  header("location:login.php");
}
?>

</body>


</html>