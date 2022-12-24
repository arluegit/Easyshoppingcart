<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
include_once 'dbFunction.inc';
$db=new dbFunction();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>註冊</title>
    </head>
    <body>
        
        <h1>註冊</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            帳號: <input type="email" placeholder="電子郵件" name="email"><p></p>
            密碼: <input type="password" placeholder="密碼" name="pwd"><p></p>
            姓名: <input type="text" placeholder="名稱" name="yname" />
            <br>
            <br>
            
            <input type="submit" value="確定" name="btn1" />
            <input type="reset" value="清除" name="btn2" />
        </form>
        <hr>
        
        <?php
        
        if(isset($_POST['btn1'])){
           $email=$_POST['email'];
           $pwd=$_POST['pwd'];
           $name=$_POST['yname'];
                        
        //$db->dbState();
        $sql="SELECT id FROM beetledb.member where email='$email'";
        $chm=$db->dbQuery($sql);
        $chmnum=$chm->num_rows;
            if($chmnum==1){
                echo "失敗";
            }else{
             $sql="INSERT INTO beetledb.member (`email`, `pwd`, `yname`) VALUES ('$email', '$pwd', '$name');";
        $chm=$db->dbQuery($sql);
        if($chm){
            echo "註冊成功";
            header("Location:index.php"); 
            exit;
        }else{
            echo "註冊失敗";
        }   
            }

        }
        ?>
    </body>
</html>
