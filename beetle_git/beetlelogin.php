<!DOCTYPE html>
<?php

include_once 'dbFunction.inc';
$db=new dbFunction();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>會員登入</title>
    </head>
    <body>
        
        
        <h1>登入</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
            <input type="email" placeholder="電子郵件" name="email"><p>
            <input type="password" placeholder="密碼" name="pwd"><p>   
            <input type="submit" value="確定" name="btnlogin">
            <input type="submit" value="註冊" name="btnlogup">
            
        </form>
        
        <?php
        if(isset($_POST['btnlogin'])){
            $email=$_POST['email'];
            $pwd=$_POST['pwd'];
            $sql="SELECT id FROM beetledb.member where email='$email' and pwd='$pwd'";
            $result=$db->dbQuery($sql);
            $resultnum=$result->num_rows;
            if($result->num_rows==1){
        setcookie("email",$email,time()+86400*30);
        setcookie("pwd",$pwd,time()+86400*30);
        setcookie("islogin",$email,time()+86400*30);
        
        header("Location:index.php");
        exit;
        }else{
            echo "<h1>帳號密碼有誤請重新輸入</h1>";
        }
        
        }
        if(isset($_POST['btnlogup'])){
           header("Location:beetlelogup.php"); 
            exit; 
        
        }
        

        ?>
    </body>
</html>
