<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>formulaire</title>
</head>
<body>
<form action="index.php?action=addFilm" method="post" >
    <label for="titreFilm">Titre Film :</label>
    <input type="text" name="titreFilm" id="titreFilm" required>
		<br><br>
		<label for="synopsis"> Synopsis :</label>
		<input type="texte" name="synopsis" id="synopsis" >
		<br><br>
		<label for="note">Note:</label>
		<input type="number" name="note" id="note">
		<br><br>
		<label for="annee_sortie">ANNER :</label>
		<input type="number" name="annee_sortie" id="annee_sortie">
		<label for="duree_film">Duree du film:</label>
		<input type="number" name="duree_film" id="duree_film">
		<label for="id_realisateur">Duree du film:</label>
		<input type="number" name="id_realisateur" id="id_realisateur">
    <input type="submit" name="submit" value="valider">
</form>

	
</body>
</html>