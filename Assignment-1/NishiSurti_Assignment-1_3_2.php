<?php


function duplicate($input){
	for($i = 0; $i < strlen($input); $i++)
	{ 
		for($j = $i + 1; $j < strlen($input); $j++) 
		{ 
			if($input[$i] == $input[$j]) 
			{ 
				return true; 
			} 
		} 
	} 
	return false; 
} 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['firstname'])){            
            $result = duplicate($_POST['firstname']); 
            if($result == true){
                echo '<p>Input "<strong>'.$_POST['firstname'].'</strong>" has duplicate characters</p>'; 
            }else{
                echo '<p>Input"<strong>'.$_POST['firstname'].'</strong>" has no duplicate characters</p>';
            }
        }else{
            echo '<p>Please enter a string</p>';
        }
    }
?>