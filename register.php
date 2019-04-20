<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .text-center {
            text-align: center;
        }

        .fond {
            font-size: 50px;
        }
    </style>
    <script language="javascript">
        function check() {
            if (document.registration.FName.value == "") {
                alert('กรุณา กรุณากรอกข้อมูล 1 ');
                return false;
            } else if (document.registration.LName.value == "") {
                alert('กรุณา กรุณากรอกข้อมูล 2 ');
                return false;
            } else if (document.registration.email.value == "" && email == type("email")) {
                alert('กรุณา กรุณากรอกข้อมูล 3 ');
                return false;
            } else if (document.registration.password.value == "") {
                alert('กรุณา กรุณากรอกข้อมูล 4 ');
                return false;
            } else if (document.registration.phone.value == "" && phone == pattern("(\d{10})")) {
                alert('กรุณา กรุณากรอกข้อมูล 5 ');
                return false;
            } else if (document.registration.card.value == "" && caed == pattern("(\d{1})-(\d{4})-(\d{5})-(\d{2})-(\d{1})")) {
                alert('กรุณา กรุณากรอกข้อมูล 6 ');
                return false;
            }
            if (!(document.registration.FName.value == "" &&
                    document.registration.LName.value == "" &&
                    document.registration.email.value == "" &&
                    document.registration.password.value == "" &&
                    document.registration.phone.value == "" &&
                    document.registration.card.value == "")) {
                return confirm('คุณแน่ใจแล้วใช่ไหม1');
            }
        }
    </script>
</head>

<body>
    <?php
    require('db.php');
    if (isset($_REQUEST['FName'])) {

        $FName = stripslashes($_REQUEST['FName']);
        $FName = mysqli_real_escape_string($con, $FName);

        $LName = stripslashes($_REQUEST['LName']);
        $LName = mysqli_real_escape_string($con, $LName);

        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['pass']);
        $password = mysqli_real_escape_string($con, $password);

        $Phone = stripslashes($_REQUEST['phone']);
        $Phone = mysqli_real_escape_string($con, $Phone);

        $id_card = stripslashes($_REQUEST['id_card']);
        $id_card = mysqli_real_escape_string($con, $id_card);

        $query = "INSERT into user (NID, Uname, Lname, Email, Passwd, Telephone )
            VALUES ('$id_card', '$FName', '$LName', '$email', '$password', '$Phone')";
        $result = mysqli_query($con, $query);
        if ($result) {
            ?>
            <div class="text-center fond">
                <b>You are registered successfully.</b>
                <br />Click here to <a href='login.php'>Login.</a>
            </div>
        <?php
    } else { //มีข้อผิดพลาดในข้อมูลที่คุณป้อน //กรุณาตรวจสอบข้อมูลให้ถูกต้อง
        ?>
            <div class="text-center fond">
                <b>There was an error in the data that you entered.</b>
                <br> <b>Please check the information correctly.</b>
                <br>Click here to <a href='register.php'>Register.</a>
            </div>
        <?php
    }
} else {
    ?>
        <form name="registration" action="" method="post">
            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-6">
                    <h1 class="text-center"> <b>Register To Airline</b> </h1>
                    FirstName: <br>
                    <input name="FName" type="text" id="FName" class="form-control  col-md-6" placeholder="FIRSTNAME" required> <br>
                    LastName: <br>
                    <input name="LName" type="text" id="LName" class="form-control col-md-6" placeholder="LASTNAME" required> <br>
                    Email: <br>
                    <input name="email" type="email" id="email" class="form-control col-md-6" placeholder="EMAIL" required> <br>
                    Passwoed: <br>
                    <input name="pass" type="password" id="password" class="form-control col-md-6" placeholder="PASSWORD" required> <br>
                    Phone: <br>
                    <input name="phone" type="text" id="phone" class="form-control col-md-6" placeholder="0981234567" pattern="(\d{10})" required> <br>
                    Id Card: <br> <?php //เป็น พายมะรีคีย์ ซึ่งถ้าใส่ซ่ำจะ เกิดข้อผิดพาดไม่เข้า ดาต้าเบส
                                    ?>
                    <input name="id_card" type="text" id="card" class="form-control col-md-6" class="mainform form-control" placeholder="1-1234-12345-12-1" pattern="(\d{1})-(\d{4})-(\d{5})-(\d{2})-(\d{1})" required> <br>
                    <input type="submit" name="submit" value="Register" onclick="return check();">
                    <input type="reset" value="Cancel"> <br> <br>
                    <p>Go to <a href='login.php'>Login.</a></p>
                </div>
                <div class="col-md-3"> </div>
            </div>
        </form>
    <?php
}
mysqli_close($con);
?>
</body>

</html>