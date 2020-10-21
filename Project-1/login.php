



<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home_page.php");
    exit;
}

require_once "config.php";
 

$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
 
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connect, $sql)){
          
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
        
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
     
                mysqli_stmt_store_result($stmt);
                
               
                if(mysqli_stmt_num_rows($stmt) == 1){                    
             
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                    
                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                          
                            header("location: home_page.php");
                        } else{
                           
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                  
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

          
            mysqli_stmt_close($stmt);
        }
    }
    
    
    mysqli_close($connect);
}
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
 
    <link rel="stylesheet" href="style.css" />
    <title>Turn the Page-Login</title>
  </head>
  <body>
<div class="container">
<form action="login.php" method="post">
  <div class="main-form">
    <div class="inputs">
      <h1 class="header">Sign In </h1>
      <input type="text" class="username" placeholder="username" name="username">
      <?php if (isset($username_err)): ?>
      	<span><?php echo $username_err; ?></span>
      <?php endif ?>
      <input type="password" class="password" placeholder="password" name="password">
      <?php if (isset($password_err)): ?>
      	<span><?php echo $password_err; ?></span>
      <?php endif ?>
      <button class="btn">Sign In</button>
      <p>Haven't Register Yet?<a href="signup.php">SignUp</a>
    </div>
  </div>
      </form>
</div>