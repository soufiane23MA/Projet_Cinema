<?php

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


}