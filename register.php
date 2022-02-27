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
	<script src="assets/js/main.js"></script>
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

    <div class="container py-5 my-5">
        <div class="row m-auto">
            <div class="col-5 m-auto">
                <div class="card p-4">
                    <div class="row">                        
                        <div class="col-12">
                             <h4 class="text-center">Register</h4>
                        </div>  
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">User</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Caretaker</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row my-4">
                                    <form name="register_form" autocomplete="off" id="register_form" action="" method="post" class="col-12">
                                    <input type="hidden" name="user_type" value="normal">
                                        <div class="row">
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="full_name" required id="full_name" placeholder="Name">
												
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="mobile_no" required id="mobile_no" placeholder="Mobile">
												<p id="mobile_error"> Enter a valid phone number </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="email_id" required id="email_id" placeholder="Email">
												<p id="email_error"> Enter a valid email address </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
												
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <button type="submit"  class="btn btn-primary w-100">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row my-4">
                                    <form class="col-12" name="caretaker_form" autocomplete="off" id="caretaker_form" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="caretaker_form_usertype" value="caretaker">
                                        <div class="row">
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="caretaker_name" id="caretaker_name" required placeholder="Name" required>
												
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="caretaker_mobile" id="caretaker_mobile" placeholder="Mobile No" required >
												<p id="ct_mobile_error"> Enter a valid phone number </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="email" class="form-control" name="caretaker_email_id" id="caretaker_email_id" placeholder="Email" required>
												<p id="ct_mail_error"> Enter a valid email address </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="password" class="form-control" name="caretaker_password" id="caretaker_password" placeholder="Password" required >
												
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="caretaker_file" class="form-label">Certificate</label>
                                                <input class="form-control" type="file" name="caretaker_file" id="caretaker_file" required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary w-100">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
	<script src="js/jquery.min.js"></script>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
		
		$('#ct_mobile_error').hide();
		$('#ct_mail_error').hide();
		
		$('#mobile_error').hide();
		$('#email_error').hide();
		
		$(document).on('submit','#register_form',function(e){
			e.preventDefault();
			
			$('#mobile_error').hide();
			$('#email_error').hide();
			var email_id = $('#email_id').val();
			var mobile = $('#mobile_no').val();	
			
			var phoneno_reg = /^\d{10}$/;
			var mailformat = /^([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+$/;
			
			
			
			
			if(! mobile.match(phoneno_reg))
			{
				$('#mobile_error').show();
				return false;
			}
			else if(! email_id.match(mailformat))
			{
				$('#email_error').show();
				return false;
			}
			else
			{
				
			}
			
			$.ajax({
				method:"POST",
				url: "register_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						Swal.fire({
						icon: 'success',
						title: 'Registered Successfully will be redirecting',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "login.php";
						}, 2000); 
					}
					else if(data== 0){
						Swal.fire({
						icon: 'error',
						title: 'Email address already exist',
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
		
		
		$(document).on('submit','#caretaker_form',function(e){
			e.preventDefault();
			
			$('#ct_mobile_error').hide();
			$('#ct_mail_error').hide();
			
			var form = $(this)[0];

			var data = new FormData(form);	
			
			var caretaker_email_id = $('#caretaker_email_id').val();
			var caretaker_mobile = $('#caretaker_mobile').val();
			var caretaker_password = $('#caretaker_password').val();
			
			var phoneno_reg = /^\d{10}$/;
			var mailformat = /^([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+$/;
			
			
			
			
			if(! caretaker_mobile.match(phoneno_reg))
			{
				$('#ct_mobile_error').show();
				return false;
			}
			else if(! caretaker_email_id.match(mailformat))
			{
				$('#ct_mail_error').show();
				return false;
			}
			else
			{
				
			}
			 
			$.ajax({
				
				url: "ct_register_action.php",
				
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
						title: 'Registered Successfully will be redirecting',
						showConfirmButton:false
						})
						setTimeout(function () {
							window.location.href = "login.php";
						}, 2000); 
						
					}	
					
					else if(data== 0){
						Swal.fire({
						icon: 'error',
						title: 'Email address already exist',
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
	