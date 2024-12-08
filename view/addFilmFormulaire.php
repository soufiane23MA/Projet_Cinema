<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>formulaire</title>
</head>
<body>
<form action="index.php?action=addFilm" method="post" >
    <label for="titreFilm" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;">Titre du Film :</label>
    <input type="texte" name="titreFilm" id="titreFilm"  style="width: 30%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;"required>
		<br><br>
		<label for="synopsis" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;"> Synopsis :</label>
		<input type="textaria" name="synopsis" id="synopsis" style="width: 50%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;" >
		<br><br>
		<label for="note" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;">Note:</label>
		<input type="number" name="note" id="note" style="width: 30%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
		<br><br>
		<label for="annee_sortie" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;">Anner de Sortie:</label>
		<input type="number" name="annee_sortie" id="annee_sortie" style="width: 30%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
		<label for="duree_film" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;">Duree du film:</label>
		<input type="number" name="duree_film" id="duree_film" style="width: 30%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
		<label for="id_realisateur" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;">Realisateur:</label>
		<input type="texte" name="id_realisateur" id="id_realisateur" style="width: 30% padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
    <input type="submit" name="submit" value="valider" v>
</form>

	
</body>
</html>