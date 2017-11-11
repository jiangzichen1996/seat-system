<?php
include "conn.php";
session_start();
$_SESSION['SeatNum']=$_COOKIE['seatNum'];
?>


<p>现在是<?php echo(date("Y/m/d/ H:i:s")); ?>
 <br/>
<span>请问您是否预约此座位</span>
</p>
<form id="LoginForm" class="common" action="assets/php/date2.php?check=1" method="post">  
    <input type="submit" id="check" value="确  认"/> 
</form>  


