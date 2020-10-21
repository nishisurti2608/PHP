<?php 

require_once "config.php";
 

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
       
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connect, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
      
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

      
            mysqli_stmt_close($stmt);
        }
    }



    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    
 
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please enter confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    
    

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connect, $sql)){
    
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
        
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
         
            if(mysqli_stmt_execute($stmt)){
            
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

       
            mysqli_stmt_close($stmt);
        }
    }
}
}
    
    // Close connection
    mysqli_close($connect);

    ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
 
    <link rel="stylesheet" href="style.css" />
    <title>Turn the Page- SignUp</title>
  </head>
  <body>
<div class="container">
<form action="signup.php" method="post">
  <div class="main-form">
    <div class="inputs">
    
      <h1 class="header">SignUp </h1>
     
      <input type="text" class="username" placeholder="username" name="username">
      <?php if (isset($username_err)): ?>
      	<span><?php echo $username_err; ?></span>
      <?php endif ?>
      <input type="password" class="password" placeholder="password" name="password">
      <?php if (isset($password_err)): ?>
      	<span><?php echo $password_err; ?></span>
      <?php endif ?>
      <input type="password" class="password" placeholder="confirm password" name="confirm_password">
      <?php if (isset($confirm_password_err)): ?>
      	<span><?php echo $confirm_password_err; ?></span>
      <?php endif ?>
      <button class="btn">Sign Up</button>
      <p>Already have an account?<a href="login.php">SignIn</a>
</form>
    </div>
  </div>
</div>