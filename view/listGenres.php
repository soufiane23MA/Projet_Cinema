<?php ob_start();?>
<p class="uk-label uk-label-warning">Il y a <?=$requete->rowCount()?> genres de films</p>
<table class="uk-table uk-table-striped">

<thead>
		<tr>
			<th>Identifiant </th>
			<th>Libellé</th>
			<th>Action</th>
		</tr>
</thead>
	<tbody>
			<?php
				foreach($genres as $genre) {?>
			<tr>
					<td><?=$genre["id_genre"]?></td>
					<td><?=$genre["libelle"]?></td>
					<td><a href="index.php?action=deleteGenre&id=<?=$genre['id_genre']?>">suprimer</a></td>
				 
			</tr>
				<?php } ?>
	</tbody>
</table> <br><br><br>


<form action="index.php?action=addGenre" method="post">
    <label for="libelle"  >Ajouter un Genre:</label>
    <input type="text" name="libelle" id="libelle" required >
    <br><br>
    <input type="submit" name="submit" value="Ajouter">
</form>



<?php


$titre = "Liste des Genre de films";
$titre_Secondaire =" Liste de Genre ";
$contenu = ob_get_clean();

require"view/template.php";
?>