<?php ob_start();
?>

<h1><?= $film["titre"] ?></h1>
<ul>
	<li>Annee de sotie : <?= $film["annee_sortie"] ?></li>
	<li>Note : <?= $film["note"] ?></li>
	<li>Synopsis :<?= $film["synopsis"] ?> </li>
	<li>Réalisateur : <?= $film["realisateur"] ?></li>
</ul>
 

<p><strong style="font-size: 1.5rem; color: #800C2A;">Casting</strong></p>


 <table style="width: 100%; border-collapse: collapse; margin-top: 10px;" >
		<thead>
			<tr style="background-color: #800C2A; color: #fff;">
				<th style="padding: 8px 12px; text-align: left; font-size: 1.2rem;">Acteur</th>
				<th style="padding: 8px 12px; text-align: left; font-size: 1.2rem;">Rôle</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($castingDetail as $cast){?>
			<tr style="border-bottom: 1px solid #ddd;">
				<td style="padding: 8px 12px;"><?= $cast["Acteur"]?></td>
				<td style="padding: 8px 12px;"><?= $cast["Role"]?></td>
			</tr>
			

			<?php }?>

		
		</tbody>
	 </table>
	 








<?php

$titre = "Détail du Film";
$titre_Secondaire ="Détail du Film";
$contenu = ob_get_clean();

require"view/template.php";