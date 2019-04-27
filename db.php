<?php
    $connect = mysqli_connect('localhost','root','','airplane');
    mysqli_query($connect,"set character set utf8");
    
    if(!$connect)
    {
        die(' Please Check Your Connection'.mysqli_error($connect));
    }
?>