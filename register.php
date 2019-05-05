<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Airplane Modelling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
                alert('Your name is empty.');
                return false;
            } else if (document.registration.LName.value == "") {
                alert('Your lastname is empty. ');
                return false;
            } else if (document.registration.email.value == "" && email == type("email")) {
                alert('Your E-mail is empty. ');
                return false;
            } else if (document.registration.password.value == "") {
                alert('Your Password is empty.'); //มีความยาวอย่าน้อง 5ตัวขึ้นไป 
                return false;
            } else if (document.registration.phone.value == "" && phone == pattern("(\d{10})")) {
                alert('Your Phone is empty.');
                return false;
            } else if (document.registration.card.value == "" && caed == pattern("(\d{1})-(\d{4})-(\d{5})-(\d{2})-(\d{1})")) {
                alert('Your personal id is empty.  ');
                return false;
            }
            if (!(document.registration.FName.value == "" &&
                    document.registration.LName.value == "" &&
                    document.registration.email.value == "" &&
                    document.registration.password.value == "" &&
                    document.registration.phone.value == "" &&
                    document.registration.card.value == "")) {
                return confirm('Are you sure?');
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
    }
} else {
    ?>
        <form name="registration" action="" method="post">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-8">
                
                    <h1 class="text-left text-primary"> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         Register To<br>
                        <i class="fas fa-plane-departure"></i> Airplane Modelling</b> 
                    </h1><br><br>
                    
                    <label for="FName">FirstName:</label>
                    <input name="FName" type="text" id="FName" class="form-control  col-md-6" placeholder="FIRSTNAME" pattern="[a-zA-Zก-ุฯ-๙\s]*" required> <br>
                    <label for="LName">LastName:</label>
                    <input name="LName" type="text" id="LName" class="form-control col-md-6" placeholder="LASTNAME" pattern="[a-zA-Zก-ุฯ-๙\s]*" required> <br>
                    <label for="email">Email:</label>
                    <input name="email" type="email" id="email" class="form-control col-md-6" placeholder="EMAIL" required> <br>
                    <label for="pass">Passwoed:</label>
                    <input name="pass" type="password" id="password" class="form-control col-md-6" placeholder="ต้องมีอย่างน้อย 5 ตัวขึ้นไป" pattern= "[0-9]{5,100}" required><br>
                    <label for="phone">Phone:</label>
                    <input name="phone" type="text" id="phone" class="form-control col-md-6" placeholder="0981234567" pattern="(\d{10})" required> <br>
                    <label for="id_card">Id Card:</label>
                    <input name="id_card" type="text" id="card" class="form-control col-md-6" class="mainform form-control" placeholder="1-1234-12345-12-1" pattern="(\d{1})-(\d{4})-(\d{5})-(\d{2})-(\d{1})" required> <br>
                    <input type="submit" class="btn btn-primary" name="submit" value="Register" onclick="return check();">
                    <input type="reset" class="btn btn-light" value="Cancel"> <br> <br>
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
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
