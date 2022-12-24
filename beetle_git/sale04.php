<!DOCTYPE html>
<?php session_start(); ?>
<?php
include_once 'dbFunction.inc';
$db=new dbFunction();
$db->isLoginCookieNo();
@$_GET['pid'];
@$_GET['gender'];
@$_GET['price'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SALE</title>
        <style>
            
            #tab1{
                border: 2px black solid;
                width: auto;
            }
            
            
        </style>
        <script language="javascript" src="jquery-3.6.1.min.js"></script>
        <script language="javascript">
            function reFresh()
            {
              
                var pid=document.getElementById('pid').value;
                var gender=document.getElementById('gender').value;
               
                $.get("sale05.php",{pid:pid,gender:gender},function(s,v)
                {
                    var select=document.getElementById("unit");
                    select.innerHTML="";
                    var kdat=s.split("-");
                    for(i=0;i<kdat.length-1;i++)
                    {
                        
                        select.innerHTML=select.innerHTML+"<option value="+kdat[i]+">"+kdat[i]+"</option>";
                    }
                    document.getElementById("unitPrice").value=kdat[kdat.length-1];
                });
                
                
                
                
            }
            function count()
            {
                var unit=document.getElementById("unit").value;
                var unitPrice=document.getElementById("unitPrice").value;
                var sum=unit*unitPrice;
                document.getElementById("totalPrice").value=sum;
            }
            
            function countAll(){
                setInterval(
                ()=>{
                var over=document.getElementById("over").value;
                var sum=0;
                for(var i=0;i<over;i++)
                {
                    sum+=parseInt(document.getElementById("spa"+i).innerHTML);
                }
                document.getElementById("fprice").value=sum;},500
                );
                
            }
            
            
            
        </script>
    </head>
    <body onload="countAll()">
        <form id="f1" name="f1" method="get" action="sale04.php" >
            <table id="tab1" name="tab1">
                <h1>訂購單</h1>
                <tbody>
                    <tr>
                        <td colspan="2">訂購人: <input id="oname" name="oname" type="text" size="20" value='<?= @$_SESSION['userinfo'][0]?>'/></td>
                        <td colspan="2">連絡電話: <input id="tel" name="tel" type="text" size="20" value='<?= @$_SESSION['userinfo'][1]?>'/></td>
                    </tr>
                    <tr>    
                        <td colspan="2">Email: <input id="email" name="email" type="email" size="20" value='<?= @$_SESSION['userinfo'][2]?>'/></td>
                        <td colspan="2">運送地址或指定店家(7-11/FamilyMart): <input id="address" name="address" type="text" size="30" value='<?= @$_SESSION['userinfo'][3]?>'/></td>
                    </tr>
                     <tr>
                        <td colspan="2">甲蟲種類
                            <select id="pid" name="pid" value="<?= $_GET['pid']?>">
                                <option selected disabled>~~~請選擇種類~~~</option>
                                <?php
                                $sql="SELECT * FROM products";
                                $selpid=$db->dbQuery($sql);
                                if($selpid){  
                                while($row=$selpid->fetch_assoc()){
                                    echo "<option value='".$row['pid']."'>{$row['name']}</option>";
                                }
                                $selpid->free();
                                }
                                
                                
                                ?>
                                
                            </select>
                        </td>
                        <td  colspan="2">成蟲(公/母)/幼蟲/蟲卵
                            <select id="gender" name="gender" onchange="reFresh()">
                               <option selected disabled >~~~請選擇類別~~~</option>
                                <?php
                                $sql="SELECT * FROM gender";
                                $selgender=$db->dbQuery($sql);
                                if($selgender){ 
                                while($row2=$selgender->fetch_assoc()){
                                    echo "<option value={$row2['id']}>{$row2['genders']}</option>";
                                }
                                $selgender->free();
                                }
                                ?>
                            </select>
                            
                        </td>
                     </tr>
                     <tr>
                         <td>隻數: <select id="unit" name="unit" onchange="count()">
                                <option disabled selected>隻數</option>
                                </select>
                           <input type="hidden" id="unitPrice">
                        </td> 
                        <td colspan="2">
                        價格: <input type='number' id='totalPrice' name='totalPrice' readonly size='30'>
                         </td>
                         
                        <td><input  type="submit" name="btn1" value="新增" align="right" onclick="countAll()"/></td>
                        
                        
                        
                     </tr>
                </tbody>
            </table>
        
        
                        <?php
                        
                        if(isset($_GET['btn1'])){
                          if(!isset($_SESSION['userinfo']))
                            {$_SESSION['userinfo']=array();}
                          if(!isset($_SESSION['cart']))
                            {$_SESSION['cart']=array();}
                          $oname=$_GET['oname'];
                          $tel=$_GET['tel'];
                          $email=$_GET['email'];
                          $address=$_GET['address'];
                          $_SESSION['userinfo']=[$oname,$tel,$email,$address];
                          $pid=@$_GET['pid'] ;
                          $gender=@$_GET['gender'];
                          $unit=@$_GET['unit'];
                          $totalPrice=$_GET['totalPrice'];
                          $add=[$pid,$gender,$unit,$totalPrice];
                          $_SESSION['cart']= array_merge($_SESSION['cart'],[$add]);
                          echo "<hr>";
                            echo "<hr>目前欲購買所有產品<br>";
                            echo "<script language='javascript'>location.href='sale04.php';</script>";
                        }
                        
                        
                          if(isset($_SESSION['userinfo']))
                          {
                              //訂購者資料
                              echo "訂購人:".$_SESSION['userinfo'][0]."<br/>";
                              echo "連絡電話:".$_SESSION['userinfo'][1]."<br/>";
                              echo "Email:".$_SESSION['userinfo'][2]."<br/>";
                              echo "運送地址".$_SESSION['userinfo'][3]."<br/>";
                              echo "<hr/>";
                              //訂購物品資料
                              for($i=0;$i<count($_SESSION['cart']);$i++)
                              {
                                 $typeIndex="SELECT * FROM products where pid = {$_SESSION['cart'][$i][0]};";
                                 $typeResult=$db->dbQuery($typeIndex);
                                 $typeRow=$typeResult->fetch_assoc();
                                 echo "甲蟲種類：".$typeRow['name']."<br/>";
                                 $genderIndex="SELECT * FROM gender where id = {$_SESSION['cart'][$i][1]};";
                                 $genderResult=$db->dbQuery($genderIndex);
                                 $genderRow=$genderResult->fetch_assoc();
                                 echo "甲蟲型態：".$genderRow['genders']."<br/>";
                                 echo "數量：{$_SESSION['cart'][$i][2]}<br/>";
                                 echo "小計：<span id='spa$i' >{$_SESSION['cart'][$i][3]}</span><br/>";
                                 echo "<hr/>";
                                 if($i===count($_SESSION['cart'])-1)
                                 {
                                     echo "<input type='hidden' id='over' value='".(count($_SESSION['cart']))."'/>";
                                 }
                              }
                              }
                          
                        ?>
            
            <br/>
            <br/>
            <br/>
            
            總價: <input type="number" id="fprice" name="fprice" readonly onclick="countAll()"/>
            
            
            
          
        <br/>
        <br/>
        <br/>
        
        
        <input type="submit" name="addsend" value="確定訂單" />
      
        <?php
        
        if(isset($_GET['addsend'])){
            $insertuserinfo=$_SESSION['userinfo'];
            $fprice=$_GET['fprice'];
            $sql="INSERT INTO `oindex` (`user`, `phone`, `email`, `address`, `totalprice`) VALUES ('$insertuserinfo[0]', '$insertuserinfo[1]', '$insertuserinfo[2]', '$insertuserinfo[3]', '$fprice')";
            $addUser=$db->dbQuery($sql);
            
            $search="SELECT pid from oindex where user='$insertuserinfo[0]' order by pid DESC";
            $searchAdd=$db->dbQuery($search);
            $searchresult=$searchAdd->fetch_row();
            
            for($i=0;$i<count($_SESSION['cart']);$i++)
                              {
                                 $insertAddProducts=$_SESSION['cart'];
                                 $insertAPsql="INSERT INTO `odetail` (`id`,`item`, `gender`, `amout`) VALUES ('$searchresult[0]','{$insertAddProducts[$i][0]}', '{$insertAddProducts[$i][1]}', '{$insertAddProducts[$i][2]}')";
                                  $addProduct=$db->dbQuery($insertAPsql);
                              }
                              
            if($addUser && $addProduct ){
            echo "訂購成功<br/>";
            echo "請注意信箱會有訂單通知，非常感謝您的訂購<br/>";
            echo "<a href='index.php'>回首頁</a><br/>";
            session_unset();
            }else{
                echo "訂購失敗";
            }
           
        }
        
        
        ?>
        </form>
        
        
        
        
    </body>
</html>
