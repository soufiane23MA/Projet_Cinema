<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> genres de films</p>
<table class="uk-table uk-table-striped">

<thead style="background-color: #800C2A; color: #fff; text-align: left;">
		<tr>
			<th style="padding: 10px; font-size: 1.1rem;">Identifiant </th>
			<th style="padding: 10px; font-size: 1.1rem;">Libellé</th>
			<th style="padding: 10px; font-size: 1.1rem;">Action</th>
		</tr>
</thead>
	<tbody>
			<?php
				foreach($genres as $genre) {?>
			<tr>
					<td style="padding: 8px;"><?=$genre["id_genre"]?></td>
					<td style="padding: 8px;"><?=$genre["libelle"]?></td>
					<td style="padding: 8px;"><a href="index.php?action=deleteGenre&id=<?=$genre['id_genre']?>">suprimer</a></td>
				 
			</tr>
				<?php } ?>
	</tbody>
</table> <br><br><br>


<form action="index.php?action=addGenre" method="post">
    <label for="libelle" style="font-weight: bold; display: block; margin-bottom: 8px; color: #555;">Ajouter un Genre:</label>
    <input type="text" name="libelle" id="libelle" required style="width: 30%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
    <br><br>
    <input type="submit" name="submit" value="Ajouter">
</form>



<?php
var_dump($genre);

$titre = "Liste des Genre de films";
$titre_Secondaire ="Genre ";
$contenu = ob_get_clean();

require"view/template.php";
?>