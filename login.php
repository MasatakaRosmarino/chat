<?php
require_once("includes/connection.php");

$message = "";
if(isset($_POST["login"])){
	$result = $connection->query("SELECT * from user WHERE name = '" .  strtolower($_POST["name"]) . "'");
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();

		if(password_verify($_POST["password"], $row["password"])){
			session_start();

			$_SESSION["name"] = strtolower($_POST["name"]);
			$_SESSION["id"] = $row["id"];

			header("location: chatroom.php");
		}		
	}else{
		/* $message = "<h3>There is no registered user</h3> <p>Go to Register page</p>"; */

		$message = "<div class=\"alert alert-warning\" role=\"alert\">There is no registered user with this name!</div>";
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
	<header class="my-5 p-5">
		<h1 class="text-center text-uppercase">log in</h1>
	</header>

	<div class="container">
		<div class="row justify-content-center mb-3">
			<div class="col-md-6 border rounded-3 shadow p-5">
				<form action="login.php" method="post">
					<div class="mb-3">
						<label for="nameField" class="form-label">Username</label>
						<input type="text" name="name" placeholder="Name here" id="nameField" class="form-control">
					</div>
					<div class="mb-3">
						<label for="pwField" class="form-label">Password</label>
						<input type="password" name="password" placeholder="Password here" id="pwField" class="form-control">
					</div>
					<div class="d-grid gap-2 d-md-flex justify-content-center">
						<input type="submit" name="login" value="Log in"  class="btn btn-success">
					</div>
				</form>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<p class="text-center">Not registered yet? <a href="register.php" class="text-decoration-none">Sign up here!</a></p>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php echo $message; ?>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>