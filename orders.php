<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
/*if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}*/
include 'config.php';

$user_id = $_COOKIE["user"];





?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders || BD Online Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	<script type="text/javascript" src="jspdf.min.js"></script>
	<script type="text/javascript" src="html2canvas.js"></script>
	<script type="text/javascript" >
	
		/*function genPDF(){
			html2canvas(document.getElementById("testDiv"), {
				onrendered: function (canvas) {
					
					var img = canvas.toDataURL("image/png");
					var doc = new jsPDF();
					doc.addImage(img,'JPEG',20,20);
					doc.save('test.pdf');
				}
			});
		
		}*/
		
		function genPDF(){
		
			var doc = new jsPDF();
			
			var specialElementHandlers = {
				'#hidediv' : function(element,render) {return true;}
			};
			
			doc.fromHTML($('#testDiv').get(0),20,20,{
				'width': 500,
				'elementHandlers': specialElementHandlers
			});
			
			doc.save('Test.pdf');
		
		}
		
	</script>
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
          <!--<li><a href="about.php">About</a></li>	-->
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li class="active"><a href="orders.php">My Orders</a></li>
          <!--<li><a href="contact.php">Contact</a></li>	-->
          <?php

          if(isset($_COOKIE["user"])){
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
      <div id="testDiv" class="large-12">
        <h3>My COD Orders</h3>
        <hr>

        <?php
          //$user = $_SESSION["username"];
		  
		  /////work with cookie
		  
		$query = "SELECT * FROM users WHERE id = '{$user_id}'";
		$select_user_query = mysqli_query($connection,$query);
			
		if(!$select_user_query){
			
			die("QUERY FAILED: ".mysqli_error($connection));
		}
		while($row = mysqli_fetch_array($select_user_query)){
			
			$db_username = $row['email'];   
			$db_fname = $row['fname'];    
			$db_type = $row['type'];    
			$db_lname = $row['lname'];    
			$db_password = $row['password'];    
			
			
		}
				  
		  
		  
		  
		  
		  
		  
		  //echo $user;
          //$result = $mysqli->query("SELECT * from orders where email='".$user."'");
		  $query = "SELECT * from orders where email='{$db_username}'";
		  $result = mysqli_query($connection,$query);
		  
          if($result) {
			  //echo $user;
            while($obj = $result->fetch_object()) {
				
              //echo '<div class="large-6">';
              echo '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
              echo '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
              echo '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
              echo '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
              echo '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
              //echo '</div>';
              //echo '<div class="large-6">';
              //echo '<img src="images/products/sports_band.jpg">';
              //echo '</div>';
              echo '<p><hr></p>';
				//echo $obj->path;
            }
			?> <a href="<?php echo $obj->path; ?>"></a>	<?php
          }
        ?>
      </div>
	  <a href="javascript:genPDF()">DOWNLOAD PDF</a>
    </div>




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
