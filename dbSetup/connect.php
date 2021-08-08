<?php 
global $host;
global $dbName;
global $user;
global $pass;
global $mysql;

$host = 'localhost';
$dbName = 'pbaCoursedb2014';
$user = 'root';
$pass = '';

$mysql = new mysqli($host, $user, $pass, $dbName);

if($mysql->connect_error){
    die(">> database connection error..". $mysql->connect_error);
}



?>