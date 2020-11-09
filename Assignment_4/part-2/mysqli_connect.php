<?php
define('DB_USER', 'nishi');
define('DB_PASSWORD', 'nishi@admin');
define('DB_HOST', 'localhost');
define('DB_NAME', 'message_board');


$dbc = new MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if ($dbc->connect_error) {
	echo $dbc->connect_error;
	unset($dbc);
} else { 
	$dbc->set_charset('utf8');
}