
<?php

include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);


$result=mysql_query("SELECT userid from sw_portfolio");

while($row = mysql_fetch_array($result))
{
$result1=mysql_query("SELECT sum(totbuycost) from sw_sharesbuy where userid=$row[userid]");
$result2=mysql_query("SELECT sum(totsellamt) from sw_sharessell where userid=$row[userid]");



while($row1 = mysql_fetch_array($result1))
{
$ans=$row1['sum(totbuycost)'];
mysql_query("UPDATE sw_portfolio SET balance=1000000-$ans where userid=$row[userid]");

}



while($row2 = mysql_fetch_array($result2))
{
$ans1=$row2['sum(totsellamt)'];
mysql_query("UPDATE sw_portfolio SET balance=balance+$ans1 where userid=$row[userid] ");

}





}












?>