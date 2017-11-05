<?php
error_reporting( E_ALL&~E_NOTICE );
header ( "Content-type:text/html;charset=utf-8" );
$con=mysqli_connect("localhost","root","");
if (mysqli_select_db ( $con, 'seats' )) {  
    echo "数据库ok";  
} else {  
    echo '数据库错误';  
}  
mysqli_query($con,'set names utf8');
 $sql="INSERT INTO user(userId,userName,userPwd) VALUES('000001','张三',123456)";
//  mysqli_query($con,$sql);
$result=mysqli_query($con,"SELECT * FROM user");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
printf ("%s",$row["userName"]);




?>