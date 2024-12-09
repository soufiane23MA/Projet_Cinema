<?php ob_start();
?>

<h1><?= $film["titre"] ?></h1>
<ul>
	<li>Annee de sotie : <?= $film["annee_sortie"] ?></li>
	<li>Note : <?= $film["note"] ?></li>
	<li>Synopsis :<?= $film["synopsis"] ?> </li>
	<li>Réalisateur : <?= $film["realisateur"] ?></li>
</ul>
 

<p><strong>Casting</strong></p>


 <table >
		<thead>
			<tr>
				<th>Acteur</th>
				<th>Rôle</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($castingDetail as $cast){?>
			<tr>
				<td><?= $cast["Acteur"]?></td>
				<td><?= $cast["Role"]?></td>
			</tr>
			

			<?php }?>

		
		</tbody>
	 </table>
	 








<?php

$titre = "Détail du Film";
$titre_Secondaire ="Détail du Film";
$contenu = ob_get_clean();

require"view/template.php";