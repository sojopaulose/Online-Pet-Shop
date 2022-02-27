
<?php

	
		include('db_connection.php');
		$db=$conn;
		$id = $_POST['id'];
		$status = $_POST['status'];

			$query = "UPDATE  reviews SET status= '$status' WHERE id = '$id' ";
			if($result = mysqli_query($db, $query)){
				// header('Location:login.php');
				echo 1;
			}else{
				// header('Location:register.php');
				echo  mysqli_error($db);
			}
	




?>