<?php

include 'databasepwd.php';

$con = mysql_connect($dbaddress, $dbuname, $dbpswd);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db($dbname, $con);




$shname;


$uf1=file_get_contents("shares.txt");
$shnam=explode("\n",$uf1);

foreach ($shnam as &$value) {
$shname=trim($value);
$uf=file_get_contents($shname);
$users=explode(",",$uf);

$shnm=str_replace(".csv","",$value);
$shnm1=trim($shnm);
$cost=(double)$users[1];

mysql_query("UPDATE sw_shares SET prev_cost=curr_cost where sh_name='$shnm1'");
mysql_query("UPDATE sw_shares SET curr_cost=$cost where sh_name='$shnm1'");


echo $shnm1;
echo $cost;
echo "<br/>";
 }


mysql_close($con);

?>