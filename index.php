<?php 
	
	include('db_connection.php');
	$db=$conn;	
	
	$more_pet_query = "SELECT id,title,description,photo FROM pet_ads WHERE status = 1 ORDER BY id DESC LIMIT 6";
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

    <!-- slider -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/slider.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>We keep pets for pleasure.</h3>
            <p>We know your concerns when you are looking for a chewing treat for your dog.</p>
          </div>
        </div>
      </div>
    </div>
    

    <!-- info -->
    <div class="container my-5">
      <div class="row">
        <div class="col-4">
          <div class="single-cta-wrapper">
              <i class="bi bi-box2-fill" style="font-size: 2rem;"></i>
              <div class="cta-content">
                  <h4 class="title">Free Shipping</h4>
                  <p>Free shipping on all order</p>
              </div>
          </div>
        </div>
        <div class="col-4">
          <div class="single-cta-wrapper">
            <i class="bi bi-headset" style="font-size: 2rem;"></i>
              <div class="cta-content">
                  <h4 class="title">ONLINE SUPPORT</h4>
                  <p>Online live support 24/7</p>
              </div>
          </div>
        </div>
        <div class="col-4">
          <div class="single-cta-wrapper">
             <i class="bi bi-wallet-fill" style="font-size: 2rem;"></i>
              <div class="cta-content">
                  <h4 class="title">MONEY RETURN</h4>
                  <p>Back guarantee under 5 days</p>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-5">
      <div class="row">
        <div class="col-12 text-center my-4">
          <h2>Latest Pets</h2>
        </div>
        <?php 
			if($more_pet_fetch_result)
			{
				foreach ($more_pet_fetch_result as $res)
				{
					
					?>
		
        <div class="col-4">
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


    <!-- banner -->
    <section class="container my-5">
      <div class="row">
        <div class="col-6">
          <img src="img/1.png" class="w-100">
        </div>
        <div class="col-6">
          <img src="img/2.png" class="w-100">
        </div>
      </div>
    </section>
    
    
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