 <?php   
header("content-type:text/html;charset=utf-8");  
$act=$_REQUEST['act'];  
if($act=="reg"){  
    $mes=reg();  
}else if($act=="login"){  
    $mes=login();  
    
}  
echo($mes);

function reg(){  
    
    $arr['username'] = $_POST['username'];  
    $arr['password'] = md5($_POST['password']);  
    $arr['phone'] = $_POST['phone'];  
    $arr['qq'] = $_POST['QQ'];  
    $arr['credit']=100;
    $conn = mysqli_connect("localhost", "root", "") or die("数据库连接失败".mysqli_connect_error());  
    mysqli_select_db($conn,"seats") or die ("没有数据库".mysqli_error());  
    mysqli_query($conn,"set names 'utf8' ");  
    $sql = "insert into user(userName, userPwd, credit, phone,QQ) values ('$arr[username]', '$arr[password]','$arr[credit]','$arr[phone]','$arr[qq]')";    
    echo($sql);
    $res=mysqli_query($conn,$sql);
    if($res){  
        $mes="<h2>您好<font color=#c67114>". $arr['username']."</font>注册成功!</h2><br/><h2 id='return'>3秒钟后跳转到登陆页面!</h2><meta http-equiv='refresh' content='3;url=../../index.html'/>";  
    }else{  
        $mes="注册失败!<br/><a href='../../index.html'>返回首页</a>";  
    }  
    return $mes;  
}  
function login(){  
    $mysql_servername = "localhost"; //主机地址  
    $mysql_username = "root"; //数据库用户名  
    $mysql_password =""; //数据库密码  
    $mysql_database ="seats"; //数据库  
    $conn = mysqli_connect($mysql_servername , $mysql_username, $mysql_password);  
    mysqli_select_db($conn,$mysql_database);   
    $name=$_POST['username'];  
    $passowrd=md5($_POST['password']);  
    echo($name);
    echo($passowrd);
    if ($name && $passowrd){  
     $sql = "SELECT userName, userPwd FROM user WHERE userName = '$name' and userPwd='$passowrd'";  
     mysqli_query($conn,'set names utf8');  
     $res = mysqli_query($conn,$sql);  
   //  $rows=mysqli_num_rows($res);  
    if($res){  
        session_start();  
        $_SESSION['username']=$name;  
        $mes="<h2>您好<font color=#c67114>". $_SESSION['username']."</font>登陆成功！</h2><br/><h2>3秒钟后跳转到首页</h2><meta http-equiv='refresh' content='3;url=../../index.html'/>";  
    }else{
        $mes="登陆失败！<a href='../../index.html'>重新登陆</a>";  
    }}  
    else {  
       $mes="登陆失败！<a href='../../index.html'>重新登陆</a>";  
    }  
    return $mes;  
} 
?>   