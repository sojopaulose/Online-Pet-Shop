

 <?php

include('db_connection.php');
$db=$conn;
$full_name = $_POST['caretaker_name'];
$mobile_no = $_POST['caretaker_mobile'];
$email_id = $_POST['caretaker_email_id'];
$password = $_POST['caretaker_password']; 
$md5 = md5($password);
date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$current_date_time = date("Y-m-d H:i:s",$temp);
$status = 2;
$role = 2;

/*  if(isset($_FILES['caretaker_file'])){
      $errors= array();
      $file_name = $_FILES['caretaker_file']['name'];
      $file_size =$_FILES['caretaker_file']['size'];
      $file_tmp =$_FILES['caretaker_file']['tmp_name'];
      $file_type=$_FILES['caretaker_file']['type'];
	  $dd=explode('.',$_FILES['caretaker_file']['name']);
       $file_ext=end($dd);
      $file_name=$current_date_time.'.'.$file_ext;
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"/caretaker_files/".$file_name);
         
      }else{
         print_r($errors);
      }
   } */


if(isset($_FILES['caretaker_file'])){
      // $errors= array();
      // $file_name = $_FILES['caretaker_file']['name'];
      // $file_size =$_FILES['caretaker_file']['size'];
      // $file_tmp =$_FILES['caretaker_file']['tmp_name'];
      // $file_type=$_FILES['caretaker_file']['type'];
      // $file_ext=strtolower(end(explode('.',$file_name)));
      
      // $extensions= array("jpeg","jpg","png","pdf","doc","docx","JPEG","JPG");
      
      // if(in_array($file_ext,$extensions)=== false){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }
      
      // $newfilename = round(microtime(true)).'.'.$file_ext;
      // if(empty($errors)==true){
      //    move_uploaded_file($file_tmp,"assets/user_images/".$newfilename);
      //    echo "Success";
      // }else{
      //    // print_r($errors);
      //    echo 'error';
      // }
      $ext = strtolower(substr(strrchr($_FILES['caretaker_file']['name'],"."),1));
      $photo = "caretaker-certificate".date("dmy").time()."-".uniqid().'.'.$ext;
      move_uploaded_file($_FILES['caretaker_file']['tmp_name'], "assets/ct_certificates/".$photo);

}
$email_check = "SELECT id,name,created_at,certificate  FROM users WHERE email = '$email_id' ";
$email_check_result = mysqli_query($db, $email_check);
$email_check_fetch_result = mysqli_fetch_all($email_check_result,MYSQLI_ASSOC);

if($email_check_fetch_result){
	
	echo 0;
	die;
}
else{

	$query = "INSERT INTO users VALUES ('','$full_name','$mobile_no','$email_id','','$md5','$role','$photo','$current_date_time','$status')";
	if($result = mysqli_query($db, $query)){
		// header('Location:login.php');
		echo 1;
	}else{
		// header('Location:register.php');
		echo  mysqli_error($db);
	}
}
	
?>