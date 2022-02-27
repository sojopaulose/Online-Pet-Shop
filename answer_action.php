<?php
session_start();
$logged_in = $_SESSION['logged_in'];

include('db_connection.php');
$db=$conn;

$answer = $_POST['answer'];
$id = $_POST['id'];

$query = "UPDATE qstn_answr SET answer = '$answer', ct_id = '$logged_in' WHERE id = '$id'";
if($result = mysqli_query($db, $query)){
	// header('Location:login.php');
	echo 1;
}else{
	// header('Location:register.php');
	echo  mysqli_error($db);
}

?>