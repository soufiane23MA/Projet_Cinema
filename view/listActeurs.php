<?php ob_start();?>
<p class="uk-label uk-label-warning">il y a <?=$requete->rowCount()?> acteurs</p>
<table class="uk-table uk-table-striped" >

<thead>
		<tr>
			<th >Identifiant</th>
			<th>Nom </th>
			<th>Prenom</th>
			<th>Date de naissance</th>
			<th>Sex</th>
		</tr>
</thead>
	<tbody>
    <?php foreach ($acteurs as $acteur) { ?>
        <tr>
            <td><?= $acteur["id_personne"] ?? 'N/A' ?></td>
						<td><a href="index.php?action=detailActeur&id=<?= $acteur["id_personne"] ?> "><?= $acteur["nom_personne"] ?? 'N/A' ?></a></td>
            <td><?= $acteur["prenom_personne"] ?? 'N/A' ?></td>
            <td><?= $acteur["date_naissance"] ?? 'N/A' ?></td>
            <td><?= $acteur["sex_personne"] ?? 'N/A' ?></td>
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