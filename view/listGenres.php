<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> genres de films</p>
<table class="uk-table uk-table-striped">

<thead>
		<tr>
			<th>Identifiant </th>
			<th>Libellé</th>
		</tr>
</thead>
	<tbody>
			<?php
				foreach($genres as $genre) {?>
			<tr>
					<th><?=$genre["id_Genre"]?></th>
					<td><?=$genre["libelle"]?></td>
				 
			</tr>
				<?php } ?>
	</tbody>
</table>

<?php

$titre = "Liste des Genre de films";
$titre_Secondaire ="Genre ";
$contenu = ob_get_clean();

require"view/template.php";
?>