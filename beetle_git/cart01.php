
<?php
include_once 'dbFunction.inc';
$db=new dbFunction();
$db->isLoginCookieNo();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="beetlecss.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
         <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            #tab1{
             
             height: auto;
             align-items: center;
             border:3px black solid;
             padding: 5px;
             font: center;
            }
        </style>
        
        <title>訂購單</title>
    </head>
    <body>
        <div class="container-fluid"><h1>甲蟲王國</h1></div>
        <div class="container">
             <div id="d1" class="row justify-content-between">
                <div  class="col-md-6 col-sm-3">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="aboutus.php">ABOUT US</a></li>
                        <li><a href="products.php">PRODUCT</a></li>
                        <li><a href="cart01.php">SALE</a></li>
                    </ul>
                </div>
        </div>
        </div>
        <div class="container">
        <div><h1>訂購單</h1></div>
        <hr>

        <div class="row ">
        <h3>所有產品</h3>
        <div class="col-sm ">
        <input name="orderp" type="button" value="開始訂購" onclick="location.href='sale04.php'" />
        </div>
        <p></p>
        <div align='center'>
        <?php
        $sql="SELECT * FROM beetledb.所有產品";
        $db->dbQuery($sql);
        echo "<table border='2' >";
        $db->selectQueryTableTitle();
        $db->selectQueryTableContentSplit($sql,15,5);
        echo "</table>";
        
        
        ?>
        </div>
        </div>
        </div>
    </body>
</html>
