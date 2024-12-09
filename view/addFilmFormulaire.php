<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public/css/style.css">
	<title>formulaire</title>
</head>
<body>

<form action="index.php?action=addFilm" method="post" >
    <label for="titreFilm"  >Titre du Film :</label>
    <input type="texte" name="titreFilm" id="titreFilm"   required>
		<br><br>
		<label for="synopsis"  > Synopsis :</label>
		<input type="texte" name="synopsis" id="synopsis" >
		<br><br>
		<label for="note"  >Note:</label>
		<input type="number" name="note" id="note">
		<br><br>
		<label for="annee_sortie"  >Anner de Sortie:</label>
		<input type="number" name="annee_sortie" id="annee_sortie">
		<label for="duree_film"  >Duree du film:</label>
		<input type="number" name="duree_film" id="duree_film"  >
		<label for="id_realisateur"  >Realisateur:</label>
		<input type="texte" name="id_realisateur" id="id_realisateur" >
    <input type="submit" name="submit" value="valider" v>
</form>

	
</body>
</html>