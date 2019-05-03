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

    <form method="post" action="add_reserve_flight.php">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous">


<a class="fas fa-plane-departure fas fa-2x" href="#"> Airplane Modelling</a></i><br>
    <h2></h2><br>
</div>

<?php

    define("Bthank", "Thank you for choosing Airplane!!!");
    define("Bdetail", "YOUR BOOKING DETAILS");
    define("Bdate", "Booking Date : ");
    define("BPassg", "Name of Passenger(s) : ");
    define("travel", "YOUR TRAVEL ITINERARY");
    define("service", "SERVICES");

   

    function details(){

        echo '<div>'.'<b>'.'Dear Khun '.$_POST['RFname'];
        echo '<input type="hidden" name="RFname" value="'.$_POST['RFname'].'">'.','.'</b>';
        echo '<p>'.Bthank.'</p>'.'</div>';

        echo '<div class="row">';
        echo '<div class="col">';

        echo '<p>'.'<b>'.Bdetail.'</b>'.'</p>';
        echo '<div class="col-12">';
        echo '<div class="col-sm-12>';

        echo '<div class="col-sm-6">'.Bdate;
        echo  date('Y-m-d').'</div>';    //วันที่ออกเดินทาง
        

        echo '<div class="col-sm-12">';
        echo  BPassg.$_POST['RFname'].'&nbsp;'.$_POST['RLname'];
        echo '<input type="hidden" name="RLname" value="'.$_POST['RLname'].'">'.'</div>';//ชื่อผู้เดินทาง
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
    }

    function itinerary(){
        require('db.php');
        $sql = 'select * from flight
                where FlightNo = "'.$_POST['flight'].'"';
        $result = mysqli_query($connect, $sql);

        if(!$result){
            echo mysqli_error().'<br>';
        }else{
            
    
        echo '<p>'.'<b>'.travel.'</b>'.'</p>';
        echo '<table border="1" cellpading="0" cellspacing="0">';
        echo '<tr>'.'<td>'.'Date'.'</td>';//วันที่เดินทาง
        
        echo '<td>'.'Flight No'.'</td>';
        echo '<td>'.'AID'.'</td>';
        echo '<td>'.'Type'.'</td>';
        echo '<td>'.'Class'.'</td>';
        echo '<td>'.'Departing'.'</td>';
        echo '<td>'.'Arriving'.'</td>';
        echo '<td>'.'Price'.'</td>'.'</tr>';

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
        echo '</table>';
    
        }
        mysqli_close($connect);
        
        
    }

   echo details();
   echo itinerary();


?>

<br>
<button>confirm</button></form>
<form method="post" action="Homepage.php">
<button onclick="">Cancel</button>
</form>


    <?php
  }else {
    header("location:login.php");
    }
    ?>
    
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>

</html>
