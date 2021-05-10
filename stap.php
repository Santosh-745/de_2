<?php 
	include 'config.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Guide Your Self</title>
  </head>
  <style>
	.header{
		  text-align: center;
		  margin: 2vw 0vw 0vw 0vw;
		  text-transform: uppercase;
		  color: rgb(33, 34, 34);
	  }	  
  </style>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="/de_2/homepage.php">Virtual Guidance</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="/de_2/homepage.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Contact Us</a>
				</li>
			  </ul>
			</div>
		</div>
	</nav>
	<div class="header">
		<h2>
			Steps given by 
			<?php 
				$id = $_GET['id'];
				$iab_data = $conn->prepare("SELECT * FROM home_data where id=? ");
				$iab_data->bindParam(1, $id);
				$iab_data->execute();
				$rowdata = $iab_data->fetch(PDO::FETCH_ASSOC);
				echo $rowdata['Answered_by'];
			?>
		</h2>
	</div>
	<?php
	// echo $id; 
	// $query = "SELECT * FROM home_data where title='.$category.'";
	// $result = $connect->query($query);
	$iab_data = $conn->prepare("SELECT * FROM home_data where id=? ");
	$iab_data->bindParam(1, $id);
	$iab_data->execute();
	while ($rowdata = $iab_data->fetch(PDO::FETCH_ASSOC)) {
		// echo $rowdata['Step_1'];
		for ($i = 1; $i <= $rowdata['No_of_steps']; $i++) {
			$col = 'Step_'.$i;
			$col_1 = 'Reaource_'.$i;
			$href = $rowdata[$col_1];
			// echo $href;
			echo "	<div  class='card bg-success text-white mx-auto mt-5' style='width: 25rem;'>
						<div class='card-header'><h5>Step $i</h5></div>
						<div class='card-body'>
					<!--	<h5 class='card-title'>Step $i</h5> -->
						<p class='card-text'>$rowdata[$col] Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nostrum dolor illo? Dolor a voluptates est officiis velit, maxime provident autem nostrum nobis aperiam vel.</p>
						<a href='$href'> <p class='card-text'> $rowdata[$col_1] </p></a>
						</div>
					</div>"; 
		} 	
	}
	?>
	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
	</body>
</html>
