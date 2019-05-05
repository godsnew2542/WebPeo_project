<html>

<head>
    <title>Airplane Modelling</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    <?php
        $sql = 'select * from flight where FlightFrom = "' . $_POST['Flight_From'] . '" and 
                                           FlightTo = "' . $_POST['Flight_To'] . '";';

        $result = mysqli_query($connect, $sql);

        if (!$result) {

            echo mysql_error() . '<br>';
            die('Can not access database!');
            
        }else if(mysqli_num_rows($result) == 0){

            echo 'No Flight Needed';
            echo "<br>Click here to <a href='Homepage.php'>Homepage</a>";

        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<form action="insert_information.php" name="insertfrm'.$row['FlightNo'].'" method="post">';
                echo '<div class="container">';
                echo '<div class="form-row">';

                if($_POST['class'] == "economy"){
                    
                    $_SESSION['class'] = "economy";
                    echo '<div class="form-row">';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Flight From: ' . $row['FlightFrom'] ;
                        echo '</div>';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Flight To: ' . $row['FlightTo'];
                        echo '</div>';
                    echo '</div>';

                    echo '<div class="form-row">';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Depart : '.$row['Depart'];
                        echo '</div>';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Arrive : '.$row['Arrive'];
                        echo '</div>';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Price : '.$row['Eco_Price'];
                        echo '</div>';
                    echo '</div>';
                    
                    echo '<input type="hidden" name="Flight" value="'.$row['FlightNo'].'">' ;
                    echo '<input type="submit" class="btn btn-primary" value="select">';
                    echo '</div>';

                }else if($_POST['class'] == "business"){
                    
                    $_SESSION['class'] = "business";
                    
                    echo '<div class="form-row">';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Flight From: ' . $row['FlightFrom'] ;
                        echo '</div>';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Flight To: ' . $row['FlightTo'];
                        echo '</div>';
                    echo '</div>';

                    echo '<div class="form-row">';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Depart : '.$row['Depart'];
                        echo '</div>';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Arrive : '.$row['Arrive'];
                        echo '</div>';
                        echo '<div class="form-group col-sm-2">';
                             echo 'Price : '.$row['Business_Price'];
                        echo '</div>';
                    echo '</div>';
                    
                    echo '<div class="form-row">';
                        echo '<div class="form-group col-sm-2">';
                        echo '<input type="hidden" name="Flight" value="'.$row['FlightNo'].'">' ;
                        echo '<input type="submit" class="btn btn-primary" value="select">';
                        echo '</div>';
                    echo '</div>';

                }else{
                    echo "Please select class <br>";
                    echo "<br>Click here to <a href='Homepage.php'>Homepage</a>";
                }
            // echo '<div class="form-group col-md-6"></div>';
            // echo '<div class="form-group col-md-6"></div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';   
            }
        }
    } else {
        header("location:login.php");
    }
    
    ?>

</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
