<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> films</p>
<table class="uk-table uk-table-striped">

	<thead style="background-color: #800C2A; color: #fff; text-align: left;">
			<tr style="border-bottom: 1px solid #ddd; text-align: left;">
				<th style="padding: 10px; font-size: 1.1rem;">Identifiant</th>
				<th style="padding: 10px; font-size: 1.1rem;">TITRE </th>
				<th style="padding: 10px; font-size: 1.1rem;">ANNEE SORTIE</th>
			</tr>
	</thead style="background-color: #800C2A; color: #fff; text-align: left;">
		<tbody>
				<?php
					foreach($films as $film) {?>
					<tr style="border-bottom: 1px solid #ddd; text-align: left;">
						<td style="padding: 10px; font-size: 1.1rem;"><?=$film["id_film"]?></td>
						<td style="padding: 10px; font-size: 1.1rem;"><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?=$film["titre"]?></a></td>
						<td style="padding: 10px; font-size: 1.1rem;"><?=$film["annee_sortie"]?></td>
					</tr>
					<?php } ?>
		</tbody>
</table>

<?php

$titre = "Liste des films";
$titre_Secondaire ="Liste des films";
$contenu = ob_get_clean();

require"view/template.php";