<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    <form action="login2.php" method="post">
        <div class="row">
            <div class="col-md-4 item"> </div>
            <div class="col-md-4 item">
                <h1 class="text-center"> <b>Login To Airline</b> </h1>
                Email: <br>
                <input type="email" name="email" placeholder="EMAIL" required> <br> <br>
                Password: <br>
                <input type="password" name="pass" placeholder="PASSWORD" required> <br> <br>
                <button type="submit" name="Login">LOGIN</button> <br>
                Don't have an account? <a href="register.php">Sign up now.</a>
            </div>
            <div class="col-md-4 item"> </div>
        </div>
    </form>
</body>

</html>