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
		$requete = $pdo->query("SELECT id_film,titre,annee_sortie FROM film
		ORDER BY annee_sortie DESC");
		$films = $requete->fetchAll();
			require "view/listFilms.php";
	}

	public function listActeurs(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query( " SELECT  p.id_personne,nom_personne, prenom_personne,DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance, sex_personne FROM personne p
		INNER JOIN Acteur a ON a.id_personne = p.id_personne
		ORDER BY nom_personne ASC");
		 $acteurs = $requete->fetchAll();
			require "view/listActeurs.php";
			 

			}

	public function listRealisateurs(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query("SELECT p.id_personne, nom_personne, prenom_personne, 
    DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance, sex_personne  
    FROM personne p
    INNER JOIN realisateur r ON r.id_personne = p.id_personne
		ORDER BY nom_personne ASC  ");
		 $realisateurs = $requete->fetchAll();
			require "view/listRealisateurs.php";
			 
	}

	public function listGenres(){
		$pdo = Connect::seConnecter();
		$requete = $pdo->query("SELECT  id_genre, libelle FROM genre 
		ORDER BY  libelle ASC");
		 $genres = $requete->fetchAll();
			require "view/listGenres.php";
	}
	public function detailFilm($id){
		$pdo = connect::seConnecter();//  
		// infos du film
		$requete = $pdo->prepare("SELECT titre,annee_sortie,note,synopsis,
		CONCAT(p.nom_personne,' ',p.prenom_personne) AS 'Realisateur'FROM film f 
		INNER JOIN realisateur r ON f.id_realisateur=r.id_realisateur
		INNER JOIN personne p ON r.id_personne = p.id_personne 
		WHERE id_film =:id");
		$requete->execute(["id" => $id]);
		$film = $requete->fetch();

		// 2e requete : casting du film
		$casting = $pdo->prepare("SELECT CONCAT(p.nom_personne ,' ', p.prenom_personne) AS 'Acteur', nom_role AS 'Role' 
				FROM personne p
				INNER JOIN acteur a ON a.id_personne = p.id_personne
				INNER JOIN jouer j ON j.id_acteur= a.id_acteur
				INNER JOIN role r ON r.id_role = j.id_role
				WHERE j.id_film = :id");
				$casting -> execute (["id"=> $id]);
				$castingDetail = $casting -> fetchAll();

		require "view/detailFilm.php";
	}
	public function detailActeur($id){
		$pdo = connect::seConnecter();
		// info Acteur
		$requete = $pdo->prepare(" SELECT p.nom_personne,p.prenom_personne,
		DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance,sex_personne 
		FROM personne p
 INNER JOIN acteur a ON p.id_personne = a.id_personne
 WHERE a.id_acteur = :id");
 $requete->execute(["id" => $id]);
 $acteur= $requete->fetch();
 
 //2e requette

 $castingDetail = $pdo->prepare("SELECT titre,annee_sortie,nom_role FROM film f
INNER JOIN jouer j ON j.id_film=f.id_film
INNER JOIN role r ON r.id_role = j.id_role
WHERE j.id_acteur = :id");
$castingDetail ->execute(["id"=>$id]);
$castingActeurDetail = $castingDetail->fetchAll();
require "view/detailActeur.php";

	}/**
	 *  
	 *mettre en place de la fonction pour rajouterun formulaire 
	 *pour rajouter un filme ou un acteur
	 *  
	 */
	public function addFilmFormulaire(){
		require "view/addFilmFormulaire.php";
	}
	/**
	 * 
	 * fonction qui permet de rajouter un film,
	 * @return void
	 */
	public function addFilm(){
		// verification du data contenu dans $_POST,
		//filtrer l'input pour sécuriser le contenu.

		if($_POST['submit']){
			  $film = filter_input( INPUT_POST, "titreFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$film = $_POST['titreFilm'];
	

			 $pdo = connect::seConnecter();
			 $addFilm = $pdo->prepare("INSERT INTO film  (titre) Values (:name)");
		 	$addFilm->execute(["name"=> $film]);

		
		 };
		
 }
			
		
}
	
 





