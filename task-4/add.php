<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $link = mysqli_connect("localhost", "nishi", "nishi@admin", "task4");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


$name =  mysqli_real_escape_string($link,$_POST['username']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$phone = mysqli_real_escape_string($link,$_POST['phone']);


if(! empty($_POST['name']) && ! empty($_POST['email']) && ! empty($_POST['phone']))
{
    $sql = "INSERT INTO contacts (username, email, phone) VALUES ('$name', '$email', '$phone')";
    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}


 

mysqli_close($link);
   

   



     

    
}



?>