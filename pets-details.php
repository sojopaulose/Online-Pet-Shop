<?php 
	session_start();
	if(isset($_SESSION['logged_in']))
	{
		$logged_in = $_SESSION['logged_in'];	
	}else{
		$logged_in = 0;
	}
	
	include('db_connection.php');
	$pet_id = $_GET['id'];
	
	$db=$conn;
	$pet_query = "SELECT pet_ads.id,pet_ads.title,pet_ads.description,pet_ads.price,pet_ads.photo,pet_ads.age,pet_ads.gender,pet_ads.created_at,users.name FROM pet_ads,users WHERE pet_ads.user_id = users.id AND pet_ads.status = 1 AND pet_ads.id = '$pet_id'";
    $pet_result = mysqli_query($db,$pet_query);
    $pet_fetch_result = mysqli_fetch_all($pet_result,MYSQLI_ASSOC);
	
	$more_pet_query = "SELECT id,title,description,photo FROM pet_ads WHERE status = 1 ORDER BY id DESC LIMIT 4";
    $more_pet_result = mysqli_query($db,$more_pet_query);
    $more_pet_fetch_result = mysqli_fetch_all($more_pet_result,MYSQLI_ASSOC);
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

    <div class="container my-5 py-5">
        <div class="row">
          <div class="col-12 mb-3">
            <h2>Pet Details</h2>
          </div>
			 <?php
				if($pet_fetch_result)
				{
					foreach ($pet_fetch_result as $res)
					{
					
			?>
            <div class="col-5">
                <img src="assets/pet_photos/<?php echo $res['photo'] ?>" class="w-100">
            </div>
           
				<div class="col-7">
                <h3><?php echo $res['title'] ?></h3>
                <h5>₹ <?php echo $res['price'] ?></h5>
                <h6>Posted By: <?php echo $res['name'] ?></h6>
                <p>Posted Date: <?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></p>
				<p>Gender: <?php echo $res['gender'];  ?></p>
				<p>Age: <?php echo $res['age'];  ?></p>
                <h6 class="mt-5">Description</h6>
                <p><?php echo $res['description'] ?></p>
				<form  name="buy_rqst_form" autocomplete="off" id="buy_rqst_form" action="" method="post" enctype="multipart/form-data">  
					<input type="hidden" name="ad_id" id="ad_id" value="<?php echo $res['id'] ?> " >
					<input type="hidden" name="user_id" id="user_id" value="<?php $logged_in ?> " >
					<button type="submit" class="btn btn-success" >Request to buy</button>
				</form>
				</div>
				<?php 
					}
					}
				?>
        </div>
        <div class="row mt-5">
          <div class="col-12 mb-3">
            <h4>More Pets</h4>
          </div>
          <?php 
			if($more_pet_fetch_result)
			{
				foreach ($more_pet_fetch_result as $res)
				{
					
					?>
		
        <div class="col-3">
          <div class="card">
            <img src="assets/pet_photos/<?php echo $res['photo'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $res['title'] ?></h5>
              <p class="card-text"><?php echo $res['description'] ?></p>
              <a href="pets-details.php?id=<?php echo $res['id'] ?>" class="btn btn-secondary">View Details</a>
            </div>
          </div>
        </div>
		<?php			
				}
			}
		?>
        
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
		$(document).on('submit','#buy_rqst_form',function(e){
				e.preventDefault();
				
	   
			   
				$.ajax({
					method:"POST",
					url: "buy_request_action.php",
					data:$(this).serialize(),
					success: function(data){
					
						if(data== 1){
							Swal.fire({
							icon: 'success',
							title: 'Registered Successfully will be redirecting',
							showConfirmButton:false
							})
						}
						else if(data== 2){
							Swal.fire({
							icon: 'error',
							title: 'Please login to perform this action',
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
