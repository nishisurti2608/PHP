<?php 

 
// Define variables and initialize with empty values

$userName = $userPassword = $userAge = $userCity = $userCountry= "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $testage=strip_tags($_POST['age']);
    $testcity=trim(strip_tags($_POST['city']));
    $testcountry=strip_tags($_POST['country']);

if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $userName = strip_tags($_POST["username"]);
          

           
        }
    


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $userPassword = strip_tags($_POST["password"]);
    }

    //Validate Age 

    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter a age.";     
    } 
    if (filter_var($testage, FILTER_VALIDATE_INT, array("options" => array("min_range" => 18, "max_range" => 120))) === false){
        $age_err = "Invalid Age ! Please Enter Age between 18 to 120";
    }
        
     else{
       
        $userAge = strip_tags($_POST['age']);
    }

    //validate city

    if(empty(trim($_POST["city"])))
    {
        $city_err = "Please enter a city.";     
    } elseif(!preg_match("/^[A-Za-z\\- \']+$/",$testcity))
    {
        $city_err = "Invalid City Name";
    } 
    else
    {
        $userCity = strip_tags($_POST['city']);
    }

    //validate country

    if(empty(trim($_POST["country"]))){
        $country_err = "Please enter a country.";     
    } elseif(!preg_match("/^[A-Za-z\\- \']+$/",$testcountry)){
        $country_err = "Invalid country Name";
    } else{
        $userCountry = strip_tags($_POST['country']);
    }



    
   
    
    
    if(empty($username_err) && empty($password_err) && empty($age_err) && empty($city_err) && empty($country_err) ){
        echo "YOUR NAME IS :" .$userName. 
        "<br>".
        
        "YOUR PASSWORD IS : " .$userPassword. "<br>".
        
        "YOUR AGE IS :" .$userAge. 
        "<br>".
        
        "YOUR CITY IS :" .$userCity. 
        "<br>".
        
        "YOUR COUNTRY IS :" .$userCountry. "<br>";
        
    }
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
<form action="test.php" method="post">
  <div class="main-form">
    <div class="inputs">
    
      <h1 class="header">Assignment-3 Nishi Surti </h1>
     
      <input type="text" class="username" placeholder="username" name="username">
      <?php if (isset($username_err)): ?>
      	<span><?php echo $username_err; ?></span>
      <?php endif ?>
      <input type="password" class="password" placeholder="password" name="password">
      <?php if (isset($password_err)): ?>
      	<span><?php echo $password_err; ?></span>
      <?php endif ?>
      <input type="number" class="username" placeholder="age" name="age">
      <?php if (isset($age_err)): ?>
      	<span><?php echo $age_err; ?></span>
      <?php endif ?> 
      <input type="text" class="username" placeholder="city" name="city">
      <?php if (isset($city_err)): ?>
      	<span><?php echo $city_err; ?></span>
      <?php endif ?>
      <input type="text" class="username" placeholder="country" name="country">
      <?php if (isset($country_err)): ?>
      	<span><?php echo $country_err; ?></span>
      <?php endif ?>
    
      <button class="btn">Submit</button>
      
</form>
    </div>
  </div>
</div>