<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rock+Salt" rel="stylesheet">
	<title>Super Hero FaceBook</title>
</head>
<body class="container mt-3">
	<h1 class="text-center">Welcome to The Super FaceBook</h1>
	<?php
		include ('database.php');
		function getHeroes(){
			$request = pg_query (getDb(), "
				SELECT heroes.id AS hero_id, name, about_me AS about, biography AS bio, image_url AS img
    		FROM heroes;");
				return pg_fetch_all($request);
		}
	?>
	<div class="hero">
		<?php
			$heroes = getHeroes();
			foreach ($heroes as $hero){
		?>
		<div class="row ">
			<div class="col-6 mt-5">
				<a href="components/super.php?hero_id=<?=$hero['hero_id']?>" ><img class="profile float-right" src="<?=$hero['img']?>"></a>
			</div>
			<div class="col-6 mt-5 "> 		
				<h3 class="float-left"><?=$hero['name']?></h3>
			</div>
		</div>
		<?php				
			}
		?>
	</div>
</body>
</html>