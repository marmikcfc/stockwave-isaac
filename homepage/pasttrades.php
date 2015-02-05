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
height:1255px;
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

caption { padding : .5em;
letter-spacing : .2em; }
table#buy1 { width:700px; position:absolute; top:05px; left:130px; text-align:left; color:#333;outline:1px solid #d4d4d4;
border:5px solid #e5eecc;
position:absolute;

}
table#sell1 { width:700px; position:absolute; top:05px; left:130px; text-align:left; color:#333;outline:1px solid #d4d4d4;
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


div#sharesbuy
{
margin:0 auto;
padding:0;
width:960px;
height:500px;
overflow:auto;

position:relative;
}

div#sharessell
{

margin:0 auto;
margin-top:10px;
padding:0;
height:500px;
overflow:auto;

position:relative;

}

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
<li> <a href="index.php"> Top Traders  </a></li> <blockquote> | </blockquote>
<li> <a href="#">Past Trades   </a></li><blockquote> | </blockquote>
<li> <a href="portfolio.php"> Portfolio </a></li><blockquote> | </blockquote>
<li> <a href="terminal.php"> Trader Terminal  </a>
</ul>
</div>

<MARQUEE id="mark1" WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA >Welcome to StockWave 
<?php 
echo "$_SESSION[uname]"; 

?>
</MARQUEE> 

<div id="maincontent">

 <img src="img/shbyd.png"  width="500px" height="80px" />


<!-- this is ur past trades code  -->



<?php


include 'databasepwd.php';


// Make a MySQL Connection
mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);
$brokage;

$result = mysql_query("SELECT * FROM sw_sharesbuy where userid=$_SESSION[uid] ORDER BY buydate "); 


echo'<div id="sharesbuy" > ';
echo '<table id="buy1">';
echo "<tr> <th>Share Name</th> <th>Total Buy</th>  <th>Buy Rate</th> <th>Brokerage</th> <th>Total Buy Cost</th> <th>Buy Date</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	$brokage=$row['totbuy']*$row['buycost']*0.0010;
	
	// Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['sh_name'];
	echo "</td><td>"; 
	echo $row['totbuy'];
        echo "</td><td>"; 
echo $row['buycost'];
echo "</td><td>"; 
echo $brokage;
echo "</td><td>"; 

echo $row['totbuycost'];
echo "</td><td>"; 
echo $row['buydate'];

	echo "</td></tr>"; 
} 

echo "</table>";

echo"</div>";

?>





<!-- this is ur past trades code  -->

<hr width="700px" style="color:green;"/>
 <img src="img/shsld.png"  width="500px" height="80px" />

<?php


// shares sell code:

include 'databasepwd.php';


// Make a MySQL Connection
mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);


$result = mysql_query("SELECT * FROM sw_sharessell where userid=$_SESSION[uid] ORDER BY selldate "); 
 

echo'<div id="sharessell" > ';
echo '<table id="sell1">';
echo "<tr> <th>Share Name</th> <th>Total Sell</th>  <th>Sell Rate</th> <th>Brokerage</th> <th>Total Sell Profit</th><th>Sell Date</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	$brokage=$row['totsell']*$row['sellcost']*0.0010;
// Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['sh_name'];
	echo "</td><td>"; 
	echo $row['totsell'];
        echo "</td><td>"; 
echo $row['sellcost'];
echo "</td><td>"; 

echo $brokage;
echo "</td><td>"; 

echo $row['totsellamt'];
echo "</td><td>"; 
echo $row['selldate'];

	echo "</td></tr>"; 
} 

echo "</table>";

echo"</div>";

?>

<hr width="700px" style="color:green;"/>

<div id="footer" style="border-top:1px solid green;">

<p style="text-align:center; color:black;"> &copy; Copyright IEEE-TSEC 2010</p>
</div>

</div>



</div>

</body>
</html>
