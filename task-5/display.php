<?php 
   
    $link = mysqli_connect("localhost", "nishi", "nishi@admin", "task5");
    


    $q1 = "SELECT * FROM task5.users;";
    $r1 = mysqli_query($link, $q1);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User List</title>
        <style>
            img{
                max-width: 100px;
                max-height: 100px;
                
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th> Username </th><th> Profile Picture </th> <th> Profile </th>
            </tr>
            <?php 
                while($r = mysqli_fetch_array($r1)){
                    echo "<tr><td>".$r['username']."</td><td><img src =\"uploads/".$r['username']."/".$r['image']."\"></img></td><td><p>".$r['profile']."</p></td></tr>";
                }
            ?>
        </table>
    </body>
</html>