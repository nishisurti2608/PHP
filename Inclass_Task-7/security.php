<?php 
    require('mysqli_connect.php');
    $q1 = "SELECT * FROM guestforum.Message;";
    $r1 = mysqli_query($connect, $q1);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['message'])){
            echo "<p>Please fill the Comment Field</p>";
        } else{
            $comment = $_POST['comment'];
            $comment = $connect -> real_escape_string(filter_var($comment, FILTER_SANITIZE_STRING));
          
            if(trim($comment) == ""){
                echo "<p>Please enter comment.</p>";
            } else{
                $sql = "INSERT INTO guestforum.Message (comment) VALUES ('$comment')";
                mysqli_query($connect, $sql);
                $connect -> close();
            }
        }
    }
?>
<html>
    <head>
        <style>
            
            td, th{
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <form action="security.php" method="POST">
            <label for="comment">Enter a comment <input type="text" name="comment" id="comment"></label>
            <input type="submit" value="Comment">
        </form>
        <br>
        <br>
        <table>
            <tr>
                <th>Message Id</th>
                <th>Comment</th>
            </tr>
            <?php
                while($r = mysqli_fetch_array($r1)){
                    echo "<tr><td>".$r['messageID']."</td><td><p>".$r['comment']."</p></td></tr>";
                }
            ?>
        </table>
    </body>
</html>