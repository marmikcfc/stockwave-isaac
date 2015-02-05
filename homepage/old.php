<?php
#!/usr/bin/php


$shname;
$plus='';
$new='.NS';


$uf1=file_get_contents("shares.txt");
$shnam=explode("\n",$uf1);
$count=1;
$shnfull;
foreach ($shnam as &$value) {

if($count<=50)
{
$shname=trim($value);
$shn=str_replace (".csv","",$shname);
$shnfu=$shn.$new;

$shnfull=$shnfull.$plus.$shnfu;
$plus='+';
$count++;
}







}


$data = file_get_contents("http://in.rd.yahoo.com/finance/quotes/internal/summary/download/*http://in.finance.yahoo.com/d/quotes.csv?s=$shnfull&f=sl1d1t1c1ohgv&e=.csv");

//echo $shnfull;
$fname='quotes.csv';

file_put_contents($fname, $data);


?>
