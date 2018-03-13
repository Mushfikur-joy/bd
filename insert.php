<?php
include 'config.php';
?>
<?php session_start(); ?>

<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
//$address = $_POST["address"];
//$city = $_POST["city"];
//$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
/*
if($mysqli->query("INSERT INTO users (fname, lname,  email, password) VALUES('$fname', '$lname',  '$email', '$pwd')")){
	echo 'Data inserted';
	echo '<br/>';
}*/
///check if there is previous mail
//$query = mysql_query("SELECT username FROM Users WHERE username=$username", $con);
/*$query2 = "SELECT * FROM users WHERE email='{$email}'";
$query3 = mysqli_query($connection,$query2);

  if ($query2)
  {
      header("Location: pre_index.php");
  }






else{*/
    
$fname = mysqli_real_escape_string($connection,$fname);
$lname = mysqli_real_escape_string($connection,$lname);
$email = mysqli_real_escape_string($connection,$email);
$pwd = mysqli_real_escape_string($connection,$pwd);

$_SESSION['username'] = $email;
//$_SESSION['id'] = $db_user_id;
$_SESSION['password'] = $pwd;
$_SESSION['type'] = 'user';
$_SESSION['fname'] = $fname;

echo $_SESSION['username'];

echo "$email";
    
    
$query = "INSERT INTO users(fname, lname,  email, password,type)";
$query .="VALUES('{$fname}','{$lname}','{$email}','{$pwd}','user')";    
$register_user_query = mysqli_query($connection,$query);




/*
	$cookie_name = "user";
    $cookie_value = $db_user_id;
    setcookie($cookie_name, $cookie_value, time() + (60*15), "/"); // 86400 = 1 day
	
	//session_cache_expire
	
	  $_SESSION['username'] = $email;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
	
	
}

header ("location:account.php");*/


//$email = mysqli_real_escape_string($connection,$email);
$query1 = "SELECT * FROM users WHERE email = '{$email}'";
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
    
}
  //set cookie
    
    $cookie_name = "user";
    $cookie_value = $db_user_id;
    setcookie($cookie_name, $cookie_value, time() + (60*15), "/"); // 86400 = 1 day
	
	echo $cookie_value;
	
	//session
	
	//echo "$db_email";
	
   /* $_SESSION['username'] = $db_email;
    $_SESSION['id'] = $db_user_id;
    $_SESSION['password'] = $db_user_password;
    $_SESSION['type'] = $db_user_role;
	$_SESSION['fname'] = $db_user_fname;
	
	echo $_SESSION['username'];*/
    
if(register_user_query){
    header("Location: account.php");
}
//} 
?>
