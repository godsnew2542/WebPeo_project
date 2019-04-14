<?php
 
    $con=mysqli_connect('localhost','root','','airplane');
 
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>