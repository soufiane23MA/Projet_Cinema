<?php
/**
 * on précise le namespace , et on crée la connection avec la base de données .
 */

namespace Model;
/**
 * La classe abstract class Connect   est une classe abstraite et statique, 
 * qui sert à définir des constantes nécessaires pour établir une connexion à une base de données,
 *  mais sans implémenter directement la logique de connexion.
 * Dans ce cas, la classe Connect définit des constantes (HOST, DB, USER, PASS) 
 * qui seront utilisées par d'autres classes.
 * Pourquoi utiliser cette structure ?
 * Réutilisation : D'autres classes ou scripts peuvent utiliser ces constantes
 * pour établir une connexion à la base de données sans avoir à redéfinir les mêmes informations à chaque fois.
 * Centralisation de la configuration : Si tu veux changer le nom de la base de données, l'hôte, ou les identifiants, 
 * tu n'as qu'à le faire une seule fois dans cette classe abstraite.
 * Contrôle : En faisant la classe abstraite, tu t'assures qu'aucune instance de la classe Connect ne peut être créée 
 * (car une classe abstraite ne peut pas être instanciée directement), mais tu peux la faire étendre pour l'utiliser.
 * 
 */
abstract class Connect {
	const HOST = "localhost";
	const DB ="cinemaDb";
	const USER = "root";
	const PASS = "";

 public static function seConnecter() {
	try {
		return new \PDO(
			"mysql:host=".self::HOST.";dbname=".self::DB.";chartset=utf8",self::USER,self::PASS);
	}
	catch(\PDOException $ex){
		return $ex->getMessage();
	}
}
 } ;
