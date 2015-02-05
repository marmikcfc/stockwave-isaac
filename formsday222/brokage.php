
<?php

include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);
$brokage=0.0015;

mysql_query("UPDATE sw_sharesbuy set totbuycost=totbuycost+(totbuycost*$brokage)");
mysql_query("UPDATE sw_sharessell set totsellamt=totsellamt+(totsellamt*$brokage)");

/*while($row = mysql_fetch_array($result))
  {

$finalresult=$row['totbuycost']*$brokage;

$fresult=$row['totbuycost']+$finalresult;
mysql_query("UPDATE sw_sharesbuy set ");


}*/

?>