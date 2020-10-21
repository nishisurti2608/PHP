<?php
	session_start();

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./config.php";

	$title = "Purchase Process";
	require "./header.php";
	require_once "./cart_functions.php";

	$connect = mysqli_connect("localhost", "nishi", "nishi@admin", "bookstore_schema");
	extract($_SESSION['ship']);

	$card_number = $_POST['card_number'];
	$card_PID = $_POST['card_PID'];
	$card_expire = strtotime($_POST['card_expire']);
	$card_owner = $_POST['card_owner'];


	$date = date("Y-m-d H:i:s");
	

	insertIntoOrder($connect,$_SESSION['total_price'], $date, $name, $address, $city, $zip_code, $country);


	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "UPDATE BOOK_LIST SET QUANTITY = '$qty' WHERE ISBN='$isbn'";
		$result = mysqli_query($connect, $query);
		if(!$result){
			echo "Update value false!" . mysqli_error($connect);
			exit;
		}
	}

	session_unset();
?>
	<p class="lead text-success">Your order has been processed sucessfully. Please check your email to get your order confirmation and shipping detail!. 
	Your cart has been empty.</p>

<?php
	if(isset($connect)){
		mysqli_close($connect);
	}
	
?>