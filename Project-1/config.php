
<?php



define('DB_SERVER', 'localhost'); //defining first db server 
define('DB_USERNAME','nishi' ); //defining username to connect my data base
define ('DB_PASSWORD', 'nishi@admin'); //defining password to my db user name
define ('DB_NAME', 'bookstore_schema'); //defining my db name


$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);



if ($connect==false){
    die("ERROR: Could not connect. " . mysqli_connect_error()); //die function will terminate all processes and mysqli_connect_error will print cause of a db connection error 
}
?>
