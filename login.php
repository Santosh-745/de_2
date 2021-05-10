<?php
session_start();
define('BASEPATH', true);
require 'connect.php';

$_SESSION['user']='';

if(isset($_POST['submit'])){
    try{
        $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_login = !empty($_POST['email']) ? ($_POST['email']) :null;
        $passwordAttempt = !empty($_POST['password']) ? ($_POST['password']) :null;

        //Retrieve
        $sql = "SELECT email, password, user_type FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':email', $user_login);
        //Execute
        $stmt->execute();
        
        //Fetch
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //if row is false
        if($user === false){
            echo '<script>alert("invalid email or password")</script>';
        }else{
            //Compare Passwords
            $validPassword = password_verify($passwordAttempt, $user['password']);

            if($validPassword){
                $_SESSION['user'] = $user_login;
                if($user['user_type'] === 'Faculty'){
                    $_SESSION['faculty_loggedin'] = true;
                    $_SESSION['student_loggedin'] = false;
                    $_SESSION['username'] = $user;
                    echo '<script>window.location.replace("faculty.php")</script>';
                }elseif($user['user_type'] === 'Student'){
                    $_SESSION['student_loggedin'] = true;
                    $_SESSION['faculty_loggedin'] = false;
                    $_SESSION['username'] = $user;
                    echo '<script>window.location.replace("student.php")</script>';
                }
            }else{
                echo '<script>alert("invalid email or password")</script>';
            }
        }

    }catch(PDOException $e){
        $error = "Error: ".$e->getMessage();
        echo '<script>alert("'.$error.'");</script>';
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
    <title>Login</title>
</head>

<body>

    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="/de_2/homepage.php">Virtual Guidance</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
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
    </div>

    <div class="container mt-5 pl-5 col-6">
        <div class="row">
            <div class="col">
                <h2 >Login</h2>
            </div>
        </div>
        <form method='POST' action='login.php'>
            <div class="row mt-4"> <!-- mt-3 pl-5 ml-5-->
                <div class="col"><!--col-sm-10-->
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email" style="width:50%">
                    </div>
                </div>
            </div>    
            <div class="row mt-1">
                <div class="col">
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="Password" style="width:50%">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <button name="submit" class="btn btn-primary" type="submit">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>