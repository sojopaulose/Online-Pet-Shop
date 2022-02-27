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
               <h3>Caretaker Dashboard</h3>
            </div>
            <div class="col-3">
               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <button class="nav-link active" id="questions-tab" data-bs-toggle="tab" data-bs-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="true">Questions</button>
                     <button class="nav-link" id="change-password-tab" data-bs-toggle="tab" data-bs-target="#change-password" type="button" role="tab" aria-controls="change-password" aria-selected="false">Change Password</button>
                     <button class="nav-link" type="button" > <a href="logout.php">Log Out</a></button>
                  </div>
               </nav>
            </div>
            <div class="col-9">
               <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                     <div class="row">
                        <div class="col-3 ms-auto mb-4">
                           <select class="form-select" aria-label="Default select example">
                              <option selected>New</option>
                              <option value="1">All</option>
                           </select>
                        </div>
                        <div class="col-12">
                           <div class="col-12">
                              <table class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>User</th>
                                       <th>Question</th>
                                       <th width="350px">Replay</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 <?php
									if($qstn_answr_fetch_result)
									{
										$slno = 1;
										foreach($qstn_answr_fetch_result as $res)
										{
								?>
                                    <tr>
                                       <td><?php echo $slno; ?></td>
                                       <td><?php echo $res['name']; ?></td>
                                       <td><?php echo $res['question']; ?></td>
									   <?php 
									   
										if($res['answer'])
										{
									   ?>
										 <td> <?php echo $res['answer']; ?> </td>
										 <td>Replayed</td>	
									   <?php
										}		
										else {
									   ?>
  									   <form name="answer_form" autocomplete="off" id="answer_form" action="" method="post" class="col-12"> 
									   <td>		
                                          <div class="mb-3">
											 <input type="hidden" name="id" value="<?php echo $res['id']; ?> ">	
                                             <textarea class="form-control" name="answer" rows="3"></textarea>
                                          </div>
                                       </td>
                                       <td>
									   
                                          <button type="submit" class="btn btn-primary">Post</button>
                                       </td>
									   </form>
									   <?php
										}   	
									   ?>
                                    </tr>
								<?php
										$slno ++;
										}
									}
								?>	
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
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
		
		$(document).on('submit','#answer_form',function(e){
			e.preventDefault();
			
            $.ajax({
				method:"POST",
				url: "answer_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						
						Swal.fire({
						icon: 'success',
						title: ' Successfully completed will be redirecting',
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
							window.location.reload()
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
		

		
	});
</script>
