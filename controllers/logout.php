<?php
session_start();

// Supprime toutes les variables de session
$_SESSION = [];

// Détruit la session
session_destroy();

// Nettoie les cookies éventuels liés à la session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirection vers la page de connexion
header("Location: ../login.php");
exit;
?>
