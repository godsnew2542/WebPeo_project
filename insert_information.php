<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Airplane Modelling</title>
      <!-- Bootstrap CSS -->
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
    .form-row {
      display:grid;
      grid-template-columns: auto auto auto auto; 
      text-align: center;     
    }
    .form-group{
      padding: 25px;
      font-size: 25px;
      text-align: center;
    }
    input[type=date] {
      width: 40%;
      padding: 12px 20px;
      margin: 15px 0;
      border: 2px solid Gainsboro;
      border-radius: 5px;
      font-size:20px;      
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
            <?php echo '<a href="#">History</a>'; ?> &emsp;
            <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div><!---close navbar link--->
    </div><!---close navbar--->
    <h1 class="text-center text-primary"><br>
      <i class="fas fa-book-open"></i> Your Book</h1><br>
<div style="border: 2px solid black">
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
               echo '<div class="form-group col-sm-12">';
                  echo $row['FlightNo'];
               echo '</div>';
               echo '<div class="form-group col-sm-12">';
                  echo 'Type: ';
                  echo $row['Type'];
               echo '</div>';
               echo '<div class="form-group col-sm-12">';
               echo 'From: ';
               echo $row['FlightFrom'];
               echo '</div>';
               echo '<div class="form-group col-sm-12">';
               echo 'To: ';
               echo $row['FlightTo'];
               echo '</div>';
          echo '</div>';

          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-10">';
               echo 'Distance: ';
               echo $row['Distance']; echo ' km.';
               echo '</div>';
               echo '<div class="form-group col-sm-7">';
               echo 'Arrive: ';
               echo $row['Arrive'];
               echo '</div>';
               echo '<div class="form-group col-sm-7">';
               echo 'Class: Economy';
               echo '</div>';
               echo '<div class="form-group col-sm-9">';
               echo 'Price:';
               echo $row['Eco_Price'];
               echo '</div>';
          echo '</div>';
          echo '</center>';
         
        }
        }else if($_SESSION['class'] == "business"){
          $_SESSION['class'] = "business";
         while($row = mysqli_fetch_assoc($result)){

          echo '<input type="hidden" name="flight" value="'.$row['FlightNo'].'">';
          echo '<center>';
          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-12">';
                  echo $row['FlightNo'];
               echo '</div>';
               echo '<div class="form-group col-sm-12">';
                  echo 'Type: ';
                  echo $row['Type'];
               echo '</div>';
               echo '<div class="form-group col-sm-12">';
               echo 'From: ';
               echo $row['FlightFrom'];
               echo '</div>';
               echo '<div class="form-group col-sm-12">';
               echo 'To: ';
               echo $row['FlightTo'];
               echo '</div>';
          echo '</div>';

          echo '<div class="form-row">';
               echo '<div class="form-group col-sm-10">';
               echo 'Distance: ';
               echo $row['Distance']; echo ' km.';
               echo '</div>';
               echo '<div class="form-group col-sm-7">';
               echo 'Arrive: ';
               echo $row['Arrive'];
               echo '</div>';
               echo '<div class="form-group col-sm-7">';
               echo 'Class: Business';
               echo '</div>';
               echo '<div class="form-group col-sm-9">';
               echo 'Price: ';
               echo $row['Business_Price'];
               echo '</div>';
          echo '</div>';
          echo '</center>';
         }
        }
      
?>
</div>
   <!-- <h1>Information</h1> -->
   <center><br>
    <h1 class="text text-primary">Information. </h1>  <br>

     <div class="input-group w-50">
       <div class="input-group input-group-lg">
        <span class="input-group-text">Name</span>
    
       <input type="text" name="RFname"  class="form-control" placeholder="First Name">
       <input type="text" name="RLname" class="form-control" placeholder="Last Name">
     </div></div>
<br>

      <label for="Adult">Adult&nbsp;&nbsp;</label>
      <select name="Adult" class="custom-select w-25">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>
      (Age &gt; 14 )<br>
      <br>

      <label for="child">Child&nbsp;&nbsp;</label>  
      <select name="child" class="custom-select w-25">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>(Age 3-14 )<br>
      <br>

     <label for="Trdate">Traveling Date</label>
     <input type="date" name="TrDate" >
     <input type="submit" class="btn btn-primary" name="next" value="Next">
    </center>
    </form>

<?php
      } else {

  header("location:login.php");
}
?>

</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
