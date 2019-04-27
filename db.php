<?php
    $connect = mysqli_connect('localhost','root','','airplane');
 
    if(!$connect)
    {
        die(' Please Check Your Connection'.mysqli_error($connect));
    }
?>