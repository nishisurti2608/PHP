<?php
  session_start();
  $book_isbn = $_GET['bookisbn'];

  require_once "config.php";
  require_once "./header.php";

  $query = "SELECT * FROM book_list WHERE ISBN = '$book_isbn'";
  $result = mysqli_query($connect, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($connect);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $qty= $row['quantity'];

  $title = $row['book_title'];
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
</head>
      <p style="margin: 25px 0"><a href="home_page.php">Books</a> > <?php echo $row['book_title']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./img/<?php echo $row['book_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['book_description']; ?></p>
          <h4>Book Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "book_description" || $key == "book_image" || $key == "author" || $key == "book_title"){
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "book_title":
                  $key = "Title";
                  break;
                case "author":
                  $key = "Author";
                  break;
                case "price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($connect)) {mysqli_close($connect); }
            ?>
          </table>
          <form method="post" action="cart.php" class="checkout">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <?php if($qty>0) : ?>
              <input type="submit" value="Purchase / Add to cart" name="cart" class="cart" class="btn-secondary">
<?php endif; ?>

      
          
          </form>
       	</div>
      </div>
      </html>
