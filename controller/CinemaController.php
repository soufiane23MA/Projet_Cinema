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
		CONCAT(p.nom_personne,' ',p.prenom_personne) AS 'realisateur'FROM film f 
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

}
/**
*  
*mettre en place de la fonction pour rajouterun formulaire 
*pour rajouter un filme ou un acteur
*  
*/
public function addFilmFormulaire(){

// demander à la couche modele la liste des realisateurs pour l'afficher dans un select dans le form
// meme chose les genres (ne pas oublier qu'il peut en avoir plusieurs)

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

if($_POST["submit"]){
	$film = filter_input( INPUT_POST, "titreFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$film = $_POST['titreFilm'];
	$synopsis = filter_input(INPUT_POST,"synopsis",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$synopsis = $_POST["synopsis"];
	$note = filter_input(INPUT_POST,"note",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$note = $_POST["note"];
	$anneesortie = $_POST["annee_sortie"];
	$anneesortie = filter_input(INPUT_POST,"annee_sortie",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$dureeFilm = $_POST["duree_film"];
	$dureeFilm = filter_input(INPUT_POST,"duree_film",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$realisateur = $_POST["id_realisateur"];
	$realisateur = filter_input(INPUT_POST,"id_realisateur",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
	$pdo = connect::seConnecter();

	/**
	 * attention il faut rajouter tous les input dans la même fonction du rajout du film
	 * il faut verifier que la requête fonctionne dans la base de donnéés avant  de l'appliquer pour
	 * l'affichage.
	 */
		
	$addFilm = $pdo->prepare("INSERT INTO film  (titre,synopsis,note,annee_sortie,duree_film,id_realisateur) Values
		(:name,:synopsis,:note,:annee_sortie,:duree_film,:id_realisateur)");
	$addFilm->execute(["name"=> $film,"synopsis"=> $synopsis,"note"=>$note,"annee_sortie"=>$anneesortie,"duree_film"=>$dureeFilm,"id_realisateur"=>$realisateur]);
	

	};
		
 } 

/*public function addGenre()
{
if ($_POST["submit"]){ 
$genre = filter_input(INPUT_POST,"libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$genre = $_POST["libelle"];

$pdo = connect::seConnecter();

$addgenre =$pdo->prepare("INSERT INTO genre (libelle) VALUES (:libelle)");
$addgenre ->execute(["libelle"=> $genre]);
var_dump($genre);


}

	  }*/
		/**
		 * fonction pour rajouter un genre de film
		 * @return void
		 */
		public function addGenre() {
	if (isset($_POST['submit'])) {
			// Get the genre name from the form input
			$genre = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			// Connect to the database
			$pdo = Connect::seConnecter();

			// Insert du nouveau genre dans la base de donnée en utilisant (insert into) 
			$addGenre = $pdo->prepare("INSERT INTO genre (libelle) VALUES (:libelle)");
			$addGenre->execute(['libelle' => $genre]);

			// pour informer l'utilisateur que l'action est bien enregistrer ; on peux le rediriger
			//vers la liste des genre, avec ce code 
			//header("Location: index.php?action=listGenres");   
			//exit;
	};
}
	 /**
		* fonction de suppretion d'un genre de film
		* @param mixed $id
		* @return never
		*/
	 public function deleteGenre($id) {
    // Connexion à la base de données
    $pdo = Connect::seConnecter();
    
    // Supprimer le genre de la base de données avec la requête (delete)
    $deleteGenre = $pdo->prepare("DELETE FROM genre WHERE id_genre = :id");
    $deleteGenre->execute(['id' => $id]);
    
    // Rediriger vers la liste des genres après suppression
    header("Location: index.php?action=listGenres");
    exit;
}


	};

		
 
			
		

	
 





