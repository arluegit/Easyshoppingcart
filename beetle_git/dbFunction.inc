
<?php
class dbFunction
{
    public $connectDB;
    public $queryResult;
    
    function __construct()
    {
        $connectDB=new mysqli("localhost","root","arlue123456");
        $connectDB->select_db("beetledb");
        $connectDB->set_charset("utf8");
        $this->connectDB = $connectDB;
    }
    
    function dbState()
    {
        $connectInfo=$this->connectDB->connect_error;
        if($connectInfo)
        {die("連線失敗!<br>錯誤訊息：$connectInfo");}
        else
        {echo "連線成功!<br>";}
    }
    
    function dbQuery($sql)
    {
        $queryResult=$this->connectDB->query("$sql");
        $this->queryResult=$queryResult;
        return $queryResult;
    }
    
    function selectQueryTableTitle()
    {   
        echo "<thead>";
        while($rowtop=$this->queryResult->fetch_field())
        {
            echo "<th>$rowtop->name</th>";
        }
        echo '</thead>';
    }
    
    function selectQueryTableContent()
    {
        echo "<tbody>";
        while($row=$this->queryResult->fetch_row())
        {
            echo "<tr>";
            for($i=0;$i<count($row);$i++)
            {echo "<td>$row[$i]</td>";}
            echo "</tr>";
        }
    }
    
    function selectQueryTableContentSplit($sql,$per,$col)
    {
        $totalrow=$this->queryResult->num_rows;
        $pages= ceil($totalrow/$per);
        if(!isset($_GET['page']))
        {$page=1;}else 
        {$page= intval($_GET['page']);}
        $start=($page-1)*$per;
        $split="$sql limit $start,$per;";
        $splitresult=$this->dbQuery($split);
        echo "<tbody>";
        while($row=$splitresult->fetch_row())
        {echo "<tr>";for($i=0;$i<count($row);$i++){echo "<td>$row[$i]</td>";}echo "</tr>";}
        echo "</tbody>";
        echo "<tr><td colspan='$col' align='center'>";
        echo "共 ".$totalrow." 筆-在 ".$page." 頁-共 ".$pages." 頁<br/>";
        echo "<a href=?page=1>首頁</a> 第 ";
            for( $i=1 ; $i<=$pages ; $i++ ) 
            {echo "<a href=?page=$i>$i</a> ";} 
        echo " 頁 <a href=?page=$pages>末頁</a>";
        echo "</td></tr>";
    }
    
    function isLoginCookieNo() 
    {
        if(!isset($_COOKIE['islogin']))
        {header("location:index.php");}
    }
    
    function isLoginCookieYes($url) 
    {
        if(!isset($_COOKIE['islogin']))
        {header("location:$url");}
    }
    
    function loginStateCookie($cookieName,$cookieAccount)
    {
        if(!isset($_COOKIE["$cookieName"]))
        {echo "未登入";}
        else 
        {echo "已登入，使用者為：".$_COOKIE["$cookieName"][$cookieAccount];}
    }
}