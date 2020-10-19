

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $userstr = $_POST["string"];
    
    function rgx($regex, $string)
    {
       
        //Checking and printing the declared regex function
        echo (preg_match($regex, $string) == 0 ? "NO" : "YES");
        echo " '$regex' IN STRING: '$string' \n";
    }
    //Using the rgx function to make sure that the user has entered the hexa decimal string 
    rgx("/^[0-9A-F]{2}$/",$userstr);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
 
    <link rel="stylesheet" href="style.css" />
    <title>Assignment-3</title>
  </head>
  <body>
<div class="container">

  <div class="main-form">
    <div class="inputs">
    <h1 class="header">Assignment-3 Nishi Surti </h1>
<form action="part-2.1.php" method = "post">

<input type = "text" class="username" name = "string" placeholder="Enter String" maxlength="2" > 
<button class="btn">Submit</button>


</div>
</div>
</form>
</div>
</body>
</html>