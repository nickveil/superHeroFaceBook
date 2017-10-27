<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="../style.css">

	<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Rock+Salt" rel="stylesheet">
	<title>Super Hero FaceBook</title>
</head>
<body class="container mt-5">
	<h1 class="text-center">Welcome to The Super FaceBook</h1>	


	<div class='hero'>

	<?php
	include ('../database.php');

		if (isset($_GET['hero_id'])){
			$name = $_GET['hero_id'];
		}

		function getHeroes($name){
			$request = pg_query (getDb(), "
				SELECT heroes.id AS hero_id, name, about_me AS about, biography AS bio, image_url AS img, ability  
	  		FROM heroes
	  		JOIN ability_hero ON heroes.id = ability_hero.hero_id
	  		JOIN abilities ON ability_hero.ability_id = abilities.id
	  		WHERE hero_id = $name;");
			return pg_fetch_all($request);
		}

		$heroes = getHeroes($name);
		$hero_ability = [];

		foreach ($heroes as $hero){
			$hero_name = $hero['name'];
			$hero_about = $hero['about'];
			$hero_bio = $hero['bio'];
			array_push($hero_ability,$hero['ability']);
		}
		?>
		<div class="image">
			<img class="bio mt-2" src="<?=$hero['img']?>">
		</div>
			<h3><?=$hero['name']?></h3>
			<h4><?=$hero['about']?></h4>
			<p><?=$hero['bio']?></p>
			<h5>Super Powers</h5>
			<ul>

			<?php
				foreach($hero_ability as $ability){
			?>
					<li><?=$ability?></li>
			<?php
				}
				?>
			</ul>

			  

		
		<a class='mb-5' href='../index.php'>Back</a>

	</div>

	

</body>
</html>
