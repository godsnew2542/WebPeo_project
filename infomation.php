<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Itim|Kanit|PT+Sans|Prompt|Raleway|Slabo+27px|Taviraj" rel="stylesheet">
</head>

<body>

  <?php
  require('db.php');
  session_start();

  if (isset($_SESSION['User'])) {

    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#"> <?php echo "Welcome" . '&nbsp' . '&nbsp' . $_SESSION['User'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-md-5 ml-auto">
          <a class="nav-item nav-link px-5 small" href="#"> <?php echo '<a href="logout.php?logout">Logout</a>'; ?> </a>
        </div>
      </div>
    </nav>
    <br> <br>
    <form name="registration" action="" method="post">
      <h1>Infomation</h1>
      Flight From <select>
        <option value="ff101">กรุงเทพฯ</option>
        <option value="ff102">ภูเก็ต</option>
        <option value="ff103">สุราษฎร์</option>
        <option value="ff104">กระบี่</option>
        <option value="ff105">ตราด</option>
        <option value="ff106">เชียงราย</option>
        <option value="ff107">เชียงใหม่</option>
        <option value="ff108">ตรัง</option>
        <option value="ff109">ตราด</option>
        <option value="ff110">เกาะสมุย</option>
        <?php 
        ?>
        <option value="ff112">อุดรธานี</option>
        <option value="ff113">ขอนแก่น</option>
      </select> <br><br>
      Flight To <select>
        <option value="ft101">เชียงใหม่</option>
        <option value="ft102">นครศรีธรรมราช</option>
        <option value="ft103">ขอนแก่น</option>
        <option value="ft104">อุดรธานี</option>
        <option value="ft105">เกาะสมุย</option>
        <option value="ft106">ภูเก็ต</option>
        <option value="ft107">แม่ฮ่องสอน</option>
        <option value="ft108">กรุงเทพ</option>
        <option value="ft109">กรุงเทพ</option>
        <option value="ft110">พัทยา</option>
        <?php 
        ?>
        <option value="ft112">เชียงใหม่</option>
        <option value="ft113">กรุงเทพ</option>
      </select> <br><br>
      จำนวนผู้โดยสาร <br> <?php //ห้ามเกิน9 คน 
                          ?>
      ผู้ใหญ่ : <input name="Adult" type="text" placeholder="3" required pattern="[\d0-9]{1}"> <br>
      เด็ก : <input name="child" type="text" placeholder="4" required pattern="[\d0-9]{1}"> <br>
      ทารก : <input name="Baby" type="text" placeholder="2" required pattern="[\d0-9]{1}"> <br><br>
      วันออกเดินทาง
      <input class="datepicker" width="200" placeholder="04/18/2019" required>
      <script>
        $('.datepicker').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
      <input type="checkbox" name="goback"> ไปกลับ<br>
      <input id="datepicker" width="200" placeholder="04/18/2019" required>
      <script>
        $('#datepicker').datepicker({
          uiLibrary: 'bootstrap4'
        });
      </script>
      <button type="submit" name="net">net</button> <br> <br>
      <?php
      if (isset($_REQUEST['Adult'])) {
        $_SESSION['ad'] = $_REQUEST['Adult'];
        $_SESSION['ch'] = $_REQUEST['Baby'];

        if ($_SESSION['ad'] >= $_SESSION['ch']) {

          header("location:testdata.php");
        } else if ($_SESSION['ad'] <= $_SESSION['ch']) {
          header("location:infomationError.php");
        }
      }
      ?>
    </form>
  <?php
} else {
  header("location:login.php");
}
?>


</body>

</html>