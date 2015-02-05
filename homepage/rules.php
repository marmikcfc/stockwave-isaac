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
<title>StockWave Rules</title>
<style>
div#content
{
margin:0 auto;
padding:0;
background:white;
width:960px;
height:1000px;

}
div#header
{
margin:0 auto;
background:white;
padding:0;
width:960px;
height:71px;
position:relative;
}
div#header h1
{
position:absolute;
z-index:8;
width:271px;
height:71px;
background:url(img/logo.png) no-repeat;
padding:0;
margin:0;
}
div#header h1 a
{
width:271px;
height:71px;
display:block;
text-indent:-9999px;
}

div#header img
{
position:absolute;
left:313px;
top:0px;
}

div#showdate
{
position:absolute;
left:600px;
top:50px;
margin:0;
padding:0;
text-align:right;
width:360px;
font-family:Verdana, Arial, Helvetica, sans-serif;

}

div#topmenu
{
width:600px;
height:30px;
text-align:right;
position:absolute;
left:360px;
top:0px;
background:#E9E9E9;
margin:0;
padding:0;
}
div#topmenu ul
{
list-style-type:none;
margin:0;
padding:0;
}
div#topmenu li
{
display:inline;
margin:0;
padding:0;
}
div#topmenu li a
{
text-decoration:none;
font-weight:bold;
padding-left:10px;
padding-right:10px;
font-size:80%;
color:black;

}

div#topmenu li a:hover
{
text-decoration:none;
font-weight:bold;
padding-left:10px;
padding-right:10px;
font-size:80%;
color:gray;

}




div#topmenu blockquote
{
display:inline;
margin:0;
padding:0;
font-size:50%;
}
div#mainmenu
{
width:960px;
height:40px;
position:relative;
background:#347C17;
/*#347C17  #347235; */
margin:0 auto;
padding:0;
text-align:center;
margin-bottom:5px;
}

div#mainmenu ul
{
list-style-type:none;
margin:0;
padding:0;
padding-top:10px;
}
div#mainmenu li
{
display:inline;
margin:0;
padding:0;

}
div#mainmenu li a
{
text-decoration:none;
font-weight:bold;
padding-left:20px;
padding-right:20px;
color:white;

}

div#mainmenu li a:hover
{
text-decoration:none;
font-weight:bold;
padding-left:20px;
padding-right:20px;
color:black;

}

div#mainmenu blockquote
{
display:inline;
margin:0;
padding:0;
color:#00CC00;
}
div#maincontent
{
width:960px;
height:900px;
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

div#footer
{
width:960px;
height:30px;
padding:0;
margin:0 auto;
position:absolute;
top:850px;
border-top:1px solid green;
text-align:center;

}

div#rulz
{
	margin:0;
	padding:0;
	width:800px;
	margin:0 auto;
	text-align:left;
	color:gray;
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
<li> <a href="index.php"> Top trades  </a></li> <blockquote> | </blockquote>
<li> <a href="pasttrades.php">Past trades   </a></li><blockquote> | </blockquote>
<li> <a href="portfolio.php"> Portfolio </a></li><blockquote> | </blockquote>
<li> <a href="terminal.php"> Trader terminal  </a>
</ul>
</div>

<MARQUEE WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA >Welcome to The Stock Wave </MARQUEE>

<div id="maincontent">



<!-- this is ur top ten displayer code  -->
<h1 style="color:green;"> RULES </h1>
<div id="rulz">
<p>
1:You can view the top 10 traders along with your own portfolio,past transactions and a trader terminal in this comprehensive simulation of the real world
</p>
<p>2:The Event Starts from 27th September 2010 - 1st October 2010
</p>
<p>3:Since the rates are real time the game will be on during the normal market hours i.e. 9:00 am to 3:30 pm.
</p>

</div>











<div id="footer">

<p style="text-align:center; color:black;"> &copy; Copyright IEEE-TSEC 2010</p>
</div>



</div>

<br />
<br />

</div>

</body>
</html>
