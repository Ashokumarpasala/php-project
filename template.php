<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6" />
		<link rel="stylesheet" href="main.css" />
		<style>	
		* {
			padding:0;
			margin: 0;
			box-sizing: border-box;
		}
		body {
		}
			.mainimg {
				width: 100%;
				height: 500px;
				position: absolute;
				z-index: -1;
				margin-top: 15px;
			}
		</style>
	</head>
	<body class="">
		<!-- <img src="https://wallpapercave.com/wp/wp2464954.jpg" class="mainimg" alt=""> -->
		<!-- <div style="background-image: url('https://wallpapercave.com/wp/wp2464954.jpg');"></div> -->

		<h1>Marrige Invitation</h1>
		<div class="">



			<p>Groom's Name: {{ g_name }}</p>
			<p>Groom's Age: {{ g_age }}</p>
			<p>bride's Name: {{ b_name }}</p>
			<p>bride's Age: {{ b_age }}</p>
		</div>
	</body>
</html>
