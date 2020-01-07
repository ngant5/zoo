<?php
	include('./connection.php');
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Belle &amp; Carrie Rehabilitation Yoga Web Template</title>
	<link rel="stylesheet" type="text/css" href="./asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="./asset/css/mobile.css">
	<script type='text/javascript' src='./asset/js/mobile.js'></script>
</head>
<style>
	.video-fluid {
		width: 100%;
		height: auto;
	}
</style>
<body>
	<?php include "./common/header-common.php"; ?>
		<div id="body" class="video-body">
			<!-- <div id="tagline">
				<h1>a</h1>
				<p>
					For Better Health &amp; Flexibility
				</p>
			</div> -->
			<video class="video-fluid" autoplay muted loop id="myVideo">
				<source src="https://mdbootstrap.com/img/video/Sail-Away.mp4" type="video/mp4" />
			</video>
		</div>
	<?php include "./common/footer-common.php"; ?>
</body>
</html>