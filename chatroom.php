<?php
	if(isset($_COOKIE["PHPSESSID"])){
		session_start();
	}else{
		header("location: index.php");
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">

    <title>Chat room</title>
  </head>
  <body>
	<nav class="navbar navbar-light bg-light border-bottom border-primary shadow">
		<div id="login-message" class="container-fluid m-0">
			<p class="m-0">Hello <span id="logged-user"><?php echo $_SESSION["name"]; ?></span> Chat with others</p>
		</div>
	</nav>

	<header class="mt-5 p-3">
		<h1 class="text-uppercase text-center">chatroom</h1>
	</header>

	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-10 border shadow p-5 rounded-3">
				<div id="chat-box" class="bg-light px-2 mb-1 pt-2 border border-dark rounded-3"></div>

				<div id="input-box">
					<form>
						<div class="mb-3">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"  class="form-control">
						</div>
						<div class="mb-3">
							<div class="form-floating">
								<div class="d-flex flex-row bd-highlight mb-3">
									<textarea name="message" class="d-inline form-control" placeholder="Your message here..."></textarea>
									<button type="submit" name="send" class="d-inline btn btn-success">Send</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="d-grid gap-2 d-md-flex justify-content-center">
					<a href="logout.php" class="text-decoration-none">Log out</a>
				</div>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
	<script type="text/javascript" src="script.js"></script>

	</body>
</html>