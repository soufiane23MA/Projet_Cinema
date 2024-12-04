<?php ob_start();
?>

<h1><?= $film["titre"] ?></h1>
<ul>
	<li>Annee de sorire : <?= $film["annee_Sortie"] ?></li>
	<li>Note : <?= $film["note"] ?></li>
	<li>Synopsis :<?= $film["synopsis"] ?> </li>
	<li>Réalisateur : <?= $film["Realisateur"] ?></li>
</ul>
 

 <p>Casting</p>
 <table style=" width: 50%;
    border-collapse: collapse" >
		<thead>
			<tr style ='width: 50%;
    border-collapse: collapse'>
			 
				<th style=' width: 50%;
    border-collapse: collapse'>Acteur</th>
				<th> </th>
				<th style=' width: 50%;
    border-collapse: collapse'>Rôle</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($castingDetail as $cast){?>
				<tr>
				 
				<td style=' width: 50%;
    border-collapse: collapse'><?= $cast["Acteur"]?></td>
				<td style=' width: 50%;
    border-collapse: collapse'> </td>
		<td> </td>
				<td style=' width: 50%;
    border-collapse: collapse'><?= $cast["Role"]?></td>
			</tr>
			

			<?php }?>

		
		</tbody>
	 </table>
	 








<?php

$titre = "Détail du Film";
$titre_Secondaire ="Détail du Film";
$contenu = ob_get_clean();

require"view/template.php";