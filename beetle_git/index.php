<!DOCTYPE html>

<html>
    <head>
        <title>甲蟲</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="beetlecss01.css" rel="stylesheet">
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
            img{
                /*float: left;*/
                width: 20%;
                border-radius: 25px;
                border: 2px black solid;
                margin-right: 10px;
                   }
            .myimage{
                width: 100%;
                height: auto;
                padding: 8px;  
                   }
            #da a{
                text-decoration: none;        
                   }
            

        </style>
     </head>
    
    <body>
        
        <div class="container-fluid"><h1>甲蟲</h1></div>
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
                <div  class="col-md-6 col-sm-3">
                    <form action="https://www.google.com/search" method="get" target="_blank">
                        <input type='search' name='q' placeholder="GOOGLE SEARCH" >
                        <input type="submit" value='SEARCH'>
                    </form>
                 </div>
        </div>
        </div>
   
        <hr>
        <div class='container'>
            <div class='row'>
                <div class='col-md-6 col-sm-3'>
        <?php
        if(!isset($_COOKIE['islogin'])){
        echo "
              <a href='beetlelogin.php'><input id='btn1' type='button' value='登入'/></a>
              <a href='beetlelogup.php'><input id='btn2' type='button' value='註冊'/></a>
              ";
        }else{
            echo "<a href='beetlelogout.php'><input id='btn3' type='button' value='登出'/></a>";
        } ?>
          </div>
            </div>  
        </div>
<br/>
<br/>
             <hr/>
       <div id="da" class="container">
           <div class="row">
               <div class="col-sm"><a id="Dhh" href="products.php"><img src="images/b1/Dhh1.jpg" alt="Dhh" class="myimage" ><br> 
                赫克力斯長戟大兜蟲</a>
            </div>

            <div class="col-sm"><a id="Dn" href="products.php"><img src="images/b1/Dn.jpg" alt="Dn" class="myimage"><br> 
            海神大兜蟲</a>
            </div>

            <div class="col-sm"><a id="Ds" href="products.php"><img src="images/b1/Ds.jpg" alt="Ds" class="myimage"><br> 
            撒旦大兜蟲</a>
            </div>

            <div class="col-sm"><a id="Mt" href="products.php"><img src="images/b1/Mt.jpg" alt="Mt" class="myimage"><br> 
            大黑艷鍬形蟲</a>
            </div>

            <div class="col-sm"><a id="Hm" href="products.php"><img src="images/b1/Hm2.jpg" alt="Hm1" class="myimage"><br> 
            巨顎叉角鍬形蟲</a>
            </div>
            </div>   
            
            <div class="row">
            <div class="col-sm"><a id="Ar" href="products.php"><img src="images/b1/Ar.jpg" alt="Ar" class="myimage"><br> 
            羅森伯基黃金鬼鍬形蟲</a>
            </div>

            <div class="col-sm"><a id="Ol" href="products.php"><img src="images/b1/Ol.jpg" alt="Ol" class="myimage"><br> 
            拉可達爾鬼艷鍬形蟲</a>
            </div>

            <div class="col-sm"><a id="Me" href="products.php"><img src="images/b1/Me.jpg" alt="Me" class="myimage"><br> 
            毛象象兜蟲</a>
            </div>

            <div class="col-sm"><a id="Eg" href="products.php"><img src="images/b1/Eg.jpg" alt="Eg" class="myimage"><br> 
            黃五角大兜蟲</a>
            </div>

            <div class="col-sm"><a id="Dt" href="products.php"><img src="images/b1/Dt.jpg" alt="Dt" class="myimage"><br> 
            巴拉望巨扁鍬形蟲</a>
            </div>
            </div>
            
            <div class="row">
            <div class="col-sm"><a id="Da" href="products.php"><img src="images/b1/Da.jpg" alt="Da" class="myimage"><br> 
            蘇門答臘寬扁鍬形蟲</a>
            </div>

            <div class="col-sm"><a id="Lc" href="products.php"><img src="images/b1/Lc1.jpg" alt="Lc1" class="myimage"><br> 
            歐洲深山鍬形蟲</a> 
            </div>

            <div class="col-sm"><a id="Pm" href="products.php"><img src="images/b1/Pm.jpg" alt="Pm" class="myimage"><br> 
            彩虹鍬形蟲</a>
            </div>

            <div class="col-sm"><a id="La" href="products.php"><img src="images/b1/La.jpg" alt="La" class="myimage"><br> 
            印尼金鍬</a>
            </div>
            </div>    
    </div>   
                
            
    </body>
</html>
