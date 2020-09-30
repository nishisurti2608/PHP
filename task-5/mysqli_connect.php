<?php 
define('DB_USER', 'nishi');
define('DB_PASSWORD', 'nishi@admin');
define('DB_HOST', 'localhost');
define('DB_NAME', 'task5');


$sql = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );


mysqli_set_charset($sql, 'utf8');

?>