<?php ob_start();
?>

<h1><?= $acteur["nom_personne"] ?> <?= $acteur["prenom_personne"] ?></h1>
<ul>
	 
	<li>Date de Naissance: <?= $acteur["date_naissance"] ?></li>
	<li>Sex :<?= $acteur["sex_personne"] ?> </li>
	 
</ul>


<p style="font-size: 1.5rem; color: #800C2A; font-weight: bold;">Filmographie</p>
 <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
		<thead style="background-color: #800C2A; color: #fff; text-align: left;">
			<tr style ='width: 50%;
    border-collapse: collapse'>
			 
				<th style="padding: 10px; font-size: 1.1rem;">Film</th>
				<th style="padding: 10px; font-size: 1.1rem;"> Annee DE Sortie</th>
				<th style="padding: 10px; font-size: 1.1rem;">Rôle</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($castingActeurDetail as $cast){?>
				<tr style="border-bottom: 1px solid #ddd; text-align: left;">
				 
				<td style="padding: 10px; font-size: 1.1rem;"><?= $cast["titre"]?></td>
				<td style="padding: 10px; font-size: 1.1rem;"><?= $cast["annee_sortie"]?></td>
				<td style="padding: 10px; font-size: 1.1rem;"><?= $cast["nom_role"]?></td>
			</tr>
			

			<?php }?>

		
		</tbody>
	 </table>
	 

 

		
	 
	 








<?php

$titre = "Acteur";
$titre_Secondaire =" Acteur";
$contenu = ob_get_clean();

require"view/template.php";