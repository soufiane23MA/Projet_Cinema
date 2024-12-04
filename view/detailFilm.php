<?php ob_start();
?>

<h1><?= $film["titre"] ?></h1>
<ul>
	<li>Annee de sorire : <?= $film["annee_Sortie"] ?></li>
	<li>Note : <?= $film["note"] ?></li>
	<li>Synopsis :<?= $film["synopsis"] ?> </li>
	<li>Réalisateur : <?= $film["Realisateur"] ?></li>
</ul>
<!--<p>Synopsis :</p>
<p>Note :</p>
<p>Annee de sorire :</p>
<p> Réalisateur : </p>-->

 <p>Casting</p>
 <table>
		<thead>
			<tr>
			 
				<th>Acteur</th>
				<th> </th>
				<th>Rôle</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($castingDetail as $cast){?>
				<tr>
				 
				<td><?= $cast["Acteur"]?></td>
				<td> </td>
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