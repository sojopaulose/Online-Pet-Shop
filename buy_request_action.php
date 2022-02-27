
<?php

session_start();
	if(isset($_SESSION['logged_in']))
	{
		$logged_in = $_SESSION['logged_in'];
		include('db_connection.php');
		$db=$conn;
		$user_id = $logged_in;
		$ad_id = $_POST['ad_id'];
		date_default_timezone_set('GMT');
		$temp= strtotime("+5 hours 30 minutes"); 
		$current_date_time = date("Y-m-d H:i:s",$temp);
		$status = 2;


			$query = "INSERT INTO buy_request VALUES ('','$ad_id','$user_id','$current_date_time','$status')";
			if($result = mysqli_query($db, $query)){
				// header('Location:login.php');
				echo 1;
			}else{
				// header('Location:register.php');
				echo  mysqli_error($db);
			}
	}else{
		echo 2;
	}




?>