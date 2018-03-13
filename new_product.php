<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';
$user_id = $_COOKIE["user"];

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart || BD Online Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">BD Online Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <!--	<li><a href="about.php">About</a></li>	-->
          <li><a href="products.php">Products</a></li>
          <li class="active"><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
         <!-- <li><a href="contact.php">Contact</a></li>	-->
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
	  
		
		
<!--
		<form action="/action_page.php">
		  <input type="text" name="name" placeholder="product name" style="width:250px; height:50px;"></textarea>
		  <br>
		  <input type="submit">
		</form>	-->
		
		<div class="form-bottom">
				                    <form method="POST" action="file.php" enctype="multipart/form-data" style="margin-top:30px;">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Product Code</label>
				                        	<input type="text" name="pro_code" placeholder="Product Code" class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Product Name</label>
				                        	<input type="text" name="pro_name" placeholder="Product Name" class="form-last-name form-control" id="form-last-name">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Product Description</label>
				                        	<input type="text" name="pro_desc" placeholder="Product Description" class="form-last-name form-control" id="form-last-name">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Product Quantity</label>
				                        	<input type="text" name="pro_qty" placeholder="Product Quantity" class="form-email form-control" id="form-email">
											
											
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Price</label>
				                        	<input type="text" name="pro_price" placeholder="Price..." >
				                        </div>
										
										<label for="fileToUpload">Image : </label><input type="file" name="fileToUpload" id="fileToUpload">
										
				                        <button type="submit" name="submit" class="btn">Submit</button>
										
				                    </form>
		
		
		

		
		

	  
	  
	  
        <?php


		

		//echo "$user_id";


          echo '</div>';
          echo '</div>';
          ?>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">




        <footer style="margin-top:10px;">
          
        </footer>

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
