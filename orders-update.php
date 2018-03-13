<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $product_id => $quantity) {

    //$result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);
	$query = "SELECT * FROM products WHERE id = '{$product_id}'";
	$result = mysqli_query($connection,$query);

    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];
		
		/*$user_id = $_COOKIE["user"];
		
		$query22= "SELECT * from users WHERE id = '{$user_id}'";
		$result = mysqli_query($connection,$query22);
		
					
		if(!$result){
			
			die("QUERY FAILED: ".mysqli_error($connection));
		}

			
		while($row = mysqli_fetch_array($result)){
			
		   /* $db_user_id = $row['user_id'];
			$db_username = $row['username'];
			$db_user_password = $row['user_password'];
			$db_user_role = $row['user_role'];/////////////*/
			
			/*$db_user_id = $row['id'];
			$user = $row['email'];
			$db_user_password = $row['password'];
			$db_user_role = $row['type'];
			$db_user_fname = $row['fname'];
			
		}
		
		echo "$user";*/

        //$query = $mysqli->query("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");

		
		
		$query=("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");

		$query = mysqli_query($connection,$query);
		
		
        if($query){
          $newqty = $obj->qty - $quantity;
          /*if($mysqli->query("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id)){

          }*/
		  if($query){
			  $query = ("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id);
			  $query = mysqli_query($connection,$query);
		  }
        }

        //send mail script
        /*$query = $mysqli->query("SELECT * from orders order by date desc");
        if($query){
          while ($obj = $query->fetch_object()){
            $subject = "Your Order ID ".$obj->id;
            $message = "<html><body>";
            $message .= '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
            $message .= '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
            $message .= '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
            $message .= '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
            $message .= '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
            $message .= '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
            $message .= '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
            $message .= "</body></html>";
            $headers = "From: support@techbarrack.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $sent = mail($user, $subject, $message, $headers) ;
            if($sent){
              $message = "";
            }
            else {
              echo 'Failure';
            }
          }
        }*/



      }
    }
  }
}

unset($_SESSION['cart']);
header("location:success.php");

?>
