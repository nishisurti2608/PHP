<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "./header.php";
require_once "config.php";


$sql= "SELECT ISBN, book_title,book_image,quantity FROM book_list";
$result = mysqli_query($connect, $sql);
if(!$result){
  echo "Error! Data is not available " . mysqli_error($connect);
  exit;
}
$count = 0;
?>


    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['ISBN']; ?>">
              <img class="img-responsive img-thumbnail" src="./img/<?php echo $query_row['book_image']; ?>">
              
            </a>
            <div class="col-md-3">Book Name:<?php echo $query_row['book_title']; ?></div>
            <div class="col-md-3">Qty:<?php 
            if($query_row['quantity']>0){ echo $query_row['quantity'];}
            else
            {
              echo "Out of Stock";
            } ?></div>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
   </div>
   <?php
      }
      if(isset($connect)) { mysqli_close($connect); }
      ?>





