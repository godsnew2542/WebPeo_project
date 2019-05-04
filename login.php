<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Airplane Modelling</title>
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
                return confirm('Are you sure to logging in?');
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
        $result = mysqli_query($connect, $query);

        if ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $_SESSION['User'] = $record['Uname'] . '&nbsp' . '&nbsp' . $record['Lname'];
            $_SESSION['User_ID'] = $record['User_ID'];
            header("location:Homepage.php");
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
                    <h1 class="text-center text-primary">
                         <b>Login To<br> 
                         <i class="fas fa-plane-departure"></i> Airplane Modelling</b> </h1>
                    <br><br><br>
                    
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control col-sm-8" placeholder="EMAIL" required> <br>
                    <label for="password">Password:</label>
                    <input type="password" name="pass" id="password" class="form-control col-sm-8" placeholder="PASSWORD" required> <br>
                    <input type="submit" name="Login" class="btn btn-primary" value="LOGIN" onclick="return check1();"> <br> <br>
                    Don't have an account? <a href="register.php">Sign up now.</a>
                    
                </div>
                <div class="col-md-4"> </div>
            </div>
        </form>
    <?php
}
mysqli_close($connect); ?>
</body>
<!---Button BacktoTop--->
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="http://2.bp.blogspot.com/-fBSW--O5-eA/UIao-OcGSCI/AAAAAAAAEI8/-GomJZ4SCm4/s1600/uptop2.png"/></a>
</html>
