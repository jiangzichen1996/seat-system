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
                <div class=item>
                    <a href="" class="seat active"></a>
                    <a href="" class="seat selected"></a>
                    <a href="" class="seat disabled"></a>
                </div>
            </div>   
        </div>
        <button id='btn'>
            选座
        </button>
<script type=text/javascript src='assets/js/jquery.js'></script>
<script type=text/javascript src='assets/js/index.js'></script>
</body>
<?php
        session_start();
        $uId=$_SESSION['userId'];
        echo  $uId;
    if(isset($_SESSION['username'])){
        echo $_SESSION['username'];
        echo'<script>
        $("#btn").off().on("click", function(){
            var settings = {
                width: 300,
                height: 200,
                title: "选座信息",
                content: "assets/php/date.php"
            };
            var dialog = new Dialog(settings);
            dialog.open();
        });  </script>';
    }


?>
</html>