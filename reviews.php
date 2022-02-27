<?php 
	include('db_connection.php');
	$db=$conn;
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

    

    <div class="container my-5">
      <div class="row">
            <div class="col-12 text-center my-4">
             <h2>Reviews</h2>
            </div>
            <div class="col-12 my-3">
				<?php
				if($review_fetch_result)
				{
					foreach($review_fetch_result as $res)
					{
						?>
                <div class="row mb-3">
                    <div class="col-4">
                        <img src="img/1.png" alt="">
                    </div>
                    <div class="col-8">
                        <h3><i>Title: </i> <?php echo $res['title']; ?></h3>
                        <p class="mb-0"><i>Review: </i><?php echo $res['review']; ?></p>
                        <p>Review by: <?php echo $res['name']; ?></p>
						<p>Date: <?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></p>
                    </div>
                </div>
				
				<?php			
					}
				}
			?>
				
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