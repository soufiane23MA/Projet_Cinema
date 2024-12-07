<?php
/**
 * index.php, agit comme un point d'entrée central pour gérer les actions ou les requêtes transmises via l'URL.
 * index.php est souvent utilisé comme le fichier principal qui reçoit toutes les requêtes HTTP.
 * Ce fichier analyse les paramètres transmises dans l'URL pour déterminer quelle action effectuer ou quel contenu afficher.
 * Les données envoyées dans une URL sont accessibles via la superglobale $_GET en PHP.
 */
/**
 * Cette portion de code implique deux concepts importants :
 *  l'utilisation des namespaces et l'autoloading des classes en PHP;
 * Les namespaces (espaces de noms) en PHP permettent d'organiser le code et d'éviter les conflits entre classes portant le même nom dans différents fichiers.
 * Ici, on utilise un namespace nommé Controller qui contient une classe appelée CinemaController.
 */
use Controller\CinemaController;
spl_autoload_register(function($class_name){
	include $class_name.'.php';
});
/**
 * L'autoloading est une technique pour charger automatiquement les fichiers contenant les classes nécessaires,
 *  sans avoir à les inclure manuellement avec require ou include.
 * La fonction spl_autoload_register() 
 * permet d'enregistrer une fonction (ou méthode) qui sera appelée automatiquement 
 * chaque fois qu'une classe ou une interface est utilisée mais non encore incluse.
 */
 
 
 $id = isset($_GET["id"]) ? $_GET["id"] : null;
 
$ctrlCinema = new CinemaController();
if(isset($_GET["action"])){
	switch($_GET["action"]){
		case"listFilms" : $ctrlCinema->listFilms();
		break;
		case"listActeurs" : 
		$ctrlCinema->listActeurs();
		break;
		case"listRealisateurs" :
			$ctrlCinema->listRealisateurs();
		break;
		case "listGenres":
			$ctrlCinema ->listGenres();
		break;
		case "detailFilm" :
			$ctrlCinema->detailFilm($id);
		break;
		case "detailActeur" :
			$ctrlCinema->detailActeur($id);
		break;
		case "addFilmFormulaire":
				$ctrlCinema->addFilmFormulaire();
		break ;
		case "addFilm":
			$ctrlCinema->addFilm();
		break;
		 
			
}

}
//$id = (isset($_GET["id]"])) ? $_GET["id"] : null; 
//if(isset ( $_GET (["action"]) )){}
