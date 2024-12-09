<?php ob_start();
?>

<h1><?= $acteur["nom_personne"] ?> <?= $acteur["prenom_personne"] ?></h1>
<ul>
	 
	<li>Date de Naissance: <?= $acteur["date_naissance"] ?></li>
	<li>Sex :<?= $acteur["sex_personne"] ?> </li>
	 
</ul>


<p style="font-size: 1.5rem; color: #800C2A; font-weight: bold;">Filmographie</p>
 <table >
		<thead>
			<tr >
			 
				<th >Film</th>
				<th > Annee DE Sortie</th>
				<th >Rôle</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($castingActeurDetail as $cast){?>
				<tr >
				 
				<td ><?= $cast["titre"]?></td>
				<td ><?= $cast["annee_sortie"]?></td>
				<td ><?= $cast["nom_role"]?></td>
			</tr>
			

			<?php }?>

		
		</tbody>
	 </table>
	 

 

		
	 
	 








<?php

$titre = "Acteur";
$titre_Secondaire =" Acteur";
$contenu = ob_get_clean();

require"view/template.php";