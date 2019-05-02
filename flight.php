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
                echo '<div class="form-group col-md-3"></div>';

                if($_POST['class'] == "economy"){
                    
                    $_SESSION['class'] = "economy";

                    echo '<div class="form-group col-md-6">';
                    echo 'Flight From: ' . $row['FlightFrom'] ;
                    echo 'Flight To: ' . $row['FlightTo'];
                    echo 'Price : '.$row['Eco_Price'];
                    echo '<br>';
                    echo '&nbsp;'.'&nbsp;'.'&nbsp;';
                    echo 'Depart : '.$row['Depart'];
                    echo '&nbsp;'.'&nbsp;'.'&nbsp;';
                    echo 'Arrive : '.$row['Arrive'];
                    echo '<input type="hidden" name="Flight" value="'.$row['FlightNo'].'">' ;
                    echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;';
                    echo '<input type="submit" value="select">';
                    echo '<br>';
                    echo '</div>';

                }else if($_POST['class'] == "business"){
                    
                    $_SESSION['class'] = "business";

                    echo '<div class="form-group col-md-6">';
                    echo 'Flight From: ' . $row['FlightFrom'] ;
                    echo 'Flight To: ' . $row['FlightTo'];
                    echo 'Price : '.$row['Business_Price'];
                    echo '<br>';
                    echo '&nbsp;'.'&nbsp;'.'&nbsp;';
                    echo 'Depart : '.$row['Depart'];
                    echo '&nbsp;'.'&nbsp;'.'&nbsp;';
                    echo 'Arrive : '.$row['Arrive'];
                    echo '<input type="hidden" name="Flight" value="'.$row['FlightNo'].'">' ;
                    echo '&nbsp;'.'&nbsp;'.'&nbsp;'.'&nbsp;';
                    echo '<input type="submit" value="select">';
                    echo '<br>';
                    echo '</div>';
                }else{
                    echo "กรุณาเลือกชั่นที่นั้งของคุณ <br>";
                    echo "<br>Click here to <a href='Homepage.php'>Homepage</a>";
                }
            echo '<div class="form-group col-md-3"></div>';
            echo '</div>';
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

</html>