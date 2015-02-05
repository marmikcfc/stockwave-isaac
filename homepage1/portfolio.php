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
height:1000px;
background:#FFFFFF;
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

div#dportfolio
{
margin:0 auto;
padding:0;
position:relative;
width:960px;
height:100px;


}


div#sharesavail
{
	margin:0 auto;
padding:0;
position:relative;
width:960px;
height:700px;
overflow:scroll;
	
}
caption { padding : .5em;
letter-spacing : .2em; }
table { width:500px; position:absolute; top:05px; left:230px; text-align:left; color:#333;outline:1px solid #d4d4d4;
border:5px solid #e5eecc;
position:absolute;

}


tr:hover { background:	#B5EAAA; color:green; }
th { background :#4AA02C;
color : #fff;
padding : 1em .7em 1em .7em;
font-weight : bold;
text-align:left;
 }
tbody td, tbody th { padding : .5em; }
td { padding : 0 10px; text-transform:capitalize; }


</style>
</head>

<body>
<div id="content">

<div id="header" >
<h1> <a href="#">  LOGO  </a></h1>
<img  src="img/topmenu_curb.gif" width="47px" height="30px" />

<div id="topmenu"> 

<ul>
<li> <a href="index.php"> Home  </a></li> <blockquote> | </blockquote>
<li> <a href="#"> About Us  </a></li><blockquote> | </blockquote>
<li> <a href="#"> Contact Us  </a></li><blockquote> | </blockquote>
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
<li> <a href="index.php"> Top trades  </a></li> <blockquote> | </blockquote>
<li> <a href="pasttrades.php">Past trades   </a></li><blockquote> | </blockquote>
<li> <a href="#"> Portfolio </a></li><blockquote> | </blockquote>
<li> <a href="terminal.php"> Trader terminal  </a>
</ul>
</div>

<MARQUEE id="mark1" WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA >Welcome to StockWave 
<?php 
echo "$_SESSION[uname]"; 

?>
<a style=" color:blue;padding-left:20px; ">Note: Balance+Profit Is sum of currentbalance + shares You have * current price</a>
</MARQUEE> 

<div id="maincontent">

<img src="img/accd.png"  width="500px" height="80px" />

<!-- this is ur top ten displayer code  -->

<?php
// shares sell code:
include 'databasepwd.php';
// Make a MySQL Connection
mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);


//this balance u ill add to original balance
$balanceadd=0;
$result = mysql_query("SELECT * FROM sw_shares ORDER BY sh_name "); 


while($row = mysql_fetch_array( $result )) {

$result1 = mysql_query("SELECT sum(totbuy) FROM sw_sharesbuy where userid=$_SESSION[uid]  and sh_name='$row[sh_name]' "); 
;

while($row1 = mysql_fetch_array( $result1 ))
{
$sumbuy=$row1['sum(totbuy)'];

$result2 = mysql_query("SELECT sum(totsell) FROM sw_sharessell where userid=$_SESSION[uid]  and sh_name='$row[sh_name]' ") ; 

while($row2 = mysql_fetch_array( $result2 ))
{
$sumsell=$row2['sum(totsell)'];

$sumpresent=$sumbuy-$sumsell;


$balanceadd=$balanceadd+$sumpresent*$row['curr_cost'];
}
}
} 


$result3 = mysql_query("SELECT * FROM sw_portfolio where userid=$_SESSION[uid]"); 

echo'<div id="dportfolio" > ';
echo '<table>';
echo "<tr> <th>UserId</th> <th>User Name</th>  <th>Current Balance Rs.</th> <th>Balance+Profit</th></tr>";


while($row3 = mysql_fetch_array( $result3 ))
{
	$brokage=$balanceadd*0.0025;
$finalbalance=$row3['balance']+$balanceadd-$brokage;
$english_format_number = number_format($finalbalance, 2, '.', '');



echo "<tr><td>"; 
	echo $row3['userid'];
	echo "</td><td>"; 
	echo $row3['uname'];
        echo "</td><td>";
    echo $row3['balance'];
 echo "</td><td>"; 

echo $english_format_number;


	echo "</td></tr>"; 
}
echo "</table>";
echo"</div>";
?>


<?php

//new code added
// shares sell code:
include 'databasepwd.php';
// Make a MySQL Connection
mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);

echo ' <img src="img/shhld.png"  width="500px" height="80px" /> ';
echo'<div id="sharesavail" > ';

echo '<table>';
echo "<tr> <th>Share Name</th> <th>Available</th>  <th>Current Price Rs.</th> </tr>";



$result = mysql_query("SELECT * FROM sw_shares ORDER BY sh_name "); 
 

while($row = mysql_fetch_array( $result )) {

$result1 = mysql_query("SELECT sum(totbuy) FROM sw_sharesbuy where userid=$_SESSION[uid]  and sh_name='$row[sh_name]' ");   

while($row1 = mysql_fetch_array( $result1 ))
{
$sumbuy=$row1['sum(totbuy)'];

$result2 = mysql_query("SELECT sum(totsell) FROM sw_sharessell where userid=$_SESSION[uid]  and sh_name='$row[sh_name]' ");   

while($row2 = mysql_fetch_array( $result2 ))
{
$sumsell=$row2['sum(totsell)'];

$sumpresent=$sumbuy-$sumsell;

if($sumpresent>0)
{
echo "<tr><td>"; 
	echo $row['sh_name'];
	echo "</td><td>"; 
	echo $sumpresent;
        echo "</td><td>";
    echo $row['curr_cost'];
	echo "</td></tr>"; 
}
else
{}

}
}
} 
echo "</table>";
echo"</div>";


?>
















</div>

<br />
<br />

</div>

</body>
</html>
