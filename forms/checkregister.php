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

else if($_POST["username"] == "")
{
print "user name not inserted";
exit();
}

else if(strlen($_POST["username"])<6)
{
print "user name not greater than 5 characters";
exit();
}

else if($_POST["password"] == "")
{
print "password not inserted";
exit();
}

else if($_POST["password"]!=$_POST["cpassword"])
{
print "Passwords Don't Match";
exit();
}

else if(strlen($_POST["password"])<6)
{
print "Password not greater than 5 characters";
exit();
}

else
{


}






include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);
mysql_select_db($dbname);
$no=$_POST[contactno];
$valid=1;
// checkif username is present

$result = mysql_query("SELECT username,password FROM sw_login");

while($row = mysql_fetch_array($result))
  {

   if($row['username']==$_POST[username])
    {
echo 'UserName Already Present';
$valid=0;
exit();
	}
  
   else
   {  }
  }
  







$sql="INSERT INTO sw_register (firstname,lastname,contactno,collgname,username,password,latest)
VALUES
('$_POST[firstname]','$_POST[lastname]','$no','$_POST[collgname]','$_POST[username]','$_POST[password]','y')";

mysql_query($sql);
 



$result = mysql_query("SELECT userid FROM sw_register where username='$_POST[username]' and password='$_POST[password]' ");

while($row = mysql_fetch_array($result))
  {
  $uid=$row['userid'];
echo 'Registration Sucessful - <a href="login.php">Goto Home Page </a> And Login. ';
}



$sql="INSERT INTO sw_login (userid,username,password,type,active)
VALUES ($uid,'$_POST[username]','$_POST[password]','user','y')";
mysql_query($sql);

 $str2 = ' ';

 $uname=$_POST['firstname'].$str2.$_POST['lastname'];

$sql="INSERT INTO sw_portfolio (userid,uname,balance)
VALUES ($uid,'$uname',1000000)";
mysql_query($sql);
 

?> 