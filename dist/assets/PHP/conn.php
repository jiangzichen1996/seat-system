<?php

$mysql_servername = "localhost"; //主机地址  
    $mysql_username = "root"; //数据库用户名  
    $mysql_password =""; //数据库密码  
    $mysql_database ="seats"; //数据库  
    $conn = mysqli_connect($mysql_servername , $mysql_username, $mysql_password);  
    mysqli_select_db($conn,$mysql_database);
    mysqli_query($conn,"set names 'utf8' "); 
    ?>