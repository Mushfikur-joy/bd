



<?php include "config.php"; ?>
<?php session_start(); ?>

<?php 

if(isset($_POST['submit'])) {
    

    
$email = $_POST['email'];
$password = $_POST['pwd'];


$email = mysqli_real_escape_string($connection,$email);
$password = mysqli_real_escape_string($connection,$password);
// $user_role = mysqli_real_escape_string($connection,$user_role);

$query = "SELECT * FROM users WHERE email = '{$email}'";
$select_user_query = mysqli_query($connection,$query);
    
if(!$select_user_query){
    
    die("QUERY FAILED: ".mysqli_error($connection));
}

    
while($row = mysqli_fetch_array($select_user_query)){
    
    $db_user_id = $row['id'];
    $db_email = $row['email'];
    $db_user_password = $row['password'];
    $db_user_role = $row['type'];
	$db_user_fname = $row['fname'];
	
	
    
}

if($email === $db_email && $password === $db_user_password){
    
    $_SESSION['username'] = $db_email;
    $_SESSION['id'] = $db_user_id;
    $_SESSION['password'] = $db_user_password;
    $_SESSION['type'] = $db_user_role;
	$_SESSION['fname'] = $db_user_fname;
	
	/*$_SESSION['username'] = $username;
    $_SESSION['type'] = $obj->type;
    $_SESSION['id'] = $obj->id;
    $_SESSION['fname'] = $obj->fname;*/
	
	//echo "$db_user_role";
    
    $cookie_name = "user";
    $cookie_value = $db_user_id;
    setcookie($cookie_name, $cookie_value, time() + (60*115), "/"); // 86400 = 1 day
	
	echo $cookie_value;
   
    if(isset($_SESSION['type'])){
		
		
        
        if($_SESSION['type']!=='admin'){
			//
            header("Location: account.php");
        }
        
        else{
			//echo "$db_user_role";
            header("Location: admin.php");
        }
    }
    
    
  /*  
    if($db_user_role === 'admin')
    {
        header("Location: admin.php");
    }
    
    else if($db_user_role !== 'admin'){
    header("Location: profile.php");
    }
    
    */
      
}
    
else{
    header("Location: index.php");
}


}







