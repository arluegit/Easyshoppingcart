<?php
    include_once 'dbFunction.inc';
    $db=new dbFunction();
    $db->isLoginCookieNo();

@$_GET['pid'];
@$_GET['gender'];
?>
<?php
    if(isset($_GET['pid']) && isset($_GET['gender']))
    {
        $pid=$_GET['pid'];
        $gender=$_GET['gender'];
        $sql="SELECT unit, price FROM product_detail where products_id=$pid and gender_id=$gender";
        $selunit=$db->dbQuery($sql);
        if($selunit){   
        $selrow=$selunit->fetch_assoc();
        $rownum=$selrow['unit']+1;
        $str="";
        for($i=0;$i<$rownum;$i++){
           
            if($i==$rownum-1)
            {
                $str=$str.$i."-"."{$selrow['price']}";
            }else
            {
                $str=$str.$i."-";
            }
            
        }
       }
    }
    echo $str;
?>
