<html>
    <h1>Register</h1>
    <?php $connect = mysqli_connect("localhost", "root", "", "airplane"); 
    ?>
    Name <input name="FName" type="text"> 
    Lastname <input name="LName" type="text"> <br> <br>
    Email <input name="email" type="text">
    Passwoed <input name="passeoed" type="text">
    Phone <input name="phone" type="text"> <br> <br>
    <button><a href="login.php">Submit</a></button>
</form>
</html>