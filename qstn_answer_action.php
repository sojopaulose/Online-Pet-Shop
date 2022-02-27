

 <?php
session_start();
include('db_connection.php');
$db=$conn;
$title = $_POST['title'];
$question = $_POST['question'];
$user_id = $_SESSION['logged_in'];
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$current_date_time = date("Y-m-d H:i:s",$temp);
$status = 1;
$query = "INSERT INTO qstn_answr VALUES ('','$user_id','','$title','$question','','$current_date_time','$status')";
if($result = mysqli_query($db, $query)){
	// header('Location:login.php');
	echo 1;
}else{
	// header('Location:register.php');
	echo  mysqli_error($db);
}
?>