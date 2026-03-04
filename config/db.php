<?php
// Informations de connexion à la base de données
$host = 'localhost';  // L'adresse du serveur MySQL (en général 'localhost')
$dbname = 'osg_osseboa_db';  // Nom de la base de données (remplacez avec le vrai nom de votre base de données)
$username = 'osg';  // Le nom d'utilisateur pour se connecter à la base de données (par exemple 'root' pour une installation locale)
$password = 'Wd?qnsDte(o;CWCh';  // Le mot de passe de votre base de données (laisser vide si aucun mot de passe pour 'root' local)

// Connexion à la base de données via PDO
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurer le mode d'erreur de PDO pour afficher les exceptions en cas d'erreur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur, afficher un message d'erreur et stopper le script
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
