<?php
	include 'config.php';
	$inserted = FALSE;
	if(isset($_POST["submit"]))
	{
		$title = $_POST['title'];
		$desc = $_POST['description'];
		$cat = $_POST['category'];
		$iab_data = $conn->prepare("INSERT INTO `queries` (`title`, `description`, `date_time`) VALUES ('$title', '$desc', CURRENT_DATE());");
		if($iab_data->execute())
		{
			$inserted = TRUE;
		}
	}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Hello, world!</title>
  </head>
  <style>
	  .header{
		  text-align: center;
		  margin: 2vw 0vw 0vw 0vw;
		  text-transform: uppercase;
		  color: rgb(164, 166, 167);
	  }
	  .labels{
		  margin: 1vw 0vw 1vw 24vw;
	  }
	  .inputs{
		margin: 0vw 23vw 0vw 24vw;
		width: 50vw;
	  }
	  .btn{
		  margin: 2vw 0vw 0vw 24vw;
	  }
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Path Finder</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link" aria-current="page" href="student.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Contact Us</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" href="addquery.php">Ask Query</a>
				</li>
			  </ul>
			</div>
		 </div>
        <!--<div class="container ">
            <span> Hello <?php echo $_SESSION['user'];?></span>
        </div> -->
	</nav>
	<?php
		if($inserted == TRUE)
		{
			echo '<div class="alert alert-success" role="alert">
					<p >Query is submitted</p>
				</div>';
		}
	?>
	<div class="header">
		<h2>
			Ask your query related any subject or career
		</h2>
	</div>
	<div class="mainform">
		<form action="/de_2/addquery.php" method="post">
			<div class="form-group">
			  <label for="title" class="labels">Title</label>
			  <input type="text" class="form-control inputs" id="title" name="title">
			</div>
			<div class="form-group">
			  <label for="discription" class="labels">Discription</label>
			  <textarea type="text" class="form-control inputs" id="description" name="description"></textarea>
			</div>
			<div class="form-group">
				<label for="category" class="labels">Category</label>
				<select class="form-control inputs" id="category" name="category">
				  <?php	
					$iab_data = $conn->prepare("SELECT * FROM categories ORDER BY id asc");
					$iab_data->execute();
					while ($rowdata = $iab_data->fetch(PDO::FETCH_ASSOC)) {
					?>

				  		<option> <?php echo $rowdata['Category'];?> </option>
			<?php	} 	?> 
					<!-- <option>category 1</option>
					<option>category 2</option>
					<option>category 3</option>
					<option>category 4</option> -->
				</select>
			  </div>
			<button type="submit" name="submit" class="btn btn-primary">Ask Query</button>
		  </form>
	</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>