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

    // $sql = 'select * from flight where FlightFrom = "'.$_POST['Flight_From'].'"';
    $sql = 'select * from flight where FlightFrom = "'.$_POST['Flight_From'].'" and FlightTo = "'.$_POST['Flight_To'].'" ';
    $result = mysqli_query($connect, $sql);

    if(!$result){
        mysqli_error();
        die('No Flight Needed');

    }else{
        while($row = mysqli_fetch_assoc($result)){
            //นิวทำ
echo 'Flight From: '.$_POST['Flight_From'].'<br>';
echo 'Flight To: '.$_POST['Flight_To'].'<br>';

        }
    }
?>
</body>
</html>