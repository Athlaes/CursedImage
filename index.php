<?php 

define('DB_SERVER', 'localhost');	// serveur MySql
define('DB_DATABASE', 'plaisir');		// nom de la base de données
define('DB_USER', 'root');			// nom d'utilisateur
define('DB_PWD', '');              	// mot de passe
define('DSN','mysql:dbname='.DB_DATABASE.';host='.DB_SERVER);
// encodage
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''); 
// Crée une instance (un objet) PDO qui représente une connexion à la b
$monPdo = new PDO(DSN,DB_USER,DB_PWD, $options);
// configure l'attribut ATTR_ERRMODE pour définir le mode de rapport d'erreurs 
// PDO::ERRMODE_EXCEPTION: émet une exception 
$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// configure l'attribut ATTR_DEFAULT_FETCH_MODE pour définir le mode de récupération par défaut 
// PDO::FETCH_OBJ: retourne un objet anonyme avec les noms de propriétés 
//     qui correspondent aux noms des colonnes retournés dans le jeu de résultats
$monPdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$requete = $monPdo->prepare('INSERT into image (idImage, data) Values (1, "CACA")');
// $requete->execute();

$files = scandir("E:\plaisir");
$index = rand(2, count($files));


$path = "E:\plaisir\\".$files[$index];
$data = 'data:image/png;base64,'.base64_encode(file_get_contents($path));
echo '<img src="'.$data.'">';


foreach($files as $file){
    if (strlen($file) > 3) {
        $path = "E:\plaisir\\".$file;
        $data = 'data:image/png;base64,'.base64_encode(file_get_contents($path));
        echo '<img src="'.$data.'">';
    }
}
?>