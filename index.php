<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Andri Wicaksono | Google Cloud Vision API</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		body, html {
			height: 100%;
		}
		.bg {
			background-image: url("images/bg.jpg");
			height: 100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body class="bg">
	<div class="container">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6 offset-md-3" style="margin: auto; background: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
				<div class="panel-heading">
					<h2>Google Cloud Vision</h2>
					<p style="font-style: italic">By. Andri Wicaksono</p>
				</div>
				<hr>
				<form action="check.php" method="post" enctype="multipart/form-data">
					<input type="file" name="image" accept="image/*" class="form-control">
					<br>
					<button type="submit" style="border-radius: 0px;" class="btn btn-block btn-lg btn-outline-success">Analyse Image</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>