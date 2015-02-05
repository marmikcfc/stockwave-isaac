<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About Satco Direct</title>
<style>
body
{
	/*background:url(img/header1.png) repeat-x;*/
	background:black;
	margin:0;
	padding:0;
	
	
}
div#content
{
margin:0 auto;
padding:0;
background:white;
width:960px;
height:711px;
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
background:url(../homepage/img/logo.png) no-repeat;
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
height:550px;
background:#FFFFFF;
position:relative;
margin:0 auto;
padding:0;
border:1px solid;
margin-top:5px;
text-align:center;
border-left:none;
border-right:none;
}

img#mm
{
position:absolute;
left:600px;
top:40px;
}


div#mainlogin
{

text-align: left;
width:300px;
height:300px;
margin:0;
float:left;

padding:0;
padding-top:60px;
padding-left:20px;
background:url(img/aboutus.jpg) no-repeat;

margin-top:50px;
margin-left:10px;
color:green;
font-size:120%;
}

#text1
{
border:1px yellow solid;
width:240px;
height:40px;
border:solid 1px #E6DB55;
background-color:#FFFFE0;
margin-bottom:10px;	
font-size:150%;
color:green;
}
#login1
{

width:121px;
height:40px;
background:url(img/submit2.png) no-repeat;
border:0px;
margin:0;
padding:0;
cursor: pointer; 
  cursor: hand; 
  margin-top:10px;

color:white;

}

#login1:hover
{

width:123px;
height:40px;
background:url(img/submit2.png) no-repeat;
border:0px;

}

#login1 a
{

width:100px;
height:40px;
padding-left:25px;
padding-top:10px;
text-decoration:none;
display:block;
margin:0;
color:white;
}

div#rightdiv
{
	width:550px;
	height:400px;
	float:left;
	margin-top:50px;
	margin-left:20px;
	position:relative;
	background:url(img/LoginImages.gif) no-repeat bottom right;
	
}
p#rightp
{
	font-size:80%;
	text-align:left;
	color:#666;
	z-index:1;

}

div#footer
{
	width:960px;
	height:50px;
    padding:0;
	margin-top:0 auto;
    background:#E6E6E6;
	text-align:center;

	
}

/* <img src="img/LoginImages.gif" width="424px" height="331px"  style="float:right; z-index:-1; position:absolute; top:250px; left:200px;"/>*/
</style>
</head>

<body>
<div id="content">

<div id="header" >
<h1> <a href="#">  LOGO  </a></h1>
<img  src="../homepage/img/topmenu_curb.gif" width="47px" height="30px" />

<div id="topmenu"> 

<ul>
<li> <a href="../forms/login.php"> Home  </a></li> <blockquote> | </blockquote>
<li> <a href="#"> About Us  </a></li><blockquote> | </blockquote>
<li> <a href="contactus.php"> Contact Us  </a></li><blockquote> | </blockquote>
<li> <a href="http://www.isaac2012.com"> Isaac2012 </a>
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
<li> <a href="../forms/login.php"> Login  </a></li> <blockquote> | </blockquote>
<li> <a href="../forms/register.php">Register </a><blockquote> | </blockquote>
<li> <a href="http://www.satcodirect.com">Sponsor </a>
</ul>
</div>

<MARQUEE WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA >Welcome to The Stock Wave </MARQUEE>

<div id="maincontent">



<!-- this is ur top ten displayer code  -->



<div id="mainlogin">




</div>



<div id="rightdiv">
<p id="rightp"> 

Welcome user to broking information site. We would be delighted to provide you our personalized services to facilitate execution of your buy and sell orders (both equity and debt securities) in a flawless and swift manner on the exchange of your choice, as we operate on NSE as well as BSE. You can trade even in Futures and Options on NSE.</p>
<p id="rightp">
You can either download our formts from the Registration option or directly <br />get in touch with our relationship executive and based on the discussion with <br /> you, we will deliver to you the following forms to be filled in and returned <br />alongwith the required enclosures :
</p>

<p id="rightp">
You would return the forms duly filled in alongwith the enclosures to our branch <br />where you would like to open your account for trading. The Branch Manager will <br />discuss with you about your investments and portfolio and understand your <br />specific requirements.</p>
<p id="rightp">	
Thereafter he will allot to you a Unique Client Code (UCC) which has<br /> to be used by you at the time of placing your order. He will also intimate<br /> to you the details of demat account opened with us. Once these accounts<br /> have been opened you will be free to place your orders with us after<br /> paying margin money. 	
</p>

</div>

</div>
<div id="footer">

<p style="text-align:center; color:#666;"> &copy; Copyright IEEE-TSEC 2010</p>
</div>

</div>

</body>
</html>
