<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'mini';

$mysqli = new mysqli($hostName, $userName, $password, $databaseName);

if ($mysqli->connect_error){
    echo "Connection Error....<br>";
}
else{
    echo "";
}
?>