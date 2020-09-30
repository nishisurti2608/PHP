<?php


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $link = mysqli_connect("localhost", "nishi", "nishi@admin", "task5");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        require('mysqli_connect.php');
        if(empty($_POST['username']) || empty($_POST['profile'])){
            echo "<p>All Fields must be present</p>";
        } else{
            $name = $link -> real_escape_string($_POST['username']);
            $profile = $link -> real_escape_string($_POST['profile']);
            $image = $_FILES['upload']['name'];
            $tmpimage = $_FILES['upload']['tmp_name'];
            $target_file = "./uploads/".$name."/";
            mkdir($target_file);
            if(move_uploaded_file($tmpimage, $target_file.$image)){
                $sql = "INSERT INTO task5.users (username, profile, image) VALUES ('$name', '$profile', '$image')";
                mysqli_query($link, $sql);
              $link->close();
            } else{
                echo "<p> Error in uploading image. </p>";
            }
        }
    }
  }
  

?>
<html>
<body>
  <form enctype="multipart/form-data" actrion="upload.php" method="POST">
    <p>Username: <input type="text" name="username"></p>
    <p>Profile: <input type="text" name="profile"></p>

    <p>File: <input type="file" name="upload"></p>

    <p><input type="submit" name="submit" value="submit"></p>
  </form>
</body>
</html>
