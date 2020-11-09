<?php
            require('vending_machine.php');
            $credit = $change = 0;
            $product = '';

            
            if(isset($_POST['one']))
            {
                $credit = $_REQUEST['cash'] + 1.00;
            }
            if(isset($_POST['fifty']))
            {
                $credit = $_POST['cash'] + 0.50;
            }
            if(isset($_POST['ten']))
            {
                $credit = $_POST['cash'] + 0.10;
            }
            if(isset($_POST['twentyfive']))
            {
                $credit = $_POST['cash'] +0.25;
            }
            if(isset($_POST['five']))
            {
                $credit = $_POST['cash'] +0.5;
            }
            
            if(isset($_POST['cancel']))
            {
            
                header('Location: index.php');
            }
            
            if(isset($_POST['submit']))
            {
                
                if(!isset($_POST['snack'])) 
                { 
                    echo "Select the product";
                    $credit = $_POST['cash'];
                }
                    
                else
                {
                    $credit = $_POST['cash'];
                    $product = $_POST['snack'];
                    switch ($product) {
                        case "Chocolate":
                            if($credit < 1.25)
                                echo "Amount is not Sufficient.";
                            else
                            {
                                $credit=$change=$credit-1.25;
                                $chocolate = new Vending('Chocolate', $credit, 1.25,$change);
                               $chocolate->buys();
                               
                            }
                            break;
                        case "Pop":
                            if($credit < 1.50)
                                echo "Amount is not Sufficient.";
                            else
                            {
                                $credit=$change=$credit-1.50;
                                $pop = new Vending('Pop', $credit, 1.50,$change);
                               $pop->buys();
                               
                            }
                            break;
                        case "Chips":
                            if($credit < 1.75)
                                echo "Amount is not Sufficient.";
                            else
                            {
                                $credit=$change=$credit-1.75;
                               $chips = new Vending('Chips', $credit, 1.75,$change);
                               $chips->buys();
                               
                            }
                             
                            break;
                    }
                }       
            }  
        ?>
<html>

<head>
    <meta charset="utf-8">
    <Title> Nishi Surti </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <form action='' method='post'>


        <label class="row">Total Amount:</label><br><br>
        <input type="text" name='cash' id='cash' value="<?php echo $credit;?>" readonly /> <br>
        <br><br>
        <label class="row">Snacks:</label><br> &nbsp;<br>
        <input type="radio" name="snack" value="Chocolate"
            <?php if(isset($product)){ if($product=='Chocolate' ) echo 'checked = "checked"' ; else echo '' ;} ?>>Chocolate
        Bar $1.25<br>
        <input type="radio" name="snack" value="Pop"
            <?php if(isset($product)){ if($product=='Pop' ) echo 'checked = "checked"' ; else echo '' ;} ?>> Pop
        $1.50<br>
        <input type="radio" name="snack" value="Chips"
            <?php if(isset($product)){ if($product=='Chips' ) echo 'checked = "checked"' ; else echo '' ;} ?>>Chips
        $1.75<br>
        <br>
        <label class="row">Coins:</label>

    <div class="row">
        

  
  <button class="coin gold" name="one" id='one'><p>$1</p>
  <button class="coin silver" name='fifty' id='fifty'><p>50¢</p>
  <button class="coin silver" name='twentyfive' id='twentyfive'><p>25¢</p>
  <button class="coin silver" name='ten' id='ten'><p>10¢</p>
  <button class="coin silver"  name='five' id='five'><p>5¢</p>
  
</div>
          
<div class="row">
<input type="submit" name="submit" value="submit" id="submit" class="btn">
        <button name='cancel' id='cancel' class="btn">Cancel</button><br><br>
    </form>
</div>
</body>

</html>