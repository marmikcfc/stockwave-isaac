<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StockWave ISAAC 2010</title>
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
width:314px;
height:350px;
margin:0;
float:left;

padding:0;
padding-top:70px;
padding-left:20px;
background:url(../homepage/img/login2.png) no-repeat;

margin-top:50px;
margin-left:10px;
color:green;
font-size:110%;
}

#text1
{
border:1px yellow solid;
width:140px;
height:20px;
border:solid 1px #E6DB55;
background-color:#FFFFE0;
margin-bottom:10px;	
font-size:100%;
color:green;
}
#login1
{

width:73px;
height:23px;
background:url(../homepage/img/sub1.png) no-repeat;
border:0px;
margin:0;
padding:0;
cursor: pointer; 
  cursor: hand; 
  margin-top:10px;

color:white;

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
	background:url(../homepage/img/LoginImages.gif) no-repeat bottom right;
	
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

td#upper
{
	padding-top:10px;
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
<li> <a href="login.php"> Home  </a></li> <blockquote> | </blockquote>
<li> <a href="../homepage/aboutus.php"> About Us  </a></li><blockquote> | </blockquote>
<li> <a href="../homepage/contactus.php"> Contact Us  </a></li><blockquote> | </blockquote>
<li> <a href="http://www.isaac2010.com" target="_blank"> Isaac2010 </a>
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
<li> <a href="login.php"> Login  </a></li> <blockquote> | </blockquote>
<li> <a href="register.php">Register </a><blockquote> | </blockquote>
<li> <a href="satcoregister.php">Register Satco </a><blockquote> | </blockquote>
<li> <a href="http://www.satcodirect.com">Sponsor </a>
</ul>
</div>

<MARQUEE WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA >Welcome to The Stock Wave </MARQUEE>

<div id="maincontent">



<!-- this is ur top ten displayer code  -->



<div id="mainlogin">


<form id="form1" action="checksatcoregister.php" method="post">
<table>
<tr>
<td>
Firstname: 
</td>
<td >
<input input id="text1" type="text" name="firstname" /> 
</td>

</tr>
<tr>
<td>
Lastname: 
</td>
<td >
<input input id="text1" type="text" name="lastname" /> 
</td>
</tr>
<tr>
<td>
Contactno (+91): 
</td>
<td >
<input input id="text1" type="text" name="contactno" /> 
</td>
</tr>
<tr>
<td>
College Name: 
</td>
<td >
<input input id="text1" type="text" name="collgname" /> 
</td>
</tr>

<tr>
<td colspan="2" style="padding-left:120px; padding-top:0px;">
 <input id="login1" type="submit" name="Register"  value="" />  
</td>
</tr>
</table>

</form>


</div>



<div id="rightdiv">
<p id="rightp"> 
A word from our sponsors.
</p>
<p id="rightp">
SATCO SECURITIES & FINANCIAL SERVICES LTD (SATCO) has been promoted by "Satguru Group" of companies that enjoys leadership status in the activities of construction, chemicals, pharmaceuticals, besides financial services. The Group Companies are managed by professionals and highly experienced, skilled and motivated staff. </p>

<p id="rightp">
The clients of SATCO can get their contracts as well as view their ledger account apart from various other trade related reports on the Internet. A good team of technical and fundamental research supported by the requisite software (CLine, News Clip, Meta Stock, Analyst, Optimist & Risk Manager) provides guidance to its clients. The Technical Analyst is available on-line throughout market hours for convenience of our valued Clients. </p>
<p id="rightp">
We value our association with our clients and hence provide services embodying value, quality and care and uphold the highest level of professional integrity. </p>
<p id="rightp">
A very special offer for stockwave players.You can register a account with us for only Rs. 100 /-.Kindly give in your details in the adjoining form.We will get back to you
</p>

</div>



</div>

<div id="footer">

<p style="text-align:center; color:#666;"> &copy; Copyright IEEE-TSEC 2010</p>
</div>

</div>

</body>
</html>






