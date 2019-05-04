<!doctype html>
<html lang="en">
<head>
  <title>Airplane Modelling</title>
  <!---Required meta tags--->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    .text-center {
        text-align: center;
    } 
  </style>
</head>
<body>
  <?php
  require('db.php');
  session_start();
  if (isset($_SESSION['User'])) {?>
    <form name="homepage" action="flight.php" method="post">
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
    <!---Homepage--->
    <div class="row"><!---ROW--->
      <div class="col-md-3"></div>
      <div class="col-md-6"><!---center--->
        <div class="row"><!---row Homepage--->
          <div class="col-md-3"></div>
          <div class="col-md-6"><!---center--->
            <h1>Flight Schedule</h1>
          </div><!---close center--->
          <div class="col-md-3"></div>
        </div><!---close row Homepage--->
        <div class="row"><!---row Flight schedule--->
        <div class="col-md-3"></div>
        <div class="col-md-6"><!---Flight schedule--->
        <?php
          $sql = 'SELECT distinct FlightFrom, FlightTo FROM flight';
          $result = mysqli_query($connect, $sql);
          if (!$result) {
            echo mysql_error().'<br>';
            die('Can not access database!');
          }else{
              echo '<table  border="1">';
              echo '<tr><td>'.'&nbsp<b>From</b>&nbsp'.'</td>';
              echo '<td>'.'&nbsp<b>---></b>&nbsp'.'</td>';
              echo '<td>'.'&nbsp<b>To</b>&nbsp'.'</td>'.'</tr>';
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>';
		          echo '<td>'.'&nbsp'.$row['FlightFrom'].'&nbsp'.'</td>';
		          echo '<td>'.'&nbsp<b>---></b>&nbsp'.'</td>';
		          echo '<td>'.'&nbsp'.$row['FlightTo'].'&nbsp'.'</td>';
		          echo '</tr>';
            }echo '</table>';
          }
          echo '</select>';
          ?>
          <br><b>Back to Home Page</b>
          <br>Click here to <a href='Homepage.php'>Homepage</a>
        </div><!---close Flight schedule--->
        <div class="col-md-3"></div>
      </div><!---close row Flight schedule--->
      <div class="col-md-3"> </div>
      </div><!---close ROW--->
    <?php
    } else {
      header("location:login.php");
    }
    ?>
</form>
</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
