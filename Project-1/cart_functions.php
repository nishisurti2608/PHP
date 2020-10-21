<?php



require_once "./config.php";



	
function getBookByIsbn($connect, $isbn){
	$query = "SELECT book_title, author, price FROM book_list WHERE ISBN = '$isbn'";
	$result = mysqli_query($connect, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($connect);
		exit;
	}
	return $result;
}


function getbookqty($isbn){
	$connect = mysqli_connect("localhost", "nishi", "nishi@admin", "bookstore_schema");

	$query = "SELECT quantity FROM book_list WHERE ISBN = '$isbn'";
	$result = mysqli_query($connect, $query);
	if(!$result){
		echo "get book quantity failed! " . mysqli_error($connect);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
	return $row['quantity'];
}

	function getbookprice($isbn){
		$connect = mysqli_connect("localhost", "nishi", "nishi@admin", "bookstore_schema");

		$query = "SELECT price FROM book_list WHERE ISBN = '$isbn'";
		$result = mysqli_query($connect, $query);
		if(!$result){
			echo "get book price failed! " . mysqli_error($connect);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['price'];
	}


	function total_price($cart){
		$price = 0.0;
		if(is_array($cart)){
		  	foreach($cart as $isbn => $qty){
		  		$bookprice = getbookprice($isbn);
		  		if($bookprice){
		  			$price += $price * $qty;
		  		}
		  	}
		}
		return $price;
	}


	function total_items($cart){
		$items = 0;
		if(is_array($cart)){
			foreach($cart as $isbn => $qty){
				$items += $qty;
			}
		}
		return $items;
	}


	function insertIntoOrder($connect, $total_price, $date, $ship_name, $ship_address, $ship_city, $ship_zip_code, $ship_country){

		$connect = mysqli_connect("localhost", "nishi", "nishi@admin", "bookstore_schema");
		$query = "INSERT INTO order_details VALUES 
	   (NULL, '" . $total_price . "', '" . $date . "', '" . $ship_name . "', '" . $ship_address . "', '" . $ship_city . "', '" . $ship_zip_code . "', '" . $ship_country . "')";
	   $result = mysqli_query($connect, $query);
		if(!$result){
			echo "Insert orders failed " . mysqli_error($connect);
			exit;
		}
	}
?>