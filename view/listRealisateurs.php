<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> de réalisateurs</p>
<table class="uk-table uk-table-striped">

	<thead>
			<tr>
				<th>Identifiant</th>
				<th>Nom </th>
				<th>Prenom</th>
				<th>Date de naissance</th>
				<th>Sex</th>
			</tr>
	</thead>
		<tbody>
				<?php
					foreach($realisateurs as $realisateur) {?>
					<tr>
						<td><?=$realisateur["id_Personne"] ?? 'N/A'?></td>
						<td><?=$realisateur["nom_Personne"] ?? 'N/A'?></td>
						<td><?=$realisateur["prenom_Personne"] ?? 'N/A'?></td>
						<td><?=$realisateur["date_Naissance"] ?? 'N/A'?></td>
						<td><?=$realisateur["sex_Personne"] ?? 'N/A'?></td>
					</tr>
					<?php } ?>
		</tbody>
</table>

<?php

$titre = "Liste des Réalisateur";
$titre_Secondaire ="Liste des Réalisateurs ";
$contenu = ob_get_clean();

require"view/template.php";
?>