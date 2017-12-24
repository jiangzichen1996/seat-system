let ouName= document.getElementById("username");
let ouPwd= document.getElementById("reg_password");
let orePwd= document.getElementById("repassword");
let ouPhone= document.getElementById("phone");
let testa=true;
let testb=true;
ouName.onkeyup=function (){
    this.value=this.value.replace(/[^0-9a-zA-Z]/g,'');
}
ouName.onblur=function(){
    if(!this.value.replace(/^ +| +$/g,'')==''){
        testa=false;
    }
}
ouPwd.onkeyup=function (){
    this.value=this.value.replace(/[^0-9a-zA-Z]/g,'');
}
ouPwd.onblur=function(){
    if(!this.value.replace(/\D/g)==''){testa=false;}
}
$(orePwd).blur(function (){
    if(this.value!=ouPwd.value){
        alert("请输入相同密码");
    };
    });
    console.log($(ouPhone));
ouPhone.onkeyup=function (){
    this.value=this.value.replace(/[^0-9]/g,'');    
}
$(ouPhone).blur(function (){
    if(/^1[3,5,7,8]\d{9}$/.test(this.value)){
        testb=false;
    }
});
$("#reg_submit").on('click',function(){
    if(testa){
        alert("内容不能为空");
        return false;
    }if(testb){
        alert("请输入正确的手机号码");
        return false;
    }else{
        $(this).prop("type","submit");        
    }})

    
