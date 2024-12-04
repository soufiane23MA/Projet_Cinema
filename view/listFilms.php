<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> films</p>
<table class="uk-table uk-table-striped">

	<thead>
			<tr>
				<th>Identifiant</th>
				<th>TITRE </th>
				<th>ANNEE SORTIE</th>
			</tr>
	</thead>
		<tbody>
				<?php
					foreach($films as $film) {?>
					<tr>
						<td><?=$film["id_Filme"]?></td>
						<td><a href="index.php?action=detailFilm&id=<?= $film["id_Filme"] ?>"><?=$film["titre"]?></a></td>
						<td><?=$film["annee_Sortie"]?></td>
					</tr>
					<?php } ?>
		</tbody>
</table>

<?php

$titre = "Liste des films";
$titre_Secondaire ="Liste des films";
$contenu = ob_get_clean();

require"view/template.php";