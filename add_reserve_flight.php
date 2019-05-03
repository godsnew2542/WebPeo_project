<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>
        <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
    <h1>thank you</h1>

    
<?php
  require('db.php');
  $sql = 'INSERT into reserve_flight 
  VALUES ( "","'.$_POST['Adult'].'",
              "'.$_POST['child'].'",
              "'.$_POST['$price'].'",
              "'.date('d-m-Y').'")';

  $result = mysqli_query($connect, $sql);

  $sql1 = 'INSERT into reserve_flight
  VALUES     ("'.$_POST['User_ID'].'",
              "'.$_POST['RFname'].'",
              "'.$_POST['RLname'].'",
              "'.$_POST['class'].'",
               "'.$_POST['TrDate'].'" )';

  $result1 = mysqli_query($connect, $sql1);            


    $select = 'select*from reserve_flight';
    $result2 = mysqli_query($connect, $select);

    
      echo '<table border="1" cellpading="0" cellspacing="0">';
      echo '<tr>'.'<td>'.'RID'.'</td>';
      echo '<td>'.'User_ID'.'</td>';
      echo '<td>'.'RFname'.'</td>';
      echo '<td>'.'RLname'.'</td>';
      echo '<td>'.'Class'.'</td>';
      echo '<td>'.'adult_total'.'</td>';
      echo '<td>'.'teen_total'.'</td>';
      echo '<td>'.'Price'.'</td>';
      echo '<td>'.'Date_reserve'.'</td>';
      echo '<td>'.'Trv_date'.'</td>'.'</tr>';
    

    if($_SESSION['class'] == "economy"){
     
      $_SESSION['class'] = "economy";

    while($row = mysqli_fetch_assoc($result2)){
      echo '<tr>'.'<td>'."".'</td>';
      echo '<td>'.$row['User_ID'].'</td>';
      echo '<td>'.$row['RFname'].'</td>';
      echo '<td>'.$row['RLname'].'</td>';
      echo '<td>'.'Economy'.'</td>';
      echo '<td>'.$row['adult_total'].'</td>';
      echo '<td>'.$row['teen_total'].'</td>';
      
      
      echo '<td>'.$price.'</td>';
      echo '<td>'.$row['Date_reserve'].'</td>';
      echo '<td>'.$row['Trv_date'].'</td>'.'</tr>';
    }

  }else if($_SESSION['class'] == "business"){
    while($row = mysqli_fetch_assoc($result2)){
      echo '<tr>'.'<td>'."".'</td>';
      echo '<td>'.$row['User_ID'].'</td>';
      echo '<td>'.$row['RFname'].'</td>';
      echo '<td>'.$row['RLname'].'</td>';
      echo '<td>'.'Business_Price'.'</td>';
      echo '<td>'.$row['adult_total'].'</td>';
      echo '<td>'.$row['teen_total'].'</td>';


        
      echo '<td>'.$price.'</td>';
      echo '<td>'.$row['Date_reserve'].'</td>';
      echo '<td>'.$row['Trv_date'].'</td>';
    }
  }
  echo '</table>';
    
      
        mysqli_close($connect);
        
        
    

?>

<?php
      } else {

  header("location:login.php");
}
?>
</body>
</html>