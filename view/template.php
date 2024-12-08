 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$titre?></title>
 </head>
 <body>
	<header>
	<nav>
			<ul>
				<!--<li><a href=" index.php?action=template">Home</a></li>-->
				<li><a href=" index.php?action=listFilms">Films</a></li>
				<li><a href=" index.php?action=listActeurs">Acteurs</a></li>
				<li><a href=" index.php?action=listRealisateurs">Réalisateurs</a></li>
				<!--<li><a href=" index.php?action=listRoles">Rôles</a></li>-->
				<li><a href=" index.php?action=listGenres">Genres</a></li>
				<li><a href="index.php?action=addFilmFormulaire">Ajouter un film</a></li>
			</ul>
		</nav>

	</header>
	<div>
		
		<main>
			<div id="contenu">
					<h1>PDO Cinema</h1>
					<h2><?= $titre_Secondaire?></h2>
					<?= $contenu?>
			</div>
		</main>

	</div>
	
 </body>
 </html>