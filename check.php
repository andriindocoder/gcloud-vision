<?php 

session_start();

require "vendor/autoload.php";

use Google\Cloud\Vision\VisionClient;

date_default_timezone_set('Asia/Jakarta');

$vision = new VisionClient(['keyFile' => json_decode(file_get_contents("key.json"), true)]);

$familyPhotoSource = fopen($_FILES['image']['tmp_name'], 'r');

$image = $vision->image($familyPhotoSource, 
	['FACE_DETECTION', 'WEB_DETECTION', 'LABEL_DETECTION', 'IMAGE_PROPERTIES','SAFE_SEARCH_DETECTION', 'LANDMARK_DETECTION', 'LOGO_DETECTION']);

$result = $vision->annotate($image);

if($result){
	$imagetoken = mt_rand(111111, 999999);
	move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/feed/'. $imagetoken . ".jpg");
} else {
	header("location: index.php");
	die();
}

$faces      = $result->faces();
$logos      = $result->logos();
$labels     = $result->labels();
$text       = $result->text();
$fullText   = $result->fullText();
$properties = $result->imageProperties();
$cropHints  = $result->cropHints();
$web        = $result->web();
$safeSearch = $result->safeSearch();
$landmarks  = $result->landmarks();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Cloud Vision API</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
		.container-fluid {
			margin-bottom: 50px;
		}
	</style>
</head>
<body class="bg">
	<div class="container-fluid" style="max-width: 1080px;">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12" style="margin: auto; background: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
				<div class="panel-heading">
					<h2><a href="/learning/gcloud/index.php">Google Cloud Vision API</a></h2>
					<p style="font-style: italic">Google Machine Learning</p>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-2" style="text-align: center">
						<img class="img-thumbnail" src="<?php
							if ($faces == null){
								echo "feed/" . $imagetoken . ".jpg";
							} else {
								//Tweak here
								echo "image.php?token=$imagetoken";
								// echo "feed/" . $imagetoken . ".jpg";
							}
						?>" alt="Analysed Image">
					</div>
					<div class="col-md-10 border" style="padding: 10px;">
						<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a href="#pills-face" role="tab" class="nav-link active" id="pills-face-tab" data-toggle="pill" aria-controls="pills-face" aria-selected="true">Faces</a>
							</li>
							<li class="nav-item">
								<a href="#pills-labels" role="tab" class="nav-link" id="pills-labels-tab" data-toggle="pill" aria-controls="pills-labels" aria-selected="true">Labels</a>
							</li>
							<li class="nav-item">
								<a href="#pills-web" role="tab" class="nav-link" id="pills-web-tab" data-toggle="pill" aria-controls="pills-web" aria-selected="true">Web</a>
							</li>
							<li class="nav-item">
								<a href="#pills-properties" role="tab" class="nav-link" id="pills-properties-tab" data-toggle="pill" aria-controls="pills-properties" aria-selected="true">Properties</a>
							</li>
							<li class="nav-item">
								<a href="#pills-safesearch" role="tab" class="nav-link" id="pills-safesearch-tab" data-toggle="pill" aria-controls="pills-safesearch" aria-selected="true">Safe Search</a>
							</li>
							<li class="nav-item">
								<a href="#pills-landmarks" role="tab" class="nav-link" id="pills-landmarks-tab" data-toggle="pill" aria-controls="pills-landmarks" aria-selected="true">Landmarks</a>
							</li>
							<li class="nav-item">
								<a href="#pills-logo" role="tab" class="nav-link" id="pills-logo-tab" data-toggle="pill" aria-controls="pills-logo" aria-selected="true">Logos</a>
							</li>
						</ul>
						<hr>
						<div class="tab-content" id="pills-tabContent">

							<div class="tab-pane fade show active" id="pills-face" role="tabpanel" aria-labelledby="pills-face-tab">
								<div class="row">
									<div class="col-12">
										<?php include "faces.php" ?>
									</div>
								</div>
								
							</div>
							<div class="tab-pane fade show" id="pills-labels" role="tabpanel" aria-labelledby="pills-labels-tab">
								<div class="row">
									<div class="col-12">
										<?php include "labels.php" ?>
									</div>
								</div>
								
							</div>
							<div class="tab-pane fade show" id="pills-web" role="tabpanel" aria-labelledby="pills-web-tab">
								<div class="row">
									<div class="col-12">
										<?php include "web.php" ?>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="pills-properties" role="tabpanel" aria-labelledby="pills-properties-tab">
								<div class="row">
									<div class="col-12">
										<?php include "properties.php" ?>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="pills-safesearch" role="tabpanel" aria-labelledby="pills-safesearch-tab">
								<div class="row">
									<div class="col-12">
										<?php include "safesearch.php" ?>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="pills-landmarks" role="tabpanel" aria-labelledby="pills-landmarks-tab">
								<div class="row">
									<div class="col-12">
										<?php include "landmarks.php" ?>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="pills-logo" role="tabpanel" aria-labelledby="pills-logo-tab">
								<div class="row">
									<div class="col-12">
										<?php include "logos.php" ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>