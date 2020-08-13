<?php
	include("connection.php");
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//parametros
	$user = $_POST['user'];
	$password = $_POST['password'];

	//revision de usuario existente
	$query = ("SELECT user FROM usuarios WHERE user = :user");

	try {
		$sql = $conn->prepare($query);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$sql->bindValue(":user", $user);
		$sql->execute();
		$usuario = $sql->fetchAll(\PDO::FETCH_ASSOC);
	} catch (Exception $ex) {
		echo errorMessage($ex->getMessage());
	}

	if (count($usuario) > 0 ) {
		// si el usuario existe
		$query = ("SELECT password FROM usuarios where user = :user AND password = :password");

		try {
		  $sql = $conn->prepare($query);
		  $sql->bindValue(":user", $user);
		  $sql->bindValue(":password", $password);	 
		  $sql->execute();
		  $userpass = $sql->fetchAll(\PDO::FETCH_ASSOC);
		} catch (Exception $ex) {
		  echo errorMessage($ex->getMessage());
		}
	 
		if (count($userpass) > 0 ) {
		 $_SESSION['login_user'] = $user;
				
				header("location: welcome.php");
				$comando = 'console.log("inicio exitoso");';
				echo '<script>'. $comando . '</script>';


		} else {
			$error = "your User or Password are incorrect";
			echo "<script>alert('$error');</script>"; 
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

   	<!--ESTILOS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="login.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="user" class="form-control" placeholder="username" required="true"/>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password" required="true"/>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>