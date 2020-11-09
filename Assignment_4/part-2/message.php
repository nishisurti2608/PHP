<?php
require('mysqli_connect.php');
$sql_query = "SELECT * FROM messages";
$result = $dbc->query($sql_query);

if ($result -> num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo "<br>Username: " . $row["username"]. " ,  Message: " . $row["messages"];
    }
} else {
    echo "Nothing to show!";
}
?>