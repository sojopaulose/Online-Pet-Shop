
<?php

	
		include('db_connection.php');
		$db=$conn;
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		
		
		$email_check = "SELECT id,name,created_at,certificate  FROM users WHERE email = '$email' ";
		$email_check_result = mysqli_query($db, $email_check);
		$email_check_fetch_result = mysqli_fetch_all($email_check_result,MYSQLI_ASSOC);

		if($email_check_fetch_result){
			
			 if($password == $confirm_password)
			 {
				$md5 = md5($password);	
			
				$query = "UPDATE  users SET password = '$md5' WHERE email = '$email' And status = 1 ";
				if($result = mysqli_query($db, $query)){
					
					echo 1;
					
				}else{
					
					echo  mysqli_error($db);
				}
			}
			else
			{
				echo 2;
			}
			
		}
		
		else{
			
			echo 0; 			
			
		}	
	




?>