<?php
session_start();

if(isset($_SESSION['views']))
{
//functionname($_SESSION[uname]);
$hour=date("G");
$min=date("i");


if($hour>="9"&& $hour<="14")
{

}
else if($hour=="15" && $min<="30")
{


}
else
{
	echo"Shares Can Be Buy/Sold During Market Hours Only i.e 9:00 A.M - 3.30 P.M";
	exit();

}


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

<script language=javascript>



function output1(name,a)
{
document.getElementById(a).checked = false;
//document.getElementById("div1").style.display = "none";
//alert(a);
//alert(name);


// In the varArray are all the variables you want to give with the function
	var varArray = new Array();
	varArray[0] = name;

   
	// the url which you have to reload is this page, but you add an action to the GET- or POST-variable
	var url="<?php echo $_SERVER[PHP_SELF];?>?action1=phpFunction&vars="+varArray;
	
	// Opens the url in the same window
	   window.open(url, "_self");
}

function functionbuy(name,totbuy)
{
	
if(check_field('takecount',totbuy)==true)
{
//alert(name);
//alert('balance');
var field1 = document.getElementById('takecount');

var varArray1 = new Array();
	varArray1[0] = name;
        varArray1[1]=field1.value;

   
	// the url which you have to reload is this page, but you add an action to the GET- or POST-variable
	var url="<?php echo $_SERVER[PHP_SELF];?>?action2=phpFunctionbuy&vars="+varArray1;
	
	// Opens the url in the same window
	   window.open(url, "_self");


}

}



function functionsell(name,totbuy)
{
if(check_fieldsell('takecount',totbuy)==true)
{
//alert(name);
//alert('balance');

var field1 = document.getElementById('takecount');

var varArray1 = new Array();
	varArray1[0] = name;
        varArray1[1]=field1.value;

   
	// the url which you have to reload is this page, but you add an action to the GET- or POST-variable
	var url="<?php echo $_SERVER[PHP_SELF];?>?action3=phpFunctionsell&vars="+varArray1;
	
	// Opens the url in the same window
	   window.open(url, "_self");


}

}


 function check_field(id,totbuy) {
  
           var field = document.getElementById(id);
            if(field.value=="")
			{
                alert('Enter Total Shares To Buy/Sell');
  				return false;
			}
  
           else if (isNaN(field.value)) 
  		{
                alert('Enter a Valid number');
                field.value=" ";
                return false;
            	}
				else if(field.value<0)
				{
				 alert('Negative Number Not Allowed');
                field.value=" ";
                return false;	
				}
				else if(field.value==0)
				{
				 alert('Enter Proper Buy/Sell Value');
                field.value=" ";
                return false;	
				}
          
		else
		{
	     var new1=Math.floor(field.value);
		 field.value=new1;
	
		 return true;
		}
		}
		
		
		function check_fieldsell(id,totbuy) {
  
           var field = document.getElementById(id);
            if(field.value=="")
			{
                alert('Enter Total Shares To Buy/Sell');
  				return false;
			}
  
           else if (isNaN(field.value)) 
  		{
                alert('Enter a Valid number');
                field.value=" ";
                return false;
            	}
				
					else if(field.value<0)
				{
				 alert('Negative Number Not Allowed');
                field.value=" ";
                return false;	
				}
				else if(field.value==0)
				{
				 alert('Enter Proper Buy/Sell Value');
                field.value=" ";
                return false;	
				}
            else if(field.value>totbuy)
		      {
				   alert('You Dont Have These Many Shares');
                field.value=" ";
                return false;
				  
			  }
		else
		{
			var new1=Math.floor(field.value);
		 field.value=new1;
	     return true;
		}
		
        }

</script>

 
<?php 
   if (($_GET[action2]==phpFunctionbuy)){
	// Retrieve the GET parameters and executes the function
	  $funcName	 = $_GET[action2];
	  $vars	  = $_GET[vars];
	  $funcName($vars); 
	 } else if (isset($_POST[action2])){
	  // Retrieve the POST parameters and executes the function
	  $funcName	 = $_POST[action2];
	$vars	  = $_POST[vars];
	$funcName($vars); 
	  
	 }
 else {


   }
	 
   function phpFunctionbuy($v1){
	// makes an array from the passed variable 
	// (note: $vars = 1 string while it used to be a javascript Array)
	// with explode you can make an array from 1 string. The seperator is a , 
	$varArray = explode(",", $v1);
	
     
include 'databasepwd.php';
 
 mysql_connect($dbaddress,$dbuname,$dbpswd);


mysql_select_db($dbname);

if($varArray[0]=='M')
{
$varnm='M&M';
$varArray[0]=$varnm;

}

$result = mysql_query("SELECT * FROM sw_portfolio where userid=$_SESSION[uid] ");
$result1 = mysql_query("SELECT * FROM sw_shares where sh_name='$varArray[0]' ");

while($row = mysql_fetch_array($result))
  {
	  
  //echo "Your User balace Is : ";
  //echo $row['balance'];
   //$uid=$row['userid'];
 // echo "<br />";
 

 
while($row1 = mysql_fetch_array($result1))
{
if($row['balance']>=(($row1['curr_cost']*$varArray[1]))+$brokage)
{

$today = date("Y/m/d");

 $brokage=($row1['curr_cost']*$varArray[1])*0.0025;
$totcost=$row1['curr_cost']*$varArray[1]+$brokage;
$newbalance=$row['balance']-(($row1['curr_cost']*$varArray[1])+$brokage);	
mysql_query("UPDATE sw_portfolio SET balance = $newbalance
WHERE userid=$_SESSION[uid]");

mysql_query("INSERT into sw_sharesbuy values($_SESSION[uid],'$varArray[0]',$varArray[1],$row1[curr_cost],$totcost,'$today')");


 echo' <script language="javascript">';
  echo ' alert("Transaction Successful"); ';
  echo ' </script> ';
}
else
{
 echo' <script language="javascript">';
  echo ' alert("Not Scufficent balance"); ';
  echo ' </script> ';
  
}
}
  //echo $varArray[1];
  }



echo '<meta http-equiv="refresh" content="0;url=terminal.php">';
}
  ?>
  
  
  <?php
// Sell code here

   if (($_GET[action3]==phpFunctionsell)){
	// Retrieve the GET parameters and executes the function
	  $funcName	 = $_GET[action3];
	  $vars	  = $_GET[vars];
	  $funcName($vars); 
	 } else if (isset($_POST[action3])){
	  // Retrieve the POST parameters and executes the function
	  $funcName	 = $_POST[action3];
	$vars	  = $_POST[vars];
	$funcName($vars); 
	  
	 }
 else {


   }
	 
   function phpFunctionsell($v1){
	// makes an array from the passed variable 
	// (note: $vars = 1 string while it used to be a javascript Array)
	// with explode you can make an array from 1 string. The seperator is a , 
	$varArray = explode(",", $v1);
	
      
include 'databasepwd.php';
 
     mysql_connect($dbaddress,$dbuname,$dbpswd);


mysql_select_db($dbname);

if($varArray[0]=='M')
{
$varnm='M&M';
$varArray[0]=$varnm;
}


$result = mysql_query("SELECT * FROM sw_portfolio where userid=$_SESSION[uid] ");
$result1 = mysql_query("SELECT * FROM sw_shares where sh_name='$varArray[0]' ");

while($row = mysql_fetch_array($result))
  {

  //echo "Your User balace Is : ";
  //echo $row['balance'];
   //$uid=$row['userid'];
 // echo "<br />";
while($row1 = mysql_fetch_array($result1))
{
	 $brokage=($row1['curr_cost']*$varArray[1])*0.0025;
		 $addbal=($varArray[1] * $row1['curr_cost'])-$brokage; 



$today = date("Y/m/d");



$newbalance=$row['balance']+$addbal;
mysql_query("UPDATE sw_portfolio SET balance = $newbalance
WHERE userid=$_SESSION[uid]");

mysql_query("INSERT into sw_sharessell values($_SESSION[uid],'$varArray[0]',$varArray[1],$row1[curr_cost],$addbal,'$today')");


 echo' <script language="javascript">';
  echo ' alert("Transaction Successful"); ';
  echo ' </script> ';


}
  //echo $varArray[1];
  }







echo '<meta http-equiv="refresh" content="0;url=terminal.php">';	
   }



?>
<style>

MARQUEE#mark1
{
text-transform:uppercase;
}

p#mark
{
	display:inline;
	color:green;
	padding-right:20px;
}

p#markred
{
	display:inline;
	color:red;
	padding-right:20px;
}


div#maincontent
{
width:960px;
height:850px;
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

div#mainterminal
{
width:900px;
height:700px;
border:1px solid white;

padding:0;
margin:0 auto;
position:relative;
}
div#div1
{
width:900px;
height:70px;
top:05px;
position:absolute;
margin:0 auto;

}
div#sharesdiv
{
margin:0 auto;
margin-top:70px;
padding:0;
width:900px;
height:600px;
overflow:auto;

position:relative;
}

caption { padding : .5em;
letter-spacing : .2em; }
table#sharestable { width:500px; position:absolute; top:05px; left:200px; text-align:left; color:#333;outline:1px solid #d4d4d4;
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


h1#rules { 
position : absolute; left : 790px;
top : 300px;
width: 170px;
height : 57px;
font-size:16px;
padding : 0;
margin : 0;
color:white;
background : url(img/left2.PNG) no-repeat; }

h1#rules  a { display : block;
width: 170px;
height : 57px;
text-decoration:none;
color:white;
padding-top:05px;
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
<li> <a href="#"> Trader terminal  </a>
</ul>
</div>

<MARQUEE id="mark1" WIDTH=100% BEHAVIOR=SCROLL DIRECTION=left BGColor=#E3E4FA >
<p style="display:inline; text-transform:capitalize; padding-right:05px; color:blue;">~ ~ ~ ~   Welcome to StockWave </p>
<?php 

echo'<p style=" text-transform:capitalize; padding-right:150px; display:inline; color:blue;" >';
echo "$_SESSION[uname]";
echo" ~ ~ ~ ~";
echo"</p>";
// to display share prices


include 'databasepwd.php';


// Make a MySQL Connection
mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);


$result = mysql_query("SELECT * FROM sw_shares ORDER BY sh_name ");  
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table

	echo $row['sh_name'];
	echo"  ";
	if($row['curr_cost']>=$row['prev_cost'])
	{
	echo'<p id="mark">';
	echo $row['curr_cost'];
	echo '<img src="img/green.png"  width="12px" height="12px" style="display:inline;" />';
	echo"(";
	$res=$row['curr_cost']-$row['prev_cost'];
	$english_format_number = number_format($res, 2, '.', '');
	echo $english_format_number;
	echo") ";
	
	echo"</p>";
	}
	else
	{
	echo'<p id="markred">';
	echo $row['curr_cost'];
	echo '<img src="img/red.png"  width="12px" height="12px" style="display:inline;" />';
	echo"(";
	$res=$row['curr_cost']-$row['prev_cost'];
	echo $res;
	echo") ";
	echo"</p>";	
	}

} 



?>
<p style="display:inline; padding-right:05px; color:blue; text-transform:none;">~ ~ ~ ~   SENSEX ... the index the world tracks  ~ ~ ~ ~</p>
</MARQUEE> 

<div id="maincontent">



<!-- this is ur top ten displayer code  -->

<div id="mainterminal">


<?php


include 'databasepwd.php';


// Make a MySQL Connection
mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);


$result = mysql_query("SELECT * FROM sw_shares ORDER BY sh_name LIMIT 50 ");  

$count=1;
$name1="roe";





include 'sharelinks.php';
$pi=0;

echo'<div id="sharesdiv">';
echo "<form method=post name='form1' action=''>";
echo '<table id="sharestable">';
echo "<tr> <th>Share Name</th> <th>Current Price</th> <th>Read More</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo "<tr><td>";
    //     echo" <input type="radio" name=$row['sh_name'] value=$row['sh_name'] /> ";
$name1=$row[sh_name];


echo "<input type=radio id=$count name=$name1 value=false onClick=output1('$name1',$count);> ";
$count++;

//	echo $row['sh_name'];

echo $name1;
	echo "</td><td>"; 
	echo $row['curr_cost'];
		echo "</td><td>"; 
		echo '<a href="';
		echo $share[$pi];
		$pi=$pi+1;
		echo ' " style=" text-decoration:none; color:black; display:block;"> READ MORE <a>';
	echo "</td></tr>"; 
} 



echo "</table>";
echo "</form>";
echo"</div>";




?>




  <?php 
   if (($_GET[action1]==phpFunction)){
	// Retrieve the GET parameters and executes the function
	  $funcName	 = $_GET[action1];
	  $vars	  = $_GET[vars];
	  $funcName($vars); 
	 } else if (isset($_POST[action1])){
	  // Retrieve the POST parameters and executes the function
	  $funcName	 = $_POST[action1];
	$vars	  = $_POST[vars];
	$funcName($vars); 
	  
	 }
 else {


   }
	 
   function phpFunction($v1){
	   
	   
	// makes an array from the passed variable 
	// (note: $vars = 1 string while it used to be a javascript Array)
	// with explode you can make an array from 1 string. The seperator is a , 
	$varArray = explode(",", $v1);
	



$df=0;

if($varArray[0]=='M')
{
$varnm='M&M';
$varArray[0]=$varnm;
$df=1;
}





include 'databasepwd.php';
 
   mysql_connect($dbaddress,$dbuname,$dbpswd);



mysql_select_db($dbname);
$result4 = mysql_query("SELECT * FROM sw_sharesbuy where userid=$_SESSION[uid] and sh_name='$varArray[0]'");
$totbuy1=0;
while($row4 = mysql_fetch_array($result4))
  {
	$totbuy1=$totbuy1+$row4['totbuy'];
  }
	
$result5 = mysql_query("SELECT * FROM sw_sharessell where userid=$_SESSION[uid] and sh_name='$varArray[0]'");

while($row5 = mysql_fetch_array($result5))
  {
	$totbuy1=$totbuy1-$row5['totsell'];
  }
 
	


echo "<div id=div1>";
        echo'<a style="color:black; margin-right:10px;">';
	echo "$varArray[0]:";
	if($df==1)
	{
	  $varArray[0]='M%26M';
	
	}
        echo"</a>";
	
        echo'<input id="takecount" type=text name=takecount style="width:100px;
height:20px;border:solid 1px green;background-color:#FFFFE0;font-size:100%;color:gray;" />';
//#E6DB55
echo"<input  type=submit name=buy value=buy onClick=functionbuy('$varArray[0]',$totbuy1);>";
echo"<input  type=submit name=sell value=sell onClick=functionsell('$varArray[0]',$totbuy1);>";
echo "<br>";
	echo' <p style="color:green; font-weight:bold; display:inline; text-align:centre;">Shares You Have :';
	echo $totbuy1;
         echo "</p>";
   echo"</div>";
//$varArray[0],document.form1.takecount.value
	
 
   }
   

  ?>





</div>


<h1 id="rules">
<a>Balance: <br /><?php  

include 'databasepwd.php';
 
   mysql_connect($dbaddress,$dbuname,$dbpswd);



mysql_select_db($dbname);
$result45 = mysql_query("SELECT balance from sw_portfolio where userid=$_SESSION[uid]");

while($row45 = mysql_fetch_array($result45))
  {
	echo $row45['balance'];

  }




?> </a>
</h1>




<br />
<br />
<br />
<br />



<div id="footer" style="border-top:1px solid green;">

<p style="text-align:center; color:black;"> &copy; Copyright IEEE-TSEC 2010</p>
</div>

</div>


</div>
 <?php include 'calltimer.php'; ?>                                                       