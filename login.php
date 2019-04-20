<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .text-center {
            text-align: center;
        }

        .text-1 {
            text-align: center;
            font-size: 40px;
        }
    </style>
    <script language="javascript">
        function check1() {
            if (!(document.login.email.value == "" &&
                    document.login.password.value == "")) {
                return confirm('คุณแน่ใจแล้วใช่ไหม1');
            }
        }
    </script>
</head>

<body>
    <?php
    require_once('db.php');
    session_start();
    if (isset($_POST['Login'])) {
        if ((empty($_POST['email'])) || (empty($_POST['pass']))) {
            ?>
            <div class="text-center1">
                <h1>Email/password is incorrect</h1>
                <br>Click here to <a href='login.php'>Login</a>
            </div>
        <?php
    } else {
        $query = "select * from user where Email = '" . $_POST['email'] . "' and Passwd = '" . $_POST['pass'] . "'";
        $result = mysqli_query($con, $query);

        if ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $_SESSION['User'] = $record['Uname'] . '&nbsp' . '&nbsp' . $record['Lname'];
            header("location:infomation.php");
        } else {
            ?>
                <div class="text-center1">
                    <h1>Email/password is incorrect</h1>
                    <br>Click here to <a href='login.php'>Login</a>
                </div>
            <?php
        }
    }
} else {
    ?>
        <form action="" method="post" name="login">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-4">
                    <br><br><br>
                    <h1 class="text-center"> <b>Login To Airline</b> </h1>
                    <br><br><br>
                    Email: <br>
                    <input type="email" name="email" id="email" class="form-control col-sm-5" placeholder="EMAIL" required> <br>
                    Password: <br>
                    <input type="password" name="pass" id="password" class="form-control col-sm-5" placeholder="PASSWORD" required> <br>
                    <input type="submit" name="Login" value="LOGIN" onclick="return check1();"> <br> <br>
                    Don't have an account? <a href="register.php">Sign up now.</a>
                </div>
                <div class="col-md-4"> </div>
            </div>
        </form>
    <?php
}
mysqli_close($con); ?>
</body>

</html>