<!doctype html>
<html lang="en">
<head>
  <title>Homepage</title>
  <!---Required meta tags--->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!---Bootstrap CSS--->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!---time--->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Itim|Kanit|PT+Sans|Prompt|Raleway|Slabo+27px|Taviraj" rel="stylesheet">
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
        <?php echo "<font color=red><b>Welcome</b></font>".'<br>'.$_SESSION['User'] ?>
      </a>
      <!---navbar button--->
      <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!---navbar link--->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-md-5 ml-auto">
          <?php echo '<a href="#">Homepage</a>'; ?> &emsp;
          <?php echo '<a href="History.php">History</a>'; ?> &emsp;
          <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div><!---close navbar link--->
    </div><!---close navbar--->
    <!---Homepage--->
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-center1">Homepage</h1>
        <br>
        Flight From 
          <?php
          echo '<select name="Flight_From">';
          $sql = 'SELECT distinct FlightFrom FROM flight order by FlightFrom asc';
          $result = mysqli_query($connect, $sql);
          if (!$result) {
            echo mysql_error().'<br>';
            die('Can not access database!');
          }else{
            echo '<option value="" selected>-------</option>';
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value=';
              while (list($key, $value) = each($row)) {
                echo $value.'>'.$value.'</option>';
              }
            }
          }
          echo '</select>';
          ?>
        <br><br>
        Flight To 
          <?php
          echo '<select name="Flight_To">';

          $sql = 'SELECT distinct FlightTo FROM flight order by FlightTo asc';

          $result_1 = mysqli_query($connect, $sql);
          if (!$result_1) {
            echo mysql_error() . '<br>';
            die('Can not access database!');
          
          }else{
            echo '<option value="" selected>-------</option>';
            while ($row = mysqli_fetch_assoc($result_1)) {

              echo '<option value=';
              while (list($key, $value) = each($row)) {
                echo $value.'>'.$value.'</option>';
              }
            }
          }
          echo '</select>';
          ?>
        <br><br>
      ชั้นที่นั่ง
      <select name="class">
        <option value="" selected>--------</option>
        <option value="economy">Economy</option>
        <option value="business">Business</option>
      </select>
      <br><br>
      <button type="submit" name="Search">Search</button>
      </div>
      <div class="col-md-3"> </div>
    
    <?php
    } else {
      header("location:login.php");
    }
    ?>
</form>
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
</body>
</html>
