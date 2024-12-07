<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> de réalisateurs</p>
<table class="uk-table uk-table-striped" style="width: 100%; border-collapse: collapse; margin-top: 20px;">

	<thead style="background-color: #800C2A; color: #fff; text-align: left;">
			<tr>
				<th style="padding: 10px; font-size: 1.1rem;">Identifiant</th>
				<th style="padding: 10px; font-size: 1.1rem;">Nom </th>
				<th style="padding: 10px; font-size: 1.1rem;">Prenom</th>
				<th style="padding: 10px; font-size: 1.1rem;">Date de naissance</th>
				<th v>Sex</th>
			</tr>
	</thead>
		<tbody style="background-color: #f9f9f9;">
				<?php
					foreach($realisateurs as $realisateur) {?>
					<tr style="border-bottom: 1px solid #ddd; text-align: left;">
						<td style="padding: 8px;"><?=$realisateur["id_personne"] ?? 'N/A'?></td>
						<td style="padding: 8px;"><?=$realisateur["nom_personne"] ?? 'N/A'?></td>
						<td style="padding: 8px;"><?=$realisateur["prenom_personne"] ?? 'N/A'?></td>
						<td style="padding: 8px;"><?=$realisateur["date_naissance"] ?? 'N/A'?></td>
						<td style="padding: 8px;"><?=$realisateur["sex_personne"] ?? 'N/A'?></td>
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