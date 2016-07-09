<?php #dglibrary.php
function mysqli($server, $username, $password, $db) {
	 $connect = mysql_connect($server, $username, $password) or die(mysql_error());
	 mysql_select_db($db) or die(mysql_error());
	 return $connect;
}
?>
