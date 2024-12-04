<?php

 /**
	* * Cela indique que la classe Connect, 
 * utilisée pour se connecter à la base de données, est définie dans le namespace Model.
 * Vous importez cette classe pour pouvoir l’utiliser ici.
 * Ce fichier appartient au namespace Controller,
 *  ce qui signifie quecette classe fait partie de la couche "Contrôleur"
	*/

namespace Controller;

use Model\Connect;

class CinemaController {

	public function listFilms(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query("SELECT id_Filme,titre,annee_Sortie FROM film
		ORDER BY annee_Sortie DESC");
		$films = $requete->fetchAll();
			require "view/listFilms.php";
	}

	public function listActeurs(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query( " SELECT  p.id_Personne,nom_Personne, prenom_Personne,DATE_FORMAT(p.date_Naissance, '%d/%m/%Y') AS date_Naissance, date_Naissance, sex_Personne FROM personne p
		INNER JOIN Acteur a ON a.id_Personne = p.id_Personne
		ORDER BY nom_Personne ASC");
		 $acteurs = $requete->fetchAll();
			require "view/listActeurs.php";
			 

			}

	public function listRealisateurs(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query("SELECT p.id_Personne, nom_Personne, prenom_Personne, 
    DATE_FORMAT(p.date_Naissance, '%d/%m/%Y') AS date_Naissance, sex_Personne  
    FROM personne p
    INNER JOIN realisateur r ON r.id_Personne = p.id_Personne
		ORDER BY nom_Personne ASC  ");
		 $realisateurs = $requete->fetchAll();
			require "view/listRealisateurs.php";
			 
	}

	public function listGenres(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query("SELECT  id_Genre, libelle FROM genre 
		ORDER BY  libelle ASC");
		 $genres = $requete->fetchAll();
			require "view/listGenres.php";
	}
	public function detailFilm($id){
		$pdo = connect::seConnecter();//  
		// infos du film
		$requete = $pdo->prepare("SELECT titre,annee_Sortie,note,synopsis,
		CONCAT(p.nom_Personne,' ',p.prenom_Personne) AS 'Realisateur'FROM film f 
		INNER JOIN realisateur r ON f.id_Realisateur=r.id_Realisateur
		INNER JOIN personne p ON r.id_Personne = p.id_Personne 
		WHERE id_Filme =:id");
		$requete->execute(["id" => $id]);
		$film = $requete->fetch();

		// 2e requete : casting du film
		$casting = $pdo->prepare("SELECT CONCAT(p.nom_Personne ,' ', p.prenom_Personne) AS 'Acteur', nom_Role AS 'Role' 
				FROM personne p
				INNER JOIN acteur a ON a.id_Personne = p.id_Personne
				INNER JOIN jouer j ON j.id_Acteur= a.id_Acteur
				INNER JOIN role r ON r.id_Role = j.id_Role
				WHERE j.id_Filme = :id");
				$casting -> execute (["id"=> $id]);
				$castingDetail = $casting -> fetchAll();

		require "view/detailFilm.php";
	}
	public function detailActeur($id){
		$pdo = connect::seConnecter();
		// info Acteur
		$requete = $pdo->prepare(" SELECT p.nom_Personne,p.prenom_Personne,
		DATE_FORMAT(p.date_Naissance, '%d/%m/%Y') AS date_Naissance,sex_Personne 
		FROM personne p
 INNER JOIN acteur a ON p.id_Personne = a.id_Personne
 WHERE a.id_Acteur = :id");
 $requete->execute(["id" => $id]);
 $acteur= $requete->fetch();
 
 //2e requette

 $castingDetail = $pdo->prepare("SELECT titre,annee_Sortie,nom_Role FROM film f
INNER JOIN jouer j ON j.id_Filme=f.id_Filme
INNER JOIN role r ON r.id_Role = j.id_Role
WHERE j.id_Acteur = :id");
$castingDetail ->execute(["id"=>$id]);
$castingActeurDetail = $castingDetail->fetchAll();
require "view/detailActeur.php";

	}



}