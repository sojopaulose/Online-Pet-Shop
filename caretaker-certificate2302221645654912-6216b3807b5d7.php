<?php
session_start();
include('db_connection.php');
$db=$conn;
$title = $_POST['title'];
$price = $_POST['price'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$description = $_POST['description'];
$user_id = $_SESSION['logged_in'];
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$current_date_time = date("Y-m-d H:i:s",$temp);
$status = 2;

if(isset($_FILES['photo'])){
     
      $ext = strtolower(substr(strrchr($_FILES['photo']['name'],"."),1));
      $photo_name = "pet-photo".date("dmy").time()."-".uniqid().'.'.$ext;
      move_uploaded_file($_FILES['photo']['tmp_name'], "assets/pet_photos/".$photo_name);
}
else{
	$photo_name= '';
}

if(isset($_FILES['certificate'])){
     
      $ext = strtolower(substr(strrchr($_FILES['certificate']['name'],"."),1));
      $certificate_name = "pet-certificate".date("dmy").time()."-".uniqid().'.'.$ext;
      move_uploaded_file($_FILES['certificate']['tmp_name'], "assets/pet_certificates/".$certificate_name);
}
else{
	$certificate_name= '';
}

$query = "INSERT INTO pet_ads VALUES ('','$user_id','$title','$description','$photo_name','$certificate_name','$price','$gender','$age','$current_date_time','$status')";
if($result = mysqli_query($db, $query)){
	// header('Location:login.php');
	echo 1;
}else{
	// header('Location:register.php');
	echo  mysqli_error($db);
}
?>