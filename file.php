<?php include "config.php"; ?>

<?php
/*
if(isset($_POST['submit'])){
    
$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_desc = $_POST['pro_desc'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];

$target_dir = "images/products/";
$target_file = $target_dir . $pro_code . ".png";
    
/*$pro_code = mysqli_real_escape_string($connection,$pro_code);
$pro_name = mysqli_real_escape_string($connection,$pro_name);


    
    
$query = "INSERT INTO products(product_code,product_name,product_desc,product_img_name,qty,price)";
$query .="VALUES('{$pro_code}','{$pro_name}','{$pro_desc}','{$target_file}','{$pro_qty}','{$pro_price}')";    
$register_user_query = mysqli_query($connection,$query);

//if($register_user_query)
	header("Location: account.php");
*/

?>


<?php
/*$target_dir = "images/products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));*/
// Check if image file is a actual image or fake image


function upload_file($target_file,$fileToUpload) {
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>




<?php

//$user_id = $_COOKIE["user"];
if(isset($_POST['submit'])){
	
	$pro_code = $_POST['pro_code'];
	$pro_name = $_POST['pro_name'];
	$pro_desc = $_POST['pro_desc'];
	$pro_qty = $_POST['pro_qty'];
	$pro_price = $_POST['pro_price'];
	
	//echo $pro_name;
    
   
    $target_dir = "images/products/";
    $target_file =  $pro_name .".png";
	$fileToUpload = "fileToUpload";
    //$filename_loop = "fileToUpload_0".$i;
    upload_file($target_file,$fileToUpload);
    $target_file = mysqli_real_escape_string($connection,$target_file);
    /*$query = "UPDATE `login` SET `img_".$i."` = '".$target_file."' WHERE `login`.`user_id` = ".$user_id.";";
    $file_uploaded = mysqli_query($connection,$query);*/
   
$query = "INSERT INTO products(product_code,product_name,product_desc,product_img_name,qty,price)";
$query .="VALUES('{$pro_code}','{$pro_name}','{$pro_desc}','{$target_file}','{$pro_qty}','{$pro_price}')";    
$register_user_query = mysqli_query($connection,$query);
    
 
}



?>
