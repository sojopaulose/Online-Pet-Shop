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
	
	$qstn_answr_query = "SELECT qstn_answr.id,qstn_answr.title,qstn_answr.question,qstn_answr.answer,qstn_answr.created_at,users.name FROM qstn_answr,users WHERE qstn_answr.user_id = users.id AND qstn_answr.status = 1";
    $qstn_answr_result = mysqli_query($db,$qstn_answr_query);
    $qstn_answr_fetch_result = mysqli_fetch_all($qstn_answr_result,MYSQLI_ASSOC);
	
	$pet_query = "SELECT pet_ads.id,pet_ads.title,pet_ads.description,pet_ads.vaccine_certificate,pet_ads.user_id,users.name,pet_ads.created_at  FROM pet_ads,users WHERE pet_ads.user_id = users.id AND pet_ads.status = 2";
    $pet_result = mysqli_query($db,$pet_query);
    $pet_fetch_result = mysqli_fetch_all($pet_result,MYSQLI_ASSOC);
	
	$pet_approve_query = "SELECT pet_ads.id,pet_ads.title,pet_ads.description,pet_ads.vaccine_certificate,pet_ads.user_id,users.name,pet_ads.created_at  FROM pet_ads,users WHERE pet_ads.user_id = users.id AND pet_ads.status = 1";
    $pet_approve_result = mysqli_query($db,$pet_approve_query);
    $pet_approve_fetch_result = mysqli_fetch_all($pet_approve_result,MYSQLI_ASSOC);
	
	$pet_reject_query = "SELECT pet_ads.id,pet_ads.title,pet_ads.description,pet_ads.vaccine_certificate,pet_ads.user_id,users.name,pet_ads.created_at  FROM pet_ads,users WHERE pet_ads.user_id = users.id AND pet_ads.status = 0";
    $pet_reject_result = mysqli_query($db,$pet_reject_query);
    $pet_reject_fetch_result = mysqli_fetch_all($pet_reject_result,MYSQLI_ASSOC);
	
	
	$users_query = "SELECT name,created_at  FROM users WHERE role=3 AND status = 1";
    $users_result = mysqli_query($db,$users_query);
    $users_fetch_result = mysqli_fetch_all($users_result,MYSQLI_ASSOC);
	
	$ct_query = "SELECT id,name,created_at,certificate,status  FROM users WHERE role=2 ";
    $ct_result = mysqli_query($db,$ct_query);
    $ct_fetch_result = mysqli_fetch_all($ct_result,MYSQLI_ASSOC);
	
	$review_query = "SELECT reviews.id,reviews.title,reviews.review,reviews.created_at,users.name FROM reviews,users WHERE reviews.user_id = users.id  AND reviews.status = 1";
    $review_result = mysqli_query($db,$review_query);
    $review_fetch_result = mysqli_fetch_all($review_result,MYSQLI_ASSOC);
	
	
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
                  <form class="d-flex">
                     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
               </div>
            </div>
         </nav>
      </div>
      <div class="container dashboard py-5 my-5">
         <div class="row">
            <div class="col-12 text-center pb-4">
               <h3>Admin Dashboard</h3>
            </div>
            <div class="col-3">
               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <button class="nav-link active" id="new-ads-tab" data-bs-toggle="tab" data-bs-target="#new-ads" type="button" role="tab" aria-controls="new-ads" aria-selected="true">New Ads</button>
                     <button class="nav-link" id="reject-request-tab" data-bs-toggle="tab" data-bs-target="#reject-request" type="button" role="tab" aria-controls="reject-request" aria-selected="false">Rejected Request</button>
                     <button class="nav-link" id="approve-request-tab" data-bs-toggle="tab" data-bs-target="#approve-request" type="button" role="tab" aria-controls="approve-request" aria-selected="false">Approved Request</button>
                     <button class="nav-link" id="change-password-tab" data-bs-toggle="tab" data-bs-target="#u-acnt" type="button" role="tab" aria-controls="u-acnt" aria-selected="false">User Accounts</button>
                     <button class="nav-link" id="caretaker-tab" data-bs-toggle="tab" data-bs-target="#caretaker" type="button" role="tab" aria-controls="caretaker" aria-selected="false">Caretaker Accounts</button>
                     <button class="nav-link" id="feedback-tab" data-bs-toggle="tab" data-bs-target="#feedback" type="button" role="tab" aria-controls="feedback" aria-selected="false">Feedback</button>
                     <button class="nav-link" type="button"><a href = "logout.php">Log Out </a></button>
                  </div>
               </nav>
            </div>
            <div class="col-7">
               <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="new-ads" role="tabpanel" aria-labelledby="new-ads-tab">
                     <div class="row">
                        <div class="col-12">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Date</th>
                                 <th>Certificate</th>
                                 <th>Accept</th>
                                 <th>Reject</th>
                              </tr>
                           </thead>
                           <tbody>
							<?php 
								if($pet_fetch_result)
								{
									$slno =1;
									foreach ($pet_fetch_result as $res)
									{
					
							?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name'] ?></td>
                                 <td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></td>
                                 <td><button type="button" class="btn btn-link"><a href="assets/pet_certificates/<?php echo $res['vaccine_certificate'] ?>" >Download</a></button></td>
                                 <td><button type="submit" ad_id ="<?php echo $res['id'] ?>" id="approve_ad" class="btn btn-success" >Accept</button></td>
                                 <td><button type="submit" ad_id ="<?php echo $res['id'] ?>" id="reject_ad"  class="btn btn-danger" >Reject</button></td>
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
									if($pet_reject_fetch_result)
									{
										$slno =1;
										foreach ($pet_reject_fetch_result as $res)
										{
						
								?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name'] ?></td>
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
									if($pet_approve_fetch_result)
									{
										$slno =1;
										foreach ($pet_approve_fetch_result as $res)
										{
						
								?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name'] ?></td>
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
                  <div class="tab-pane fade" id="u-acnt" role="tabpanel" aria-labelledby="change-password-tab">
                     <div class="row">
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
									if($users_fetch_result)
									{
										$slno =1;
										foreach ($users_fetch_result as $res)
										{
						
								?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name'] ?></td>
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
                  <div class="tab-pane fade" id="caretaker" role="tabpanel" aria-labelledby="caretaker-tab">
                  <div class="row">
                    <div class="col-3 ms-auto mb-4">
                      <select class="form-select" aria-label="Default select example">
                        <option selected>All</option>
                        <option value="1">New Request</option>
                        <option value="2">List</option>
                      </select>
                    </div>
                     <div class="col-12">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Date</th>
                                 <th>Certificate</th>
                                 <th>Accept</th>
                                 <th>Rejct</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
								if($ct_fetch_result)
								{
									$slno =1;
									foreach ($ct_fetch_result as $res)
									{
					
							?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name'] ?></td>
                                 <td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></td>
                                 <td><button type="button" class="btn btn-link"><a href="assets/ct_certificates/<?php echo $res['certificate'] ?>" >Download</a></button></td>
                                 <?php 
								 if($res['status'] == 2)
								 {
								?>	 
									 <td><button type="submit" id ="approve_ct" caretaker_ids="<?php echo $res['id']; ?>" class="btn btn-success" >Accept</button></td>
									 <td><button type="submit" id="reject_ct" caretaker_ids="<?php echo $res['id']; ?>" class="btn btn-danger" >Reject</button></td>
								<?php
								 }else if($res['status'] == 1)
								 {
								 ?>
									 <td> APPROVED</td>
									 <td> - </td>
								<?php
								 }else{
								?>
									 <td> - </td>
									 <td>REJECTED</td>
								<?php
								 }
								 ?>
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
                  <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                     <div class="row">
                        <div class="col-12">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>User</th>
                                 <th>Date</th>
                                 <th>Feedback</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
							<?php 
								if($review_fetch_result)
								{
									$slno =1;
									foreach ($review_fetch_result as $res)
									{
					
							?>
                              <tr>
                                 <td><?php echo $slno ?></td>
                                 <td><?php echo $res['name'] ?></td>
                                 <td><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></td>
                                 <td><?php echo $res['review']; ?></td>
                                 <td><button class="btn btn-danger" id="delete_review" review_id="<?php echo $res['id']; ?>" >Delete</button></td>
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

<script>
	$(document).ready(function(){
		
		$(document).on("click", "#approve_ad", function() { 
		
			var ad_id =  $(this).attr("ad_id");
			
			$.ajax({
				url: "update_ad_action.php",
				type: "POST",
				cache: false,
				data:{
					id: ad_id,
					status: 1 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: ' Successfully Approved',
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
		
		
		$(document).on("click", "#reject_ad", function() { 
			
			var ad_id =  $(this).attr("ad_id");
		
			$.ajax({
				url: "update_ad_action.php",
				type: "POST",
				cache: false,
				data:{
					id: ad_id,
					status: 0 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: 'Rejected Successfully',
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
		
		
		$(document).on("click", "#approve_ct", function() { 
		
			var ct_id =  $(this).attr("caretaker_ids");
			$.ajax({
				url: "update_ct_action.php",
				type: "POST",
				cache: false,
				data:{
					id: ct_id,
					status: 1 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: ' Successfully Approved',
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
		
		
		$(document).on("click", "#reject_ct", function() { 
		
			var ct_id =  $(this).attr("caretaker_ids");
			$.ajax({
				url: "update_ct_action.php",
				type: "POST",
				cache: false,
				data:{
					id: ct_id,
					status: 0 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: 'Rejected Successfully',
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
		
		
		$(document).on("click", "#delete_review", function() { 
		
			var review_id =  $(this).attr("review_id");
			$.ajax({
				url: "update_review_action.php",
				type: "POST",
				cache: false,
				data:{
					id: review_id,
					status: 0 ,
				},
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: 'Review Deleted Successfully ',
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
		
	});	
</script>