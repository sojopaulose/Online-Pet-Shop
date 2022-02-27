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
                             <h4 class="text-center">Login</h4>
                        </div>
                        <form action="" name="login_form" method="POST" id="login_form" class="col-12" >
                            <div class="row">
                                <div class="mb-3">
                                    <label for="user_name" class="form-label">Email address</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="passwordreset.php">Forgot Password</a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>           
                </div>          
                <div class="col-12 text-end mt-3">
                    <a href="register.php">Create New Acount</a>
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
		
		$(document).on('submit','#login_form',function(e){
			e.preventDefault();		
   
		   
			$.ajax({
				method:"POST",
				url: "login_check.php",
				data:$(this).serialize(),
				success: function(data){
					result = $.parseJSON(data)
					if(result[0] == 1){
						Swal.fire({
						icon: 'success',
						title: 'Login Successfully will be redirecting',
						showConfirmButton:false
						})
						if(result[1] == 1)
						{
							setTimeout(function () {
                                window.location.href = "admin-dashboard.php";
                            }, 2000); 
						}
						else if(result[1] == 2)
						{	
							setTimeout(function () {
                                window.location.href = "caretake-dashboard.php";
                            }, 2000);
							
						}
						else
						{
							
							setTimeout(function () {
                                window.location.href = "user-dashboard.php";
                            }, 2000);
							
						}
					}	
					else if(result[0] == 2){
										
						Swal.fire({
						icon: 'error',
						title: 'Email or password is incorrect',
						showConfirmButton:false
						})
					} 
					else if(result[0] == 0){
										
						Swal.fire({
						icon: 'error',
						title: 'your Account is not approved',
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