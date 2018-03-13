<?php
include 'config.php';
?>
<?php session_start(); ?>
<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
//if(session_id() == '' || !isset($_SESSION)){session_start();}

$user_id = $_COOKIE["user"];

$fname = $_POST["fname"];
$lname = $_POST["lname"];
/*$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];*/
$email = $_POST["email"];
//$opwd = $_POST["opwd"];
$pwd = $_POST["pwd"];


/////start working with session

$query1 = "SELECT * FROM users WHERE id = '{$user_id}'";
$select_user_query = mysqli_query($connection,$query1);
    
if(!$select_user_query){
    
    die("QUERY FAILED: ".mysqli_error($connection));
}

    
while($row = mysqli_fetch_array($select_user_query)){
    
   /* $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_role = $row['user_role'];*/
	
    $db_user_id = $row['id'];
    $db_email = $row['email'];
    $db_user_password = $row['password'];
    $db_user_role = $row['type'];
	$db_user_fname = $row['fname'];
	$db_user_lname = $row['lname'];
    
}
	
    $_SESSION['username'] = $db_email;
    $_SESSION['id'] = $db_user_id;
    $_SESSION['password'] = $db_user_password;
    $_SESSION['type'] = $db_user_role;
	$_SESSION['fname'] = $db_user_fname;
	$_SESSION['lname'] = $db_user_lname;






	
$query_adm = "UPDATE `users` SET  `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`password` = '".$pwd."'WHERE `users`.`id` = '".$user_id."'";
$select_user_query_adm = mysqli_query($connection,$query_adm);
    
if(!$select_user_query_adm){
    
    die("QUERY FAILED: ".mysqli_error($connection));
}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*
if($fname!=""){
  /////"UPDATE table SET user='$user', name='$name' where id ='$id'"
  $query = "UPDATE users SET fname ='$fname' WHERE id ='$user_id'";
  $result = $mysqli_query($connection,$query);
  if($result){
  }
}*/
//echo $_SESSION['id'];
/*
if($fname!=""){
  $result = $mysqli->query('UPDATE users SET fname ="'. $fname .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($lname!=""){
  $result = $mysqli->query('UPDATE users SET lname ="'. $lname .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}*/




/*
if($lname!=""){
  $result = $mysqli->query('UPDATE users SET lname ="'. $lname .'" WHERE id ='.$user_id);
  if($result){
  }
}
/*
if($address!=""){
  $result = $mysqli->query('UPDATE users SET address ="'. $address .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($city!=""){
  $result = $mysqli->query('UPDATE users SET city ="'. $city .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}

if($pin!=""){
  $result = $mysqli->query('UPDATE users SET pin ='. $pin .' WHERE id ='.$_SESSION['id']);
  if($result){
  }
}*/
/*
if($email!=""){
  $result = $mysqli->query('UPDATE users SET email ="'. $email .'" WHERE id ='.$user_id);
  if($result) {
  }
}

//$result = $mysqli->query('Select password from users WHERE id ='.$_SESSION['id']);

//$obj = $result->fetch_object();

if(/*$opwd === $obj->password &&*/ /*$pwd!=""){
  $query = $mysqli->query('UPDATE users SET password ="'. $pwd .'" WHERE id ='.$user_id);
  if($query){
  }
}

//else {
//  echo 'Wrong Password. Please try again. <a href="account.php">Go Back</a>';*/
//}

header("location:success.php");


?>
