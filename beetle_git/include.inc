<?php
//session_start();    //設定一個公用函數,可以直接套用至php當中
function islogin(){
if(!isset($_SESSION['islogin'])) header("Location:beetlelogin.html"); //若沒有設定登入email則會跳轉到登入頁面
}

function islogin_cookie(){
 if(!isset($_COOKIE['email'])) header("Location:beetlelogin.html");
     
}





