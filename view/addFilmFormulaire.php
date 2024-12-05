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
		
    <input type="submit" name="submit" value="valider">
</form>

	
</body>
</html>