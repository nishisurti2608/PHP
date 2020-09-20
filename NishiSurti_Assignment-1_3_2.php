<?php

//Function for checking duplicate values
function checkStringDuplicate($input){
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
            $result = checkStringDuplicate($_POST['firstname']); 
            if($result == true){
                echo '<p>Input "<strong>'.$_POST['firstname'].'</strong>" has duplicate characters</p>'; //Displaying if it has duplicate values
            }else{
                echo '<p>Input"<strong>'.$_POST['firstname'].'</strong>" has no duplicate characters</p>'; //Displaying if it has unique values
            }
        }else{
            echo '<p>Please enter a string</p>'; //Error message for blank firstname
        }
    }
?>
