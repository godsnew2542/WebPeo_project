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
            <?php echo '<a href="#">History</a>'; ?> &emsp;
            <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div><!---close navbar link--->
    </div><!---close navbar--->
    <div class="row"><!---ROW--->
        <div class="col-md-3"></div>
        <div class="col-md-6"><!---center--->

        <?php
            $sql = 'select * from reserve_flight where RID = '.$_POST['idu'].';';
            $result = mysqli_query($connect,$sql);

            if (!$result) {
                echo mysqli_error() . '<br>';
                die('Can not access database!');
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    echo '<form method="post" name="frmUpdate'.$row['RID'].'" action="HistoryUpdate2.php">';
                    echo 'FirstName';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<input type="text" name="RFname" value="'.$row['RFname'].'">';
                    echo '<br>';
                    echo 'LastName';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<input type="text" name="RLname" value="'.$row['RLname'].'">';
                    echo '<br>';
                    echo 'Class';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<input type="text" name="Class" value="'.$row['Class'].'">';
                    echo '<br>';
                    echo 'Price';
                    echo '&nbsp';	
                    echo '<input type="text" name="Price" disabled="disabled" value="'.$row['Price'].'">';
                    echo '<br>';
                    echo 'Adult';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<input type="text" name="adult_total" value="'.$row['adult_total'].'">';
                    echo '<br>';
                    echo 'Child';
                    echo '&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo '<input type="text" name="teen_total" value="'.$row['teen_total'].'">';
                    echo '<br>';
                    echo '<td><input name="smtUpdate" type="submit" value="Update" onClick="return confirmUpdate();"></td>'."\n";
                    echo '</form>';
                }
            }
        ?>
        </div><!---close center--->
        <div class="col-md-3"></div>
        </div><!---close ROW--->
        <?php
    }else {
      header("location:login.php");
    }
    ?>
</body>
<!---Button Update-->
<script language="JavaScript">
  function confirmUpdate(){
    return confirm('Are you sure you want to update this?');
  }
</script>
</html>
