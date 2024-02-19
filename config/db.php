<?php



$host ='localhost';
$dbname='crud';
$username ='root';
$password ='';

$mysqli =new mysqli($host,$username,$password,$dbname);

// check connection..
if ($mysqli->connect_error){
    die('Connection error: ' . $mysqli->connect_error);
}