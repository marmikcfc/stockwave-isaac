<?php


if($_POST["firstname"] == "")
{
print "first name not inserted";
exit();
}
else if($_POST["lastname"] == "")
{
print "last name not inserted";
exit();
}

else if($_POST["contactno"] == "")
{
print "contactno not inserted";
exit();
}

else if(strlen($_POST["contactno"])<10)
{
print "Enter 10 digit mobile No";
exit();
}

else if(!is_numeric($_POST["contactno"]))
{
print "Enter only numbers";
exit();
}


else if($_POST["collgname"] == "")
{
print "college name not inserted";
exit();
}



else
{
echo "Registration Successful";

}



include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);
$no=$_POST[contactno];

$sql="INSERT INTO sw_registersatco (firstname,lastname,contactno,collgname)
VALUES
('$_POST[firstname]','$_POST[lastname]','$no','$_POST[collgname]')";

mysql_query($sql);


?>