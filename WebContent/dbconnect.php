<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$servername = 'lochnagar.abertay.ac.uk';
$username = 'sql1505254';
$password = 'OWR6GSorV8Z2';
$dbname = 'sql1505254';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_errno > 0){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}


?>
