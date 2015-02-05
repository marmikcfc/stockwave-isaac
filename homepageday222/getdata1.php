<?php

include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);




$shname;
$insert;


$uf1=file_get_contents("quotes.csv");
$shnam=explode("\n",$uf1);

foreach ($shnam as &$value) 
 {

$shname=explode(",",$value);
//echo $value;

$i=0;
foreach ($shname as &$value1)
{

if($i==0)
{
//echo $value1;
$insert[$i]=$value1;
}
if($i==1)
{
$insert[$i]=(double)$value1;
}

$i=$i+1;

}

$shnm1=str_replace('"','',$insert[0]);



$shnm2=str_replace(".NS","",$shnm1);

//echo $shnm2;




mysql_query("UPDATE sw_shares SET prev_cost=curr_cost where sh_name='$shnm2' ");
mysql_query("UPDATE sw_shares SET curr_cost=$insert[1] where sh_name='$shnm2' ");


 }




?>