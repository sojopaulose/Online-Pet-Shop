<?php 
	include('db_connection.php');
	$db=$conn;
	$qstn_answr_query = "SELECT id,title,question,answer,created_at FROM qstn_answr WHERE status = 1";
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
	<script src="assets/js/moment.js"></script>
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

    

    <div class="container my-5">
      <div class="row">
            <div class="col-12 text-center my-4">
            <h2>Forum</h2>
            </div>
            <div class="col-12">
                <form action="" id="search_qstn" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search_key" id="search_key" placeholder="Search Questions" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">
                            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
			<div id="pet_div">
				<?php
					if($qstn_answr_fetch_result)
					{
						foreach($qstn_answr_fetch_result as $res)
						{
							?>
				
				<div class="col-12 my-3">
					<h3><i>Q: </i> <?php echo $res['question'] ?></h3>
					<p><i>Answer: </i><?php echo $res['answer'] ?></p>
					<p><i>Date: </i><?php echo $newDate = date("d-m-Y", strtotime($res['created_at']));  ?></p>
				</div>
				<?php			
						}
					}
				?>
			</div>
			<div id="serach_div">
			</div>	
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

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('submit','#search_qstn',function(e){
				e.preventDefault();
				// document.getElementById("element").style.display = "none";
				var search_key = document.getElementById("search_key").value;
				document.getElementById("serach_div").innerHTML = ""
				if(search_key != '' )
				{
					$.ajax({
						method:"POST",
						url: "search_qstn_action.php",
						data:$(this).serialize(),
						dataType: 'JSON',
						success: function(data){
							var len = data.length;
							if(len > 0)
							{
								
								document.getElementById("pet_div").style.display = "none";	
								for(var i=0; i<len; i++){
									var question = data[i].question;
									var answer = data[i].answer;
									var date = moment(data[i].created_at).format('DD-MM-YYYY');
									
									var search_result = '<div class="col-12 my-3">'	+
														'<h3><i>Q:'+ question +'</h3>'+
														'<p><i>Answer: </i>'+ answer +'</p>'+
														'<p><i>Date: </i>'+ date +'</p>'+
													'</div>';
									document.getElementById("serach_div").insertAdjacentHTML("beforeend",search_result);								
								}
							}
							else{
								document.getElementById("pet_div").style.display = "none";	
								document.getElementById("serach_div").innerHTML = "NO DATA FOUND"
							}
										
						}
					});
					
				}
				else
				{
					document.getElementById("pet_div").style.display = "block";	
						
				}
			
			});
	});			
	
</script>