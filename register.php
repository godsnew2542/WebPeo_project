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
                alert('กรุณา กรุณากรอก ชื่อของคุณ ');
                return false;
            } else if (document.registration.LName.value == "") {
                alert('กรุณา กรุณากรอก นามสกุลของคุณ ');
                return false;
            } else if (document.registration.email.value == "" && email == type("email")) {
                alert('กรุณา กรุณากรอก E-mail ของคุณ ');
                return false;
            } else if (document.registration.password.value == "") {
                alert('กรุณา กรุณากรอก Password ของคุณ'); //มีความยาวอย่าน้อง 5ตัวขึ้นไป 
                return false;
            } else if (document.registration.phone.value == "" && phone == pattern("(\d{10})")) {
                alert('กรุณา กรุณากรอก หมายเลขโทรศัพท์ของคุณ');
                return false;
            } else if (document.registration.card.value == "" && caed == pattern("(\d{1})-(\d{4})-(\d{5})-(\d{2})-(\d{1})")) {
                alert('กรุณา กรุณากรอก เลขบัตรประชาชนของคุณ ');
                return false;
            }
            if (!(document.registration.FName.value == "" &&
                    document.registration.LName.value == "" &&
                    document.registration.email.value == "" &&
                    document.registration.password.value == "" &&
                    document.registration.phone.value == "" &&
                    document.registration.card.value == "")) {
                return confirm('คุณแน่ใจแล้วใช่ไหม');
            }
        }
    </script>
</head>

<body>
    <?php
    require('db.php');
    if (isset($_REQUEST['FName'])) {

        function test_input($data)
        {
            $data = htmlspecialchars($data);
            return $data;
        }

        $FName = stripslashes(test_input($_REQUEST['FName']));
        $FName = mysqli_real_escape_string($connect, $FName);

        $LName = stripslashes(test_input($_REQUEST['LName']));
        $LName = mysqli_real_escape_string($connect, $LName);

        $email = stripslashes(test_input($_REQUEST['email']));
        $email = mysqli_real_escape_string($connect, $email);

        $password = stripslashes(test_input($_REQUEST['pass']));
        $password = mysqli_real_escape_string($connect, $password);

        $Phone = stripslashes($_REQUEST['phone']);
        $Phone = mysqli_real_escape_string($connect, $Phone);

        $id_card = stripslashes($_REQUEST['id_card']);
        $id_card = mysqli_real_escape_string($connect, $id_card);

        $query = "INSERT into user (User_ID, NID, Uname, Lname, Email, Passwd, Telephone )
            VALUES ('', '$id_card', '$FName', '$LName', '$email', '$password', '$Phone')";
        $result = mysqli_query($connect, $query);
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
                    <input name="FName" type="text" id="FName" class="form-control  col-md-6" placeholder="FIRSTNAME" pattern="[a-zA-Zก-ุฯ-๙\s]*" required> <br>
                    LastName: <br>
                    <input name="LName" type="text" id="LName" class="form-control col-md-6" placeholder="LASTNAME" pattern="[a-zA-Zก-ุฯ-๙\s]*" required> <br>
                    Email: <br>
                    <input name="email" type="email" id="email" class="form-control col-md-6" placeholder="EMAIL" required> <br>
                    Passwoed: <br>
                    <input name="pass" type="password" id="password" class="form-control col-md-6" placeholder="*****" pattern= "[0-9]{5,100}"  required> <br>
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
mysqli_close($connect);
?>
</body>

</html>