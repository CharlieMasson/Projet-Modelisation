<?php
#Fonction à appeler pour se connecter à la base de données
function connexionBdd() {
    /**
     * @var $server
     * @var $dbName
     * @var $user
     * @var $pass
     */
// Permet d'utiliser les variables d'identification pour la connexion
require('Config.php');

// Tentative de connexion à la base de données MySQL
try{
// chaine de connexion avec API PDO
$co = new PDO("mysql:host=" . $server ."; charset=utf8; dbname=" . $dbName, $user, $pass);
//On définit le mode d'erreur de PDO sur Exception
$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
// En cas de problème dans la tentative connexion on termine le script php et on affichera le message d'erreur
catch(PDOException $e){
die('Erreur : ' . $e->getMessage());
}
return $co;
}

function deconnexion(){
	$var = NULL;
	return $var;
}
	
