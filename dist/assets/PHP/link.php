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
    include "conn.php";
 
    mysqli_query($conn,"set names 'utf8' ");  
    $sql = "insert into user(userName, userPwd, credit, phone,QQ) values ('$arr[username]', '$arr[password]','$arr[credit]','$arr[phone]','$arr[qq]')";    
    $res=mysqli_query($conn,$sql);
    if($res){  
        $mes="<h2>您好<font color=#c67114>". $arr['username']."</font>注册成功!</h2><br/><h2 id='return'>3秒钟后跳转到登陆页面!</h2><meta http-equiv='refresh' content='3;url=../../index.php'/>";  
    }else{  
        $mes="注册失败!<br/><a href='../../index.php'>返回首页</a>";  
    }  
    return $mes;  
}  
function login(){  
 include "conn.php";
    $name=$_POST['username'];  
    $passowrd=md5($_POST['password']);  
    if ($name && $passowrd){  
     $sql = "SELECT  userName, userPwd FROM user WHERE userName = '$name' and userPwd='$passowrd'";  
     $res = mysqli_query($conn,$sql);  
    $rows=mysqli_num_rows($res);  
    if($rows){  
        session_start(); 
        $sql = "SELECT userId FROM user WHERE userName = '$name' and userPwd='$passowrd'";               
        $res = mysqli_query($conn,$sql);  
        $uId=mysqli_fetch_array($res);  
        $_SESSION['userId']=$uId['userId']; 
        $_SESSION['username']=$name;  
        $mes="<h2>您好<font color=#c67114>". $_SESSION['username']."</font>登陆成功！</h2><br/><h2>3秒钟后跳转到首页</h2><meta http-equiv='refresh' content='3;url=../../index.php'/>";  
        setcookie('uname',$name);
    
    }else{
        $mes="登陆失败！<a href='../../index.php'>重新登陆</a>";  
    }}  
    else {  
       $mes="登陆失败！<a href='../../index.php'>重新登陆</a>";  
    }  
    return $mes;  
} 
?>   