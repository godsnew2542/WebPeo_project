<!doctype html>
<html lang="en">
<head>
  <title>History</title>
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
        <div class="col-md-5"></div>
        <div class="col-md-7"><!---center--->

    
        <?php

        $sql = 'select * from flight where FlightNo = 
                (select FlightNo from reserve_flight where RID = "'.$_POST['idu'].'")';
        
        $result = mysqli_query($connect, $sql);

        if($result){
          while($row = mysqli_fetch_assoc($result)){

            if($_POST['Class'] == "Economy"){
                if($_POST['adult_total'] == "1"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else if($_POST['adult_total'] == "2"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else if($_POST['adult_total'] == "3"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else if($_POST['adult_total'] == "4"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else if($_POST['adult_total'] == "5"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else if($_POST['adult_total'] == "6"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else if($_POST['adult_total'] == "7"){
                  $price = $row['Eco_Price'] * $_POST['adult_total'];

                }else{
                  $price = $row['Eco_Price'] * 0;
                  }

                if($_POST['teen_total'] == "1"){
                  $price += $row['Eco_Price'] * $_POST['teen_total'];

                }else if($_POST['teen_total'] == "2"){
                  $price += $row['Eco_Price'] * $_POST['teen_total'];

                }else if($_POST['teen_total'] == "3"){
                  $price += $row['Eco_Price'] * $_POST['teen_total'];

                }else if($_POST['teen_total'] == "4"){
                  $price += $row['Eco_Price'] * $_POST['teen_total'];

                }else if($_POST['teen_total'] == "5"){
                  $price += $row['Eco_Price'] * $_POST['teen_total'];

                }else{
                  $price += $row['Eco_Price'] * 0;

                }
                

            }else if($_POST['Class'] == "Business"){
              if($_POST['adult_total'] == "1"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else if($_POST['adult_total'] == "2"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else if($_POST['adult_total'] == "3"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else if($_POST['adult_total'] == "4"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else if($_POST['adult_total'] == "5"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else if($_POST['adult_total'] == "6"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else if($_POST['adult_total'] == "7"){
                $price = $row['Business_Price'] * $_POST['adult_total'];

              }else{
                $price = $row['Business_Price'] * 0;
                }

              if($_POST['teen_total'] == "1"){
                $price += $row['Business_Price'] * $_POST['teen_total'];

              }else if($_POST['teen_total'] == "2"){
                $price += $row['Business_Price'] * $_POST['teen_total'];

              }else if($_POST['teen_total'] == "3"){
                $price += $row['Business_Price'] * $_POST['teen_total'];

              }else if($_POST['teen_total'] == "4"){
                $price += $row['Business_Price'] * $_POST['teen_total'];

              }else if($_POST['teen_total'] == "5"){
                $price += $row['Business_Price'] * $_POST['teen_total'];

              }else{
                $price += $row['Business_Price'] * 0;

              }
        }     
          }
          $date = date('Y-m-d H:i:s');
          $sql1 = 'update reserve_flight set RFname = "'.$_POST["RFname"].'" ,
                                            RLname = "'.$_POST["RLname"].'" ,
                                            Class = "'.$_POST["Class"].'",
                                            adult_total = "'.$_POST["adult_total"].'",
                                            teen_total = "'.$_POST["teen_total"].'",
                                            Price = "'.$price.'",
                                            Date_reserve = "'.$date.'"
                                            where RID = '.$_POST['idu'].';';
          $result1 = mysqli_query($connect, $sql1);

          if($result1){
            echo '<font size="23" color="red"><b>Complete</b></font><br>';
            echo "<b>กลับไปยังประวัติการจองของคุณ</b>";
            echo "<br>Click here to <a href='History.php'>History</a>";
        }else{
            echo '<font size="23" color="red"><b>No Complete</b></font><br>';
            echo "<b>กลับไปยังหน้าแรก</b>";
            echo "<br>Click here to <a href='Homepage.php'>Homepage</a>";
        }

        }else{

        }
        
        ?>
      </div><!---close center--->
    </div><!---close ROW--->
    <?php
    } else {
      header("location:login.php");
    }
    ?>
</body>
</html>
