<?php
include('db_connection.php');
$db=$conn;
session_start();

$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$query = "SELECT * FROM `users` WHERE `email` = '$user_name' AND `password` = '$password' AND status = 1";
$result = mysqli_query($db,$query);
if($result->num_rows>0){
	$fetch = mysqli_fetch_assoc($result);
	// print_r($fetch);
	$data = $fetch['id'];
	$role = $fetch['role'];
	$name = $fetch['name'];
	$email = $fetch['email'];
	$mobile = $fetch['mobile'];
	$status = $fetch['status'];
	if($role== 2){
		$caretaker_stat = $fetch['status'];
		if($caretaker_stat==2){
			echo json_encode(array(2));
		}else{
			$_SESSION['logged_in'] = $data;
			$_SESSION['logged_ind_details'] = $fetch;
			echo json_encode(array(1, $role));
		}
	}else{
		$_SESSION['logged_in'] = $data;
		$_SESSION['logged_ind_details'] = $fetch;
		echo json_encode(array(1, $role));
	}
}else{
	echo json_encode(array(0));
}
?>