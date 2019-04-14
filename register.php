<html>

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
    <div class="form">
        <h1>Register</h1>
        <form name="registration" action="" method="post">
            <?php
            $connect = mysqli_connect("localhost", "root", "", "airplane");
            ?>
            FirstName: <input name="FName" type="text" placeholder="FIRSTNAME" required>
            LastName: <input name="LName" type="text" placeholder="LASTNAME" required> <br> <br>
            Email: <input name="email" type="email" placeholder="EMAIL" required>
            Passwoed: <input name="pass" type="password" placeholder="PASSWORD" required>
            Phone: <input name="phone" type="text" placeholder="PHONE" required> <br> <br>
            <input type="submit" name="submit" value="Register">
        </form>
        <p>Go to <a href='login.php'>Login</a></p>
    </div>
<?php } ?>

</html>