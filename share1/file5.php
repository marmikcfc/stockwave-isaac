<?php
#!/usr/bin/php


$shname;


$uf1=file_get_contents("shares.txt");
$shnam=explode("\n",$uf1);
$count=1;

foreach ($shnam as &$value) {
if($count>=41&& $count<=50 )
{
$shname=trim($value);
$shn=str_replace (".csv","",$shname);
echo $shn;

$data = file_get_contents("http://in.rd.yahoo.com/finance/quotes/internal/summary/download/*http://in.finance.yahoo.com/d/quotes.csv?s=$shn.NS&f=sl1d1t1c1ohgv&e=.csv");
file_put_contents($shname, $data);

}
$count++;
}

?>
