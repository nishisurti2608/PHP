<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">




</head>
<body>

<div class="topnav">
  <a href="index.php">Home</a>

  <a class= "active" href="#">Contact</a>
  <a href="add_form.html"> Add Contact </a>

</div>

<div style="padding-left:16px">
  <h2>Nishi Surti</h2>
  <p>Task-4</p>
</div>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Email</th>
<th>Phone</th>
</tr>
</body>
</html>


<?php



$mysqli = new mysqli("localhost", "nishi", "nishi@admin", "task4");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


if ($result = $mysqli->query("SELECT id,username,email,phone FROM contacts")) {
  
if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"] . "</td><td>"
. $row["email"]. "</td><td>".$row["phone"]."</td></tr>";


    
  }
  echo "</table>";

    printf("<br> Select returned %d rows.\n", $result->num_rows);

 
    $result->close();
}
}




?>