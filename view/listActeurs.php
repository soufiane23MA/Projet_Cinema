<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> acteurs</p>
<table class="uk-table uk-table-striped" >

<thead style="background-color: #800C2A; color: #fff; text-align: left;">
		<tr>
			<th style="padding: 10px; font-size: 1.1rem;">Identifiant</th>
			<th style="padding: 10px; font-size: 1.1rem;">Nom </th>
			<th style="padding: 10px; font-size: 1.1rem;">Prenom</th>
			<th style="padding: 10px; font-size: 1.1rem;">Date de naissance</th>
			<th style="padding: 10px; font-size: 1.1rem;">Sex</th>
		</tr>
</thead>
	<tbody>
    <?php foreach ($acteurs as $acteur) { ?>
        <tr style="border-bottom: 1px solid #ddd; text-align: left;">
            <td style="padding: 8px;"><?= $acteur["id_personne"] ?? 'N/A' ?></td>
						<td style="padding: 8px;"><a href="index.php?action=detailActeur&id=<?= $acteur["id_personne"] ?> "><?= $acteur["nom_personne"] ?? 'N/A' ?></a></td>
            <td style="padding: 8px;"><?= $acteur["prenom_personne"] ?? 'N/A' ?></td>
            <td style="padding: 8px;"><?= $acteur["date_naissance"] ?? 'N/A' ?></td>
            <td style="padding: 8px;"><?= $acteur["sex_personne"] ?? 'N/A' ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>

<?php

$titre = "Liste des Acteurs";
$titre_Secondaire ="Liste des Acteurs ";
$contenu = ob_get_clean();

require"view/template.php";
?>