<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
      
        <?php
        setcookie("email","",time()-86400*30);
        setcookie("pwd","",time()-86400*30);
        setcookie("islogin","",time()-86400*30);
        
        echo "<h1>已登出</h1>";
        echo "<a href='./index.php'><h>返回首頁</h4></a>"
        
       
        
        ?>
    </body>
</html>
