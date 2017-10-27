<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rock+Salt" rel="stylesheet">


	<title>Super Hero FaceBook</title>
</head>
<body class="container mt-5">

	<h1 class="text-center">Welcome to The Super FaceBook</h1>


	<?php

		include ('database.php');

		function getHeroes(){
			$request = pg_query (getDb(), "select * from heroes");
			return pg_fetch_all($request);
		}
	?>

	<div class="col mt-5">
		<div class="row">
			<div class="hero">


				<?php
					$heroes = getHeroes();

					foreach ($heroes as $hero){

					?>

								<img class="profile mt-2" src="<?=$hero['image_url']?>">
								<h3><?=$hero['name']?></h3>
								<h4><?=$hero['about_me']?></h4>
								<p><?=$hero['biography']?></p>

						<?php
							
						 	// echo $hero['biography'];
						 	// echo "\n"; 
						  
				
					}

				?>
			</div>
		</div>
	</div>

</body>
</html>