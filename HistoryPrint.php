<!doctype html>
<html lang="en">
<head>
  <title>Airplane Modelling</title>
  <!---Required meta tags--->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!---รูป--->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!---Bootstrap CSS--->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!---navbar--->
  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
  <!---navbar button--->
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
  </style>
</head>
<body>
  <?php
  require('db.php');
  session_start();
  if (isset($_SESSION['User'])) {?>
      <!---navbar--->
      <div class="navbar navbar-light bg-lightnavbar navbar-expand-lg navbar-dark bg-dark">
      <!---navbar name--->
      <a class="navbar-brand" href="#">
        <?php echo $_SESSION['User'] ?>
      </a>
      <!---navbar button--->
      <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!---navbar link--->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-md-5 ml-auto">
          <?php echo '<a href="Homepage.php">Homepage</a>'; ?> &emsp;
          <?php echo '<a href="History.php">History</a>'; ?> &emsp;
          <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div><!---close navbar link--->
    </div><!---close navbar--->
    <div class="row"><!---ROW--->
      <div class="col-md-3"></div>
      <div class="col-md-6"><!---center--->
      <div class="row"><!---row ReDetail--->
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <?php
        $sql = 'select * from reserve_flight 
        INNER JOIN flight ON reserve_flight.FlightNo = flight.FlightNo 
        INNER JOIN user ON reserve_flight.User_ID = user.User_ID 
        where RID = '.$_POST['idp'].';';
        $result = mysqli_query($connect, $sql);
        if (!$result) {
          echo mysql_error().'<br>';
          die('Can not access database!');
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<br><br><table border="3" bordercolor="blue"><tr><td class="bg-primary"><br>';
            echo '<center>&nbsp&nbsp&nbsp<font size="23" class="text text-white"><b> 
                  <i class="fas fa-plane-departure"></i> 
                  Airplane Modelling</b></font>&nbsp&nbsp&nbsp</center>';
            echo '<br></td></tr><tr><td><br><br>';
            echo '&nbsp&nbsp&nbsp&nbsp<b>'.'Email'.'</b>&nbsp'. $row['Email'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'Telephone'.'</b>&nbsp'.$row['Telephone'].'&nbsp&nbsp&nbsp&nbsp<br><br>&nbsp&nbsp&nbsp&nbsp';
            echo '<b>'.'No'.'</b>&nbsp'.$row['FlightNo'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'From'.'</b>&nbsp'.$row['FlightFrom'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'To'.'</b>&nbsp'.$row['FlightTo'].'&nbsp&nbsp&nbsp&nbsp<br><br>&nbsp&nbsp&nbsp&nbsp';
            echo '<b>'.'FirstName'.'</b>&nbsp'.$row['RFname'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'LastName'.'</b>&nbsp'.$row['RLname'].'&nbsp&nbsp&nbsp&nbsp<br><br>&nbsp&nbsp&nbsp&nbsp';
            echo '<b>'.'Class'.'</b>&nbsp'.$row['Class'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'Price'.'</b>&nbsp'.$row['Price'].'&nbsp&nbsp&nbsp&nbsp<br><br>&nbsp&nbsp&nbsp&nbsp';
            echo '<b>'.'Adult'.'</b>&nbsp'.$row['adult_total'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'Child'.'</b>&nbsp'.$row['teen_total'].'&nbsp&nbsp&nbsp&nbsp<br><br>&nbsp&nbsp&nbsp&nbsp';
            echo '<b>'.'Date reserve'.'</b>&nbsp'. $row['Date_reserve'].'&nbsp&nbsp&nbsp';
            echo '<b>'.'Trv date'.'</b>&nbsp'.$row['Trv_date'].'<br><br>&nbsp&nbsp&nbsp&nbsp';
            echo '</td></tr></table><br><br>';
          }
        }
        echo '&nbsp&nbsp&nbsp<button class="btn btn-primary" onclick="myFunction()">Print this page</button>
              &nbsp&nbsp&nbsp<input name="Back" type="button" class="btn btn-primary" value=" Back"onClick="jascript:history.go(-1);">';
        ?>
        </div><div class="col-md-3"></div></div><!---close row ReDetail---></div><!---close center--->
      <div class="col-md-1"></div>
    </div><!---close ROW--->
  <?php
  } else {
    header("location:login.php");
  }
  ?>
</body>
<!---Button Print-->
<script>
function myFunction() {
  window.print();
}
</script>
</html>
