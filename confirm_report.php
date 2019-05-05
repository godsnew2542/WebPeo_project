<html>

<head>
    <title>Airplane Modelling</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!---Bootstrap CSS--->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
    .container{
      margin:auto;
      text-align: left;
      border:5px solid DodgerBlue ;
      font-size:20px;
      
    } 
    .airplane{
      text-align: left;
      color:white;
      position: relative;
      top: 2px;
      border-bottom-style:solid;
      border-color:DodgerBlue;
    }
    table, td, th {
      border: 1px solid black;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      text-align: center;
    }

    td {
      height: 50px;
      vertical-align: bottom;
      text-align: center;
    }

    button{
      float: none;
    }
  </style>
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
          <?php echo '<a href="History.php">History</a>'; ?> &emsp;
          <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div><!---close navbar link--->
    </div><!---close navbar--->
<br>
    <div class="container">
    <form method="post" action="add_reserve_flight.php">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous">

<br><div class="airplane">
<a class="fas fa-plane-departure fas fa-2x" href="#"> Airplane Modelling</a></i><br>
    <br></div>

<div>
</head>
<body><br>
<?php
    
    define("Bthank", "Thank you for choosing Airplane!!!");
    define("Bdetail", "YOUR BOOKING DETAILS");
    define("Bdate", "Booking Date : ");
    define("BPassg", "Name of Passenger(s) : ");
    define("travel", "YOUR TRAVEL ITINERARY");
    define("service", "SERVICES");

   

    function details(){
        
        echo '<div class="row">';
        echo '<div class="col">';

        echo '<div class="col-12">';
        echo '<p>'.'<b>'.'Dear Khun '.$_POST['RFname'].','.'</b>'.'</p>';
        echo '<input type="hidden" name="RFname" value="'.$_POST['RFname'].'">';
        echo '<p>'.Bthank.'</p>'.''.'</div>'.'</div>'.'</div>'.'</div>'.'<br>';

        echo '<div class="row">';
        echo '<div class="col">';

        echo '<div class="col-12">';
        echo '<p>'.'<b>'.Bdetail.'</b>'.'</p>';

        echo '<div class="col-sm-12">'.Bdate;
        echo  date('Y-m-d').'</div>';    //วันที่ออกเดินทาง
        

        echo '<div class="col-sm-12">';
        echo  BPassg.$_POST['RFname'].'&nbsp;'.$_POST['RLname'];
        echo '<input type="hidden" name="RLname" value="'.$_POST['RLname'].'">'.'</div>';//ชื่อผู้เดินทาง
        echo '</div>';
        echo '</div>';
        echo '</div>'.'<br>';
    }

    function itinerary(){
        require('db.php');
        $sql = 'select * from flight
                where FlightNo = "'.$_POST['flight'].'"';
        $result = mysqli_query($connect, $sql);

        if(!$result){
            echo mysqli_error().'<br>';
        }else{
        echo '<div>';
        echo '<div class="row">';
        echo '<div class="col">'; 
        echo '<div class="col-sm-12">';
        echo '<p>'.'<b>'.travel.'</b>'.'</p>';
        echo '<table border="1" cellpading="0" cellspacing="0">';
        echo '<tr>'.'<th>'.'Date'.'</th>';//วันที่เดินทาง
        echo '<th>'.'Flight No'.'</th>';
        echo '<th>'.'AID'.'</th>';
        echo '<th>'.'Type'.'</th>';
        echo '<th>'.'Class'.'</th>';
        echo '<th>'.'Departing'.'</th>';
        echo '<th>'.'Arriving'.'</th>';
        echo '<th>'.'Price'.'</th>'.'</tr>';

        if($_SESSION['class'] == "economy"){

          $_SESSION['class'] = "economy";
            
          while($row = mysqli_fetch_assoc($result)){
            echo '<tr>'.'<td>'.$_POST['TrDate'];
            echo '<input type="hidden" name="TrDate" value="'.$_POST['TrDate'].'">'.'</td>';
            echo '<td>'.$row['FlightNo'];
            echo '<input type="hidden" name="FlightNo" value="'.$row['FlightNo'].'">'.'</td>';
            echo '<td>'.$row['AID'];
            echo '<input type="hidden" name="AID" value="'.$row['AID'].'">'.'</td>';
            echo '<td>'.$row['Type'];
            echo '<input type="hidden" name="Type" value="'.$row['Type'].'">'.'</td>';
            echo '<td>'.'Economy'.'</td>';
            echo '<td>'.$row['FlightFrom'];
            echo '<input type="hidden" name="FlightFrom" value="'.$row['FlightFrom'].'">'.'</td>';
            echo '<td>'.$row['FlightTo'];
            echo '<input type="hidden" name="FlightTo" value="'.$row['FlightTo'].'">'.'</td>';
            
            if($_POST['Adult']==1){
           $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else if($_POST['Adult']==2){
            $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else if($_POST['Adult']==3){
            $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else if($_POST['Adult']==4){
            $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else if($_POST['Adult']==5){
            $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else if($_POST['Adult']==6){
            $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else if($_POST['Adult']==7){
            $price = $_POST['Adult']* $row['Eco_Price'];
            echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
          }else{
            $price = $_POST['Adult']*0;
          }

          if($_POST['child']==1){
            $price += $_POST['child']*$row['Eco_Price'];
            echo '<input type="hidden" name="price" value="'.$price.'">';
            echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
          }else if($_POST['child']==2){
            $price += $_POST['child']*$row['Eco_Price'];
            echo '<input type="hidden" name="price" value="'.$price.'">';
            echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
          }else if($_POST['child']==3){
            $price += $_POST['child']*$row['Eco_Price'];
            echo '<input type="hidden" name="price" value="'.$price.'">';
            echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
          }else if($_POST['child']==4){
            $price += $_POST['child']*$row['Eco_Price'];
            echo '<input type="hidden" name="price" value="'.$price.'">';
            echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
          }else if($_POST['child']==5){
            $price += $_POST['child']*$row['Eco_Price'];
            echo '<input type="hidden" name="price" value="'.$price.'">';
            echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
          }else{
            $price += $_POST['child']*0;
            echo '<input type="hidden" name="price" value="'.$price.'">';
            echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
          }
            echo '<td>'.$price.'</td>'.'</tr>';
              
            
          }
        }else if($_SESSION['class'] == "business"){
          $_SESSION['class'] = "business";
         while($row = mysqli_fetch_assoc($result)){
          echo '<tr>'.'<td>'.$_POST['TrDate'];
          echo '<input type="hidden" name="TrDate" value="'.$_POST['TrDate'].'">'.'</td>';
          echo '<td>'.$row['FlightNo'];
          echo '<input type="hidden" name="FlightNo" value="'.$row['FlightNo'].'">'.'</td>';
          echo '<td>'.$row['AID'];
          echo '<input type="hidden" name="AID" value="'.$row['AID'].'">'.'</td>';
          echo '<td>'.$row['Type'];
          echo '<input type="hidden" name="Type" value="'.$row['Type'].'">'.'</td>';
          echo '<td>'.'Business'.'</td>';
          echo '<td>'.$row['FlightFrom'];
          echo '<input type="hidden" name="FlightFrom" value="'.$row['FlightFrom'].'">'.'</td>';
          echo '<td>'.$row['FlightTo'];
          echo '<input type="hidden" name="FlightTo" value="'.$row['FlightTo'].'">'.'</td>';
          
          if($_POST['Adult']==1){
         $price = $_POST['Adult']* $row['Business_Price'];
         echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
        }else if($_POST['Adult']==2){
          $price = $_POST['Adult']* $row['Business_Price'];
          echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
        }else if($_POST['Adult']==3){
          $price = $_POST['Adult']* $row['Business_Price'];
          echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
        }else if($_POST['Adult']==4){
          $price = $_POST['Adult']* $row['Business_Price'];
          echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
        }else if($_POST['Adult']==5){
          $price = $_POST['Adult']* $row['Business_Price'];
          echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';  
        }else if($_POST['Adult']==6){
          $price = $_POST['Adult']* $row['Business_Price'];
          echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
        }else if($_POST['Adult']==7){
          $price = $_POST['Adult']* $row['Business_Price'];
          echo '<input type="hidden" name="Adult" value="'.$_POST['Adult'].'">';
        }else{
          $price = $_POST['Adult']*0;
        }

        if($_POST['child']==1){
          $price += $_POST['child']*$row['Business_Price'];
          echo '<input type="hidden" name="price" value="'.$price.'">';
          echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
        }else if($_POST['child']==2){
          $price += $_POST['child']*$row['Business_Price'];
          echo '<input type="hidden" name="price" value="'.$price.'">';
          echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
        }else if($_POST['child']==3){
          $price += $_POST['child']*$row['Business_Price'];
          echo '<input type="hidden" name="price" value="'.$price.'">';
          echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
        }else if($_POST['child']==4){
          $price += $_POST['child']*$row['Business_Price'];
          echo '<input type="hidden" name="price" value="'.$price.'">';
          echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
        }else if($_POST['child']==5){
          $price += $_POST['child']*$row['Business_Price'];
          echo '<input type="hidden" name="price" value="'.$price.'">';
          echo '<input type="hidden" name="child" value="'.$_POST['child'].'">';
        } else{$price += $_POST['child']*0;
        }
          echo '<td>'.$price.'</td>'.'</tr>';
          
          
          
         }
        }
        echo '</table>'.'</div>';
    
        }
        mysqli_close($connect);
        
        
    }

   echo details();
   echo itinerary();
   

?>


</div></div>
<br><br>
<div class="col-6">
<div class="row">
<div class="col-2"><button class="btn btn-primary">confirm</button></form>
<form method="post" action="Homepage.php"></div>
<div class="col-2"><button class="btn btn-primary" onclick="">Cancel</button></div></div></div>
</form>
</div></div></div></div>

    <?php
  }else {
    header("location:login.php");
    }
    ?>
    
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</body>
</html>
