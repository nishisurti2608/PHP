<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
 
    <link rel="stylesheet" href="nav_style.css" />
    <title>Turn the Page</title>
  </head>
  
<nav role="navigation">
  <div id="menuToggle">

    <input type="checkbox" />
   
    <span></span>
    <span></span>
    <span></span>
    
  
    <ul id="menu">
      <a href="home_page.php"><li>Home</li></a>
      <a href="signout.php"><li>SignOut</li></a>
    
 
    </ul>
  </div>
  
</nav>

<a class="btn" href="signout.php">SignOut</a>
<div class="message"><h1>Hi,<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1></div>
</body>
</html>