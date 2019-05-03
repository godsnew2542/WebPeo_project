<!doctype html>
<html lang="en">
<head>
  <title>InsertInformation</title>
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
  <!---ค่าคน--->
  <script language="javascript">
        function check() {
            if (document.insertinformation.Adult.value += document.insertinformation.child.value <= 9) {
              echo="1234"
                    }else{
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
    <form name="insertinformation" action="History.php" method="post">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <?php echo $_SESSION['User'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-md-5 ml-auto">
          <?php echo '<a href="Homepage.php">Homepage</a>'; ?> &emsp;
          <?php echo '<a href="History.php">History</a>'; ?> &emsp;
          <?php echo '<a href="logout.php?logout">Logout</a>'; ?>
        </div>
      </div>
    </nav>
<?php
  if($_SESSION['class']){?>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <h1>Information</h1>
      จำนวนผู้โดยสาร <br>
      ผู้ใหญ่  
      <select name="Adult">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select>(อายุ &gt; 14 ปี)<br>
      เด็ก  &nbsp&nbsp
      <select name="child">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>(3-14 ปี)<br>
      ทารก  
      <select name="baby">
        <option value="" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>(0-3 ปี)<br><br>
      <label for="RFname">ชื่อผู้จอง</label>
      <input type="text" name="RFname">
      <br>
      <label for="RFname">นามสกุลผู้จอง</label>
      <input type="text" name="RLname">
      <br><br>
      <button type="submit" name="net">next</button>
      </div>
      <div class="col-md-3"></div>
    </form>
<?php
} else {
  header("location:login.php");
}}
?>
</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
