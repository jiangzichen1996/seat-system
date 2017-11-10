<?php
include "conn.php";
//当前时间
date_default_timezone_set("Asia/Shanghai");
echo(date("Y/m/d/h:i:sa"));
echo"<br/>";
echo(time());

session_start();
$uId=$_SESSION['userId'];
$uName=$_SESSION['username'];
$time =  date('Y-m-d h:i:sa');
echo $uId,$uName;
mysqli_query($conn,"set names 'utf8' ");
$add ="insert into appointment(userId, userName,checkdate) values ('$uId', '$uName','$time')";    
$query=mysqli_query($conn,$add);

?>