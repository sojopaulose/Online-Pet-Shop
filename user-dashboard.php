<?php 
session_start();
if(!isset($_SESSION['logged_in']))
{
	header("location:login.php");
}
include('db_connection.php');
	$db=$conn;
	
	
	$logged_in = $_SESSION['logged_in'];
    $log_name = $_SESSION['logged_ind_details']['name'];
    $log_email = $_SESSION['logged_ind_details']['email'];
    $log_mobile = $_SESSION['logged_ind_details']['mobile'];
	
	
	$buy_request_query = "SELECT buy_request.id,buy_request.created_at,users.name FROM buy_request,users,pet_ads WHERE buy_request.req_user = users.id AND buy_request.ad_id = pet_ads.id AND buy_request.status = 2 AND pet_ads.user_id = $logged_in";
    $buy_request_result = mysqli_query($db,$buy_request_query);
    $buy_request_fetch_result = mysqli_fetch_all($buy_request_result,MYSQLI_ASSOC);
	
	
	$approved_query = "SELECT buy_request.id,buy_request.created_at,users.name FROM buy_request,users,pet_ads WHERE buy_request.req_user = users.id AND buy_request.ad_id = pet_ads.id AND buy_request.status = 1 AND pet_ads.user_id = $logged_in";
    $approved_result = mysqli_query($db,$approved_query);
    $approved_fetch_result = mysqli_fetch_all($approved_result,MYSQLI_ASSOC);
	
	
	$reject_query = "SELECT buy_request.id,buy_request.created_at,users.name FROM buy_request,users,pet_ads WHERE buy_request.req_user = users.id AND buy_request.ad_id = pet_ads.id AND buy_request.status = 0 AND pet_ads.user_id = $logged_in";
    $reject_result = mysqli_query($db,$reject_query);
    $reject_fetch_result = mysqli_fetch_all($reject_result,MYSQLI_ASSOC);
	
	$user_query = "SELECT id,name,email,mobile,address  FROM users WHERE id = '$logged_in'";
    $user_result = mysqli_query($db,$user_query);
    $user_fetch_result = mysqli_fetch_all($user_result,MYSQLI_ASSOC);
	
	$buy_response_query = "SELECT buy_request.created_at,buy_request.status,users.name,users.mobile,users.address FROM buy_request,users,pet_ads WHERE  buy_request.ad_id = pet_ads.id AND pet_ads.user_id = users.id AND buy_request.req_user = $logged_in";
    $buy_response_result = mysqli_query($db,$buy_response_query);
    $buy_response_fetch_result = mysqli_fetch_all($buy_response_result,MYSQLI_ASSOC);
	
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Petshop</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="css/styles.css">
	  <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
	  
	  <script src="assets/js/sweet_alert_2.js"></script>
	  <script src="js/jquery.min.js"></script>
   </head>
   <body>
      <!-- navigation -->
      <div class="sticky-top">
         <div class="container-fluid py-1 top-bar">
            <div class="row">
               <div class="col-12 text-end">
                  <ul>
                     <li><a href="login.php"><i class="bi bi-person me-1"></i>Login</a></li>
                     <li><a href="register.php"><i class="bi bi-box-arrow-right me-1"></i>Register</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
               <a class="navbar-brand" href="index.php"><img src="img/logo.png"></a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="pets.php">Pets</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="forum.php">Forum</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="reviews.php">Reviews</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                     </li>
                  </ul>
                  <form class="d-flex" method="POST" action="search_result.php">
					<input class="form-control me-2" type="search"name="search_key" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" name="submit" type="submit">Search</button>
				  </form>
               </div>
            </div>
         </nav>
      </div>
      <div class="container dashboard py-5 my-5">
      <div class="row">
         <div class="col-12 text-center pb-4">
            <h3>User Dashboard</h3>
         </div>
         <div class="col-3">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
               <button class="nav-link active" id="postAdd-tab" data-bs-toggle="tab" data-bs-target="#postAdd" type="button" role="tab" aria-controls="postAdd" aria-selected="true">Post Ad</button>
               <button class="nav-link" id="notification-tab" data-bs-toggle="tab" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="true"> Notifications	</button>
               <button class="nav-link" id="new-request-tab" data-bs-toggle="tab" data-bs-target="#new-request" type="button" role="tab" aria-controls="nav-new-request" aria-selected="false">New Requests</button>
               <button class="nav-link" id="reject-request-tab" data-bs-toggle="tab" data-bs-target="#reject-request" type="button" role="tab" aria-controls="reject-request" aria-selected="false">Rejected Request</button>
               <button class="nav-link" id="approve-request-tab" data-bs-toggle="tab" data-bs-target="#approve-request" type="button" role="tab" aria-controls="approve-request" aria-selected="false">Approved Request</button>
               <button class="nav-link" id="ask-doubt-tab" data-bs-toggle="tab" data-bs-target="#ask-doubt" type="button" role="tab" aria-controls="ask-doubt" aria-selected="false">Ask Doubts</button>
               <button class="nav-link" id="feed-back-tab" data-bs-toggle="tab" data-bs-target="#feed-back" type="button" role="tab" aria-controls="feed-back" aria-selected="false">Feedback</button>
               <button class="nav-link" id="change-password-tab" data-bs-toggle="tab" data-bs-target="#change-password" type="button" role="tab" aria-controls="change-password" aria-selected="false">Change Password</button>
               <button class="nav-link" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</button>
               <button class="nav-link" type="button"><a href = "logout.php">Log Out </a></button>
            </div>
         </div>
         <div class="col-7">
            <div class="tab-content" id="nav-tabContent">
               <div class="tab-pane fade show active" id="postAdd" role="tabpanel" aria-labelledby="postAdd-tab">
				<form name="post_ad_form" autocomplete="off" id="post_ad_form" action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <div class="mb-3">
                           <label for="title" class="form-label">Title</label>
                           <input type="text" class="form-control" id="title" name= "title" placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                           <label for="price" class="form-label">Price</label>
                           <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                        </div>
                        <div class="mb-3">
                           <label for="description" class="form-label">Description</label>
                           <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
						<div class="mb-3">
                           <label for="gender" class="form-label">Gender</label><br>
                           <input type="radio" name="gender"  value="Male" checked> Male
						   <input type="radio" name="gender"  value="Female"> Female
                        </div>
						<div class="mb-3">
                           <label for="description" class="form-label">Age</label>
                           <input type="text" class="form-control" name="age" id="age" required>
                        </div>
                        <div class="mb-3">
                           <label for="photo" class="form-label">Photo</label>
                           <input class="form-control" type="file" name="photo" id="photo" required>
                        </div>
                        <div class="mb-3">
                           <label for="certificate" class="form-label">Vaccination certification</label>
                           <input class="form-control" type="file" name="certificate" id="certificate" required>
                        </div>
                        <div class="mb-3">
                           <button class="btn btn-primary" id="post_ad">Post Ad</button>
                        </div>
                     </div>
                  </div>
				  </form>
               </div>

               <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification -tab">
                  <div class="row">
                    <div class="col-3 ms-auto mb-4">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>All</option>
                        <option value="1">Admin</option>
                        <option value="2">Users</option>
                      </select>
                    </div>
                     <div class="col-12">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Date</th>
                                 <th>Status</th>
								 <th>Address</th>
								 <th>Phone</th>
                              </tr>
                           </thead>
                           <tbody>
								<?php
									if($buy_response_fetch_result)
									{
										$slno = 1;
										foreach($buy_response_fetch_result as $res)
										{
								?>
											<tr>
												<td><?php echo $slno ?></td>
												<td><?php echo $res['name'] ?></td>
												<td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at'])); ?></td>
												<td><?php if( $res['status'] == 1){ echo 'Approved' ; } else if( $res['status'] == 2){ echo 'Pending'; } else{ echo 'Rejected'; } ?></td>
												
												<td><?php if( $res['status'] == 1){ echo $res['address']; } ?></td>
												<td><?php if( $res['status'] == 1){ echo $res['mobile']; } ?></td>
											</tr>
								<?php	
										}
										$slno++;
									}
								?>
								
							
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="new-request" role="tabpanel" aria-labelledby="new-request-tab">
                  <div class="row">
                     <div class="col-12">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Date</th>
                                 <th>Accept</th>
                                 <th>Reject</th>
                              </tr>
                           </thead>
                           <tbody>
							<?php
									if($buy_request_fetch_result)
									{
										$slno = 1;
										foreach($buy_request_fetch_result as $res)
										{
								?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name']?></td>
                                 <td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></td>
                                 <td><button type="submit" post_id="<?php echo $res['id'] ?>" id="approve_rqst" class="btn btn-success" >Accept</button></td>
                                 <td><button type="submit" post_id="<?php echo $res['id'] ?>" id="reject_rqst"  class="btn btn-danger" >Reject</button></td>
                              </tr>
                            <?php 
										$slno++;
										}
									}
							?>							
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="reject-request" role="tabpanel" aria-labelledby="reject-request-tab">
                  <div class="row">
                    <div class="col-3 ms-auto mb-4">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>All</option>
                        <option value="1">Admin</option>
                        <option value="2">Users</option>
                      </select>
                    </div>
                     <div class="col-12">
                        <div class="col-12">
                           <table class="table table-striped">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
							  <?php
									if($reject_fetch_result)
									{
										$slno = 1;
										foreach($reject_fetch_result as $res)
										{
								?>
                                 <tr>
                                    <td><?php echo $slno ?></td>
                                    <td><?php echo $res['name']?></td>
                                    <td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></td>
                                 </tr>
							  <?php
										$slno++;
										}
									}
							  ?>
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="approve-request" role="tabpanel" aria-labelledby="approve-request-tab">
                  <div class="row">
                    <div class="col-3 ms-auto mb-4">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>All</option>
                        <option value="1">Admin</option>
                        <option value="2">Users</option>
                      </select>
                    </div>
                     <div class="col-12">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Date</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
									if($approved_fetch_result)
									{
										$slno = 1;
										foreach($approved_fetch_result as $res)
										{
								?>
                                 <tr>
                                    <td><?php echo $slno ?></td>
                                    <td><?php echo $res['name']?></td>
                                    <td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></td>
                                 </tr>
							  <?php
										$slno++;
										}
									}
							  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="ask-doubt" role="tabpanel" aria-labelledby="ask-doubt-tab">
				<form name="question_form" autocomplete="off" id="question_form" action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <div class="mb-3">
                           <label for="title" class="form-label">Title</label>
                           <input type="text" class="form-control" name="title" id="title" >
                        </div>
                        <div class="mb-3">
                           <label for="question" class="form-label">Question</label>
                           <textarea class="form-control" id="question" name="question" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                           <button class="btn btn-success" >Post</button>
                        </div>
                     </div>
                  </div>
				  </form>
               </div>
               <div class="tab-pane fade" id="feed-back" role="tabpanel" aria-labelledby="feed-back-tab">
				<form name="review_form" autocomplete="off" id="review_form" action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <div class="mb-3">
                           <label for="title" class="form-label">Title</label>
                           <input type="text" class="form-control"name ="title" id="title" >
                        </div>
                        <div class="mb-3">
                           <label for="review" class="form-label">Feedback</label>
                           <textarea class="form-control" name="review" id="review" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                           <button class="btn btn-success">Post</button>
                        </div>
                     </div>
                  </div>
				</form>  
               </div>
			   
			   
               <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
					  <form name="change_pass_form" id="change_pass_form" method="POST" autocomplete="off">
						  <div class="row">
							 <div class="mb-3">
								<label for="password" class="form-label">New Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="New Password">
							 </div>
						  </div>
						  <div class="row">
							 <div class="mb-3">
								<label for="confirm_password" class="form-label">Re-type NewPassword</label>
								<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
							 </div>
						  </div>
						  <div class="row mt-3">
							 <div class="col-12">
								<button type="submit" class="btn btn-primary w-100">Change password</button>
							 </div>
						  </div>
					  </form>
				</div>
			   
			   
			   
               <div class="tab-pane fade" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
				
                  <div class="row">
					<?php
									if($user_fetch_result)
									{
										foreach($user_fetch_result as $res)
										{
								?>
					 <form name="user_update_form" id="user_update_form" method="POST" autocomplete="off">					
                     <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $res['name'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="mobile" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $res['mobile'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $res['email'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address"  rows="3"><?php if($res['address']){ echo $res['address']; }  ?></textarea>
                     </div>
                     <div class="row mt-3">
                        <div class="col-12">
							<input type="hidden" id="id" name="id" value="<?php echo $res['id'] ?>">
                           <button type="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                     </div>
					 </form>
					 <?php
										}
									}
									?>
                  </div>
				  
               </div>
			   
			   
            </div>
         </div>
      </div>
</div>
      <footer>
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-4">
                  <img src="img/logo.png" alt="" srcset="" style="width: 150px">
               </div>
               <div class="col-8 text-end">
                  <p class="m-0 fw-bold text-white"> Call:
                     <a href="tel:+919947748955" class="text-white me-4" style="text-decoration: none;">+91 994 774 8955</a>
                     Mail:
                     <a href="mailto:petshop.com" class="text-white">mail@petshop.com</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <script src="js/bootstrap.bundle.min.js"></script>
   </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
		
		$(document).on('submit','#post_ad_form',function(e){
			e.preventDefault();
			
			var form = $(this)[0];
			var data = new FormData(form);	
		   
			$.ajax({
				url: "ad_post_action.php",
				method: "post",
				data: data,
				enctype: "multipart/form-data",
				processData: false, // Important!
				contentType: false,
				cache: false,
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: ' Successfully Added',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "user-dashboard.php";
						}, 2000); 
					}	
					else{
						alert(data)				
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		
		});
		
		
		$(document).on('submit','#question_form',function(e){
			e.preventDefault();
			
   
		   
			$.ajax({
				method:"POST",
				url: "qstn_answer_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: ' Successfully Added',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "user-dashboard.php";
						}, 2000); 
					}	
					else{
						alert(data)				
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		
		});
		
		
		$(document).on('submit','#review_form',function(e){
			e.preventDefault();
			
   
		   
			$.ajax({
				method:"POST",
				url: "review_add_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: ' Successfully Added',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "user-dashboard.php";
						}, 2000); 
					}	
					else{
						alert(data)				
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		
		});
		
		$(document).on("click", "#approve_rqst", function() { 
		
			var post_id =  $(this).attr("post_id");
			$.ajax({
				url: "update_rqst_action.php",
				type: "POST",
				cache: false,
				data:{
					id: post_id,
					status: 1 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: 'Registered Successfully will be redirecting',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.reload()
						}, 2000); 
					}	
					else{
						alert(data)				
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		}); 
		
		
		$(document).on("click", "#reject_rqst", function() { 
		
			var post_id =  $(this).attr("post_id");
			$.ajax({
				url: "update_rqst_action.php",
				type: "POST",
				cache: false,
				data:{
					id: post_id,
					status: 0 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: 'Registered Successfully will be redirecting',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.reload()
						}, 2000); 
					}	
					else{
						alert(data)				
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		}); 
		
		
		$(document).on('submit','#change_pass_form',function(e){
			e.preventDefault();
			
            $.ajax({
				method:"POST",
				url: "pass_change_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						
						Swal.fire({
						icon: 'success',
						title: ' Successfully changed... redirecting',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "user-dashboard.php";
						}, 2000);
						
					}
					else if(data == 2){
										
						Swal.fire({
						icon: 'error',
						title: 'Password and Confirm password are not matched ...',
						showConfirmButton:false
						})
					} 		
					else{
										
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		
		});
		
		
		$(document).on('submit','#user_update_form',function(e){
			e.preventDefault();
			
			alert();
		   
			$.ajax({
				method:"POST",
				url: "update_user_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: ' Successfully Updated',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "user-dashboard.php";
						}, 2000); 
					}	
					else{
						alert(data)				
						Swal.fire({
						icon: 'error',
						title: 'Error Please try again later',
						showConfirmButton:false
						})
					} 			
				
				}
			});
		
		});
		
				
	});
</script>	