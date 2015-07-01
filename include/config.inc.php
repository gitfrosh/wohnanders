<!-- Hier werden die Verbindungsdetails zur MySQL-Datenbank zusammengefasst -->
<?php

$dbname="36877m26571_3";
$dbhost="localhost";
$dbuser="36877m26571_3";
$dbpass="yQnEDTwD";

$dbconnection = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname,$dbconnection) or die(mysql_error());

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//////// Do not Edit below /////////
try {
    $dbo = new PDO('mysql:host=localhost;dbname='.$dbname, $dbuser, $dbpass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>
