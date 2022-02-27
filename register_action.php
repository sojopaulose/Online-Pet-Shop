

 <?php

include('db_connection.php');
$db=$conn;
$full_name = $_POST['full_name'];
$mobile_no = $_POST['mobile_no'];
$email_id = $_POST['email_id'];
$password = $_POST['password']; 
$md5 = md5($password);
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$current_date_time = date("Y-m-d H:i:s",$temp);
$status = 1;
$role = 3;

$email_check = "SELECT id,name,created_at,certificate  FROM users WHERE email = '$email_id' ";
$email_check_result = mysqli_query($db, $email_check);
$email_check_fetch_result = mysqli_fetch_all($email_check_result,MYSQLI_ASSOC);

if($email_check_fetch_result){
	
	echo 0;
	die;
}
else{
	
	$query = "INSERT INTO users VALUES ('','$full_name','$mobile_no','$email_id','','$md5','$role','','$current_date_time','$status')";
	if($result = mysqli_query($db, $query)){
		
		echo 1;
	}else{
		
	echo  mysqli_error($db);
	}
	
}

?>