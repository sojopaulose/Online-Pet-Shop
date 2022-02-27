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

    <div class="container py-5 my-5">
        <div class="row m-auto">
            <div class="col-5 m-auto">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-12">
                             <h4 class="text-center">Reset Password</h4>
                        </div>
                        <form action="" method="POST" class="col-12" name="password_reset_form" id="password_reset_form">
                            <div class="row">
								<div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                                </div>
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
			
		$(document).on('submit','#password_reset_form',function(e){
			e.preventDefault();
			
            $.ajax({
				method:"POST",
				url: "pass_reset_action.php",
				data:$(this).serialize(),
				success: function(data){
				
					if(data== 1){
						
						Swal.fire({
						icon: 'success',
						title: ' Successfully changed... redirecting',
						showConfirmButton:false
						})
						
					}
					else if(data == 2){
										
						Swal.fire({
						icon: 'error',
						title: 'Password and Confirm password are not matched ...',
						showConfirmButton:false
						})
					} 
					else if(data == 0){
										
						Swal.fire({
						icon: 'error',
						title: 'Email address not exist',
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