<html>
    <h1>Login</h1>

<form action="infomation.php" method="post">
<?php $connect = mysqli_connect("localhost", "root", "", "airplane"); 
?>
Email <input name="FName" type="text"> <br> <br>
Password <input name="LName" type="text"> <br> <br>
<input type="submit" value="Login" name="submit">
<button><a href="register.php">Register</a></button>
</form>
</html>