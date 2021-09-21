<?php
    $host = "localhost";
    $db= "tasks";
    $user = "root";
    $password = "a";
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
	$conn = new PDO($dsn, $user, $password);

?>