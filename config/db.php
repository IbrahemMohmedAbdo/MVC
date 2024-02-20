<?php

$host = 'localhost';
$dbname = 'crud';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die('Connection error: ' . $mysqli->connect_error);
}
