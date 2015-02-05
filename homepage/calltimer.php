<?php


include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);

$sql="select * FROM sw_timer";
//$sql="select * from sw_login";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
  {
	 
	
if($row['time']<=time())
{
	$skiptime=60; // 5mins yaar
	$newtime=time()+$skiptime;
	$sql1="update sw_timer set time=$newtime ";
    mysql_query($sql1);
	
include 'old.php';
include 'getdata1.php';


        

}  
else
{
	
	}
	  
  }
  



?>