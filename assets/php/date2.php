<?php
include "conn.php";
$act=$_REQUEST['check'];
if($act){
    session_start();
    $uId=$_SESSION['userId'];
    $uName=$_SESSION['username'];
    $uSeat=$_SESSION['SeatNum'];
    $repeat="select * from appointment where userId=$uId";  
    $res=mysqli_query($conn,$repeat);  
    $result=mysqli_fetch_array($res);  
    if($result){    
        $url="http://localhost:8080/seat-system/assets/php/fail.php" ;       
    }else{
            $time =  date('Y-m-d H:i:sa');
             
            mysqli_query($conn,"set names 'utf8' ");
            echo($uSeat);
            $add ="insert into appointment(userId, userName,checkdate,seatNum) values ('$uId', '$uName','$time','$uSeat')";    
            $query=mysqli_query($conn,$add);
    $url="http://localhost:8080/seat-system/assets/php/success.php" ;       
    
            
    }
    echo  ("<meta http-equiv='refresh'  content ='1;  
    url=$url '>");
}
?>