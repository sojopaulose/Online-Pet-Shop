

 <?php
session_start();
$logged_in = $_SESSION['logged_in'];

include('db_connection.php');
$db=$conn;
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

 if($password == $confirm_password)
 {
	$md5 = md5($password);	
	$query = "UPDATE users SET password = '$md5'WHERE id = '$logged_in'";
	if($result = mysqli_query($db, $query)){
		// header('Location:login.php');
		echo 1;
	}else{
		// header('Location:register.php');
		echo  mysqli_error($db);
	} 
 }
 else{
	 echo 2;
 }


?>