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
        <div class="col-md-3"></div>
        <div class="col-md-6"><!---center--->
            <div class="row"><!---row History Update--->
                <div class="col-md-2"></div>
                <div class="col-md-8"><!---center--->
                    <h1 class="text text-primary"><i class="fas fa-plane-departure"></i> History Update</h1>
                </div><!---close center--->
                <div class="col-md-2"></div>
            </div><!---close row History Update--->
            <div class="row"><!---row Update--->
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <?php
                    $sql = 'select * from reserve_flight where RID = '.$_POST['idu'].';';
                    $result = mysqli_query($connect,$sql);
                    if (!$result) {
                        echo mysqli_error() . '<br>';
                        die('Can not access database!');
                    }else{
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<form method="post" name="frmUpdate'.$row['RID'].'" action="HistoryUpdate2.php">';
                            echo '<table>';
                            echo '<br><tr><td><b>&nbsp'.'FirstName'.'&nbsp</b></td>';
                            echo '<td>&nbsp'.'<input type="text" name="RFname" value="'.$row['RFname'].'">'.'&nbsp</td></tr>';
                            echo '<tr><td><b>&nbsp'.'LastName'.'&nbsp</b></td>';
                            echo '<td>&nbsp'.'<input type="text" name="RLname" value="'.$row['RLname'].'">'.'&nbsp</td></tr>';
                            echo '<tr><td><b>&nbsp'.'Class'.'&nbsp</b></td>';
                            echo '<td>&nbsp'.'<select name="Class">
                                    <option value="" selected>-------</option>
                                    <option value="Economy">Economy</option>
                                    <option value="Business">Business</option>
                                    </select>'.'&nbsp</td></tr>';
                           
                            echo '<tr><td><b>&nbsp'.'Adult'.'&nbsp</b></td>';
                            echo '<td>&nbsp'.'<select name="adult_total">
                                    <option value="" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    </select>&nbsp&nbsp&nbsp(อายุ &gt; 14 ปี)'.'&nbsp</td></tr>';
                            echo '<tr><td><b>&nbsp'.'Child'.'&nbsp</b></td>';
                            echo '<td>&nbsp'.'<select name="teen_total">
                                    <option value="" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>&nbsp&nbsp&nbsp(3-14 ปี)'.'&nbsp</td></tr>';
                            echo '<td><br>';
                            echo '<input type="hidden" name="idu" value="'.$row['RID'].'">'."\n";
                            echo '<input name="smtUpdate'.$row['RID'].'" class="btn btn-primary" type="submit" value="Update" onClick="return confirmUpdate();">
                                  &nbsp&nbsp&nbsp<input name="Back" type="button" class="btn btn-primary" value=" Back"onClick="jascript:history.go(-1);"></td>';
                            echo '</table></form>';
                        }
                    }
                ?>
                </div>
                <div class="col-md-2"></div>
            </div><!---row Update--->
        </div><!---close center--->
        <div class="col-md-3"></div>
        </div><!---close ROW--->
        <?php
    }else {
      header("location:login.php");
    }
    ?>
</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
<!---Button Update-->
<script language="JavaScript">
  function confirmUpdate(){
    return confirm('Are you sure you want to update this?');
  }
</script>
</html>
