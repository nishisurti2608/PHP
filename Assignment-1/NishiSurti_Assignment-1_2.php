<?php

	if(!empty($_POST['firstname'])){
		echo '<p>Firstname : '.$_POST['firstname'].'</p>';
	}
	else{
	echo '<p style="color:red"><strong>Please Enter Your firstname</strong></p>';
	}
	 if(!empty($_POST['lastname'])){
		 echo '<p>Lastname : '.$_POST['lastname'].'</p>';
	 }
	 else{
		 echo '<p style="color:red"><strong>Please Enter Your Last Name</strong></p>';
	 }
	 if(!empty($_POST['age'])){	
		 echo '<p>Age : '.$_POST['age'].'</p>';
	 } 
	 else{
		 echo '<p style="color:red"><strong>Please Enter Your Age</strong></p>';
	 }
	 if(isset($_POST['newsletter'])){	 
		 echo '<p>New Letter Required : '.$_POST['newsletter'].'</p>';
	 }
	 else{
		echo  '<p style="color:red"><strong>Please Select a Radio Button</strong></p>';
	 }
	?>