<?php 

require('mysqli_connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if(!empty($_POST['username']) && !empty($_POST['message'])){
        $sql = "INSERT INTO messages (username, message) VALUES ('".$_POST['username']."', '".$_POST['message']."')";
        if ($dbc->query($sql) === TRUE) {
           
            echo "New data added !";
        } else {
          
            echo "Error: " . $sql . "<br>" . $dbc->error;
            }
    }else{
        echo "Please enter username and message.";
    }
}
?>