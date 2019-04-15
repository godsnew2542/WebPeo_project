<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .item {
            border: 1px solid red;
        }

        .pull-left {
            float: left;
        }

        .pull-right {
            float: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
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

        $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into users (FirstName, LastName, Email, password, Phone, trn_date)
            VALUES ('$FName', '$LName', '$email', '$password', '$Phone', '$trn_date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            ?>
            <div class='form'>
                <h3>You are registered successfully.</h3>
                <br />Click here to <a href='login.php'>Login</a>
            </div>
        <?php
    }
} else {
    ?>
        <form name="registration" action="" method="post">
            <div class="row">
                <div class="col-md-4 item"> </div>
                <div class="col-md-4 item">
                    <h1 class="text-center"> <b>Register To Airline</b> </h1>
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "airplane");
                    ?>
                    FirstName: <br>
                    <input name="FName" type="text" placeholder="FIRSTNAME" required> <br> <br>
                    LastName: <br>
                    <input name="LName" type="text" placeholder="LASTNAME" required> <br> <br>
                    Email: <br>
                    <input name="email" type="email" placeholder="EMAIL" required> <br> <br>
                    Passwoed: <br>
                    <input name="pass" type="password" placeholder="PASSWORD" required> <br> <br>
                    Phone: <br>
                    <input name="phone" type="text" placeholder="0981234567" required pattern="(\d{10})"> <br> <br>
                    <input type="submit" name="submit" value="Register">
                    <input type="reset" value="Cancel">
                    <p>Go to <a href='login.php'>Login.</a></p>
                </div>
                <div class="col-md-4 item"> </div>
            </div>
        </form>
        
    <?php } ?>
</body>

</html>