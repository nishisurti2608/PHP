<?php 
		require('mysqli_connect.php');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$stmt = $connect -> prepare("select * FROM guestforum.account WHERE username = ? AND password = ?");
			$stmt -> bind_param("ss", $username, $password);
			$stmt -> execute();
			$stmt -> store_result();
			$r = mysqli_stmt_num_rows($stmt);
			
			if ($r == 1) {
				echo "Login Successful!";
			}
			else {
				echo "Incorrect account information. Please try again!";
			}

			$stmt -> close();
			$connect -> close();
		}

?>
<html>

<body>
<form action="login.php" method="POST">

	Enter your username: <input type="text" name="username"> <br/> <br/>
    Enter your password: 	<input type="text" name="password"> <br/>
	<input type="submit">

</form>
</body>
</html>