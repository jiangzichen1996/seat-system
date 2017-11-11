<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <meta http-equiv=X-UA-Compatible content="ie=edge">
    <title>Document</title>
<link href=css/entry.css rel=stylesheet></head>
<body>
        <h4>
            大学生自习室选座系统
        </h4>
        <div class=seats>
            <div class="tips cf" id=seatType>
                <ul class=seat-intro>
                    <li>
                        <span class="seat active"></span>
                        可选
                    </li>
                    <li>
                        <span class="seat selected"></span>
                        已选
                    </li>
                    <li>
                        <span class="seat disabled"></span>
                        已定
                    </li>
                </ul>
            </div>
            <div class="main main-small">
                <div class="item">
                    <div class="left">
                    </div>
                    <div class="right">
                    </div>
                    
                </div>
            </div>   
        </div>
        <button id='btn'>
            登录
        </button>
<script type=text/javascript src='assets/js/jquery.js'></script>
<script src="assets/js/jquery.cookie.js"></script>
<script type=text/javascript src='assets/js/index.js'></script>
</body>
<?php
error_reporting(E_ALL || ~E_NOTICE);
        session_start();
    if(isset($_SESSION['username'])){
        echo $_SESSION['username']."您好";
        echo'<script>
        $(".active").on("click", function(){
            var settings = {
                width: 300,
                height: 200,
                title: "选座信息",
                content: "assets/php/date.php"
            };
            $Check=$(this).attr("seatNum");
            var dialog = new Dialog(settings);
            $.cookie("seatNum",$Check);
            dialog.open();
        });  </script>';
    }
    include "assets/php/conn.php";
    $uId=$_SESSION['userId'];
    $que="select seatNum from appointment";
    $que2="select seatNum from appointment where userId=$uId";
    $res=mysqli_query($conn,$que);
    $res2=mysqli_query($conn,$que2); 
    $result=mysqli_fetch_array($res2);
    $array=array();
    $array2=array();
    array_push($array2,$result['seatNum']);        
    while($row=mysqli_fetch_array($res)){
        array_push($array,$row['seatNum']);
    }
    $str=json_encode($array);
    $str2=json_encode($array2);
?>
<script>
let disableSeat=eval('<?php echo $str;?>');
let checkSeat=eval('<?php echo $str2;?>');
console.log(checkSeat[0]);
for(let p in disableSeat){
    $('.item a[seatNum='+disableSeat[p]+']').removeClass('active').addClass('disabled');
};
    $('.item a[seatNum='+checkSeat[0]+']').removeClass('disabled').addClass('selected');
</script>

</html>