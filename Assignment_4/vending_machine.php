<?php

class Vending
{
    var $product = '';
    var $amount = 0;
    var $price = 0;
    var $change = 0;

    function __construct($product, $amount, $price,$change)
    {
     
        $this->product = $product;
        $this->amount = $amount;
        $this->price = $price;
        $this->change = $change;
    }

    function buys(){

    if($this->change > 0)
        echo "Enjoy your ".$this->product ."<br>Your Change is ".$this->change;
    else
        echo "Enjoy your ".$this->product;
    }
}
?>