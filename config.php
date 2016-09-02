<?php
$server   = "localhost";
$database = "checkdown";
$username = "root";
$password = "";

/*$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
}*/

/* ### PDO ### 	*/	
try {
	$dbh = new PDO('mysql:host='.$server.';dbname='.$database.'', $username, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo 'connected';
}
catch (PDOException $e) {
	print "ERROR!: " . $e->getMessage() . "<br/>";
	echo 'DB Connect FAIL';
	die();
}

?>