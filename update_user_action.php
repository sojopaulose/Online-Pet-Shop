
<?php

	
		include('db_connection.php');
		$db=$conn;
		$id = $_POST['id'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		
		$email_check = "SELECT id,name,created_at,certificate  FROM users WHERE email = '$email' ";
		$email_check_result = mysqli_query($db, $email_check);
		$email_check_fetch_result = mysqli_fetch_all($email_check_result,MYSQLI_ASSOC);

		if($email_check_fetch_result){
			
			foreach($email_check_fetch_result as $res)
			{
				$exist_user = $res['id'];
			}
		}
		if($exist_user != $id)
		{
			echo 0;
		}
		else{
	
			$query = "UPDATE  users SET name = '$name',mobile = '$mobile',email = '$email',address = '$address' WHERE id = '$id' ";
			if($result = mysqli_query($db, $query)){
				
				echo 1;
			}else{
				
				echo  mysqli_error($db);
			}
		}	
	




?>