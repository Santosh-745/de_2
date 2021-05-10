<?php
define('BASEPATH', true);
require 'connect.php';
$registered = FALSE;
if(isset($_POST['submit'])){
    try{
        $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        $professionals = $_POST['professional_field'];
        $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

        $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['num'] > 0){
            echo '<script>alert("Email Already Exists");</script>';
        }else{
            $stmt = $dsn->prepare("INSERT INTO users(f_name, l_name, professionals, email, password, user_type) VALUES (:f_name,:l_name,:professionals,:email,:password,:user_type)");
            $stmt->bindParam(':f_name', $f_name);
            $stmt->bindParam(':l_name', $l_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':user_type', $user_type);
            $stmt->bindParam(':professionals', $professionals);
            if($stmt->execute()){
                echo '<script> 
                        alert("Registration Successful");
                        window.location.replace("login.php");
                    </script>';
                // $registered = TRUE;
            }
            else{
                $error = "Error: ".$e->getMessage();
                echo '<script>alert("'.$error.'");</script>';
            }
        }
    }catch(PDOException $e){
        $error = "Error: ".$e->getMessage();
        echo $error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<style>
    .btn{
		  margin: 2vw 0vw 0vw 19vw;
	  }
    .header{
		  text-align: center;
		  margin: 2vw 0vw 0vw 0vw;
		  text-transform: uppercase;
		  color: rgb(33, 34, 34);
	  }
      .inputs{
		margin: 4vh 23vw 0vh 19vw;
		width: 40vw;
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
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="login.php">Log-in</a></li>
                        <li><a class="dropdown-item" href="register.php">Sign-In</a></li>
                    </ul>
                </li> -->
			  </ul>
			</div>
		 </div>
	</nav>
    <?php
		if($registered == TRUE)
		{
			echo '<div class="alert alert-success" role="alert">
					User is registered succesfullyyy !!!!!!!!!!!!!
				</div>';
		}
	?>
    <div class="container">
        <h2 class="text-center header">Register</h2>
        <form method="POST" action="register.php">
            <div class="form-group inputs">
                <input name="f_name" type="text" class="form-control" placeholder="First name">
            </div>
            <div class="inputs form-group">
                <input name="l_name" type="text" class="form-control" placeholder="Last name">
            </div>
            <div class="form-group inputs">
                <input name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group inputs">
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group inputs">
                    <select name="user_type" class="form-control">
                        <option selected>User Type</option>
                        <option>Student</option>
                        <option>Faculty</option>
                    </select>
            </div>
            <div class="form-group inputs">
                <input name="professional_field" type="text" class="form-control" placeholder="Enter the field of work where you are experienced">
            </div>
            <div class="form-group">
                <button name="submit" class="btn btn-primary" type="submit">SUBMIT</button>
            </div>
    </div>
    </div>
    </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>