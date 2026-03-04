<?php
/**
 * ===========================================================
 *  Fichier : config.php
 *  Description : Connexion sécurisée à la base de données HETEC
 *  Auteur : MS Solutions Lab / HETEC Burkina Faso
 *  ===========================================================
 */

// Informations de connexion à la base de données
$host = "localhost";        // ou ton IP (ex : 127.0.0.1)
$dbname = "osg_osseboa_db";       // nom de ta base de données
$username = "osg";         // utilisateur MySQL
$password = "Wd?qnsDte(o;CWCh";             // mot de passe MySQL (souvent vide sous XAMPP/WAMP)

try {
    // Connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Mode d’erreur : exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mode de récupération : tableau associatif
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // (Optionnel) Mode persistant pour de meilleures performances
    // $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

} catch (PDOException $e) {
    // En cas d’erreur, message clair sans exposer le mot de passe
    die("<h3 style='color:red;'>Erreur de connexion : </h3>" . $e->getMessage());
}
?>
