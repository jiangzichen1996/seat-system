<?php   
header("content-type:text/html;charset=utf-8");  
$act=$_REQUEST['act'];  
if($act=="reg"){  
    $mes=reg();  
}elseif($act=="login"){  
    $mes=login();  
}  
function reg(){  
    $arr['username'] = $_POST['username'];  
    $arr['password'] = md5($_POST['password']);  
    $arr['gender'] = $_POST['gender'];  
    $arr['major'] = $_POST['major'];  
    $arr['birthday'] = $_POST['birthday'];  
    $arr['phone'] = $_POST['phone'];  
    $arr['qq'] = $_POST['qq'];  
    $arr['email'] = $_POST['email'];  
    $arr['collage'] = $_POST['collage'];  
    $temp = $_POST['hobby'];  
    $arr['hobby'] = implode(",", $temp);  
    $conn = mysql_connect("localhost", "root", "") or die("数据库连接失败".mysql.error());  
      
    mysql_select_db("ausspeace") or die ("没有数据库".mysql.error());  
  
    mysql_query("set names 'utf8' ");  
    $sql = "insert into speace_user(username, password, gender, major, birthday, phone, qq, email, collage, hobby) values ('$arr[username]', '$arr[password]', '$arr[gender]', '$arr[major]',' $arr[birthday]','$arr[phone]', '$arr[qq]', '$arr[email]', '$arr[collage]', '$arr[hobby]')";  
    if(mysql_query($sql)){  
        $mes="<h2>您好<font color=#c67114>". $arr['username']."</font>注册成功!</h2><br/><h2 id='return'>3秒钟后跳转到登陆页面!</h2><meta http-equiv='refresh' content='3;url=login.php'/>";  
    }else{  
        $mes="注册失败!<br/><a href='register.php'>重新注册</a>|<a href='index.php'>查看首页</a>";  
    }  
    return $mes;  
}  
  
function login(){  
    $mysql_servername = "localhost"; //主机地址  
    $mysql_username = "root"; //数据库用户名  
    $mysql_password =""; //数据库密码  
    $mysql_database ="seats"; //数据库  
    mysql_connect($mysql_servername , $mysql_username , $mysql_password);  
    mysql_select_db($mysql_database);   
    $name=$_POST['username'];  
    $passowrd=md5($_POST['password']);  
  
    if ($name && $passowrd){  
     $sql = "SELECT username, password FROM user WHERE username = '$name' and password='$passowrd'";  
     mysql_query('set names utf8');  
     $res = mysql_query($sql);  
     $rows=mysql_num_rows($res);  
    if($rows){  
        session_start();  
        $_SESSION['username']=$name;  
        $mes="<h2>您好<font color=#c67114>". $name."</font>登陆成功！</h2><br/><h2>3秒钟后跳转到首页</h2><meta http-equiv='refresh' content='3;url=index.php'/>";  
    }  
  
    }else {  
       $mes="登陆失败！<a href='login.php'>重新登陆</a>";  
    }  
    return $mes;  
}  
?>  