

 <?php

include('db_connection.php');
$db=$conn;
$search_key = $_POST['search_key'];
if($search_key !='')
{
	$qstn_answr_query = "SELECT id,title,question,answer,created_at FROM qstn_answr WHERE status = 1 And question LIKE '$search_key%'";	
}
else
{
		$qstn_answr_query = "SELECT id,title,question,answer,created_at FROM qstn_answr WHERE status = 1 ";
}

$qstn_answr_result = mysqli_query($db,$qstn_answr_query);
if($qstn_answr_result->num_rows>0){
	$qstn_answr_fetch_result = mysqli_fetch_all($qstn_answr_result,MYSQLI_ASSOC);
	echo json_encode($qstn_answr_fetch_result);
}else{
	echo 'false';
}


	
?>