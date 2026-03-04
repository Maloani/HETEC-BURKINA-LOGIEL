<?php
ob_start();
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../models/config.php';

/**
 * 🔧 Fonction helper pour envoyer une réponse JSON propre
 */
function sendResponse($status, $message, $extra = []) {
    if (ob_get_length()) ob_clean();
    echo json_encode(array_merge([
        "status" => $status,
        "message" => $message
    ], $extra), JSON_UNESCAPED_UNICODE);
    exit;
}

// ✅ Vérifie que la requête est bien POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    sendResponse("error", "Méthode non autorisée.");
}

// ✅ Récupération et nettoyage des champs
$telephone    = trim($_POST['telephone'] ?? '');
$mot_de_passe = trim($_POST['mot_de_passe'] ?? '');

if ($telephone === '' || $mot_de_passe === '') {
    sendResponse("error", "Veuillez remplir tous les champs.");
}

try {
    // 🔍 Fonction utilitaire de vérification (évite la répétition)
    function verifierUtilisateur($pdo, $table, $champId, $role, $telephone, $mot_de_passe) {
        $sql = "SELECT $champId AS id, nom_complet, mot_de_passe 
                FROM $table 
                WHERE telephone = ? AND statut = 'actif' LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$telephone]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // ⚙️ Vérifie mot de passe (hashé ou en clair selon base)
            if (password_verify($mot_de_passe, $user['mot_de_passe']) || $mot_de_passe === $user['mot_de_passe']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nom'] = $user['nom_complet'];
                $_SESSION['role'] = $role;
                return true;
            } else {
                sendResponse("error", "Mot de passe incorrect pour $role.");
            }
        }
        return false;
    }

    // ✅ Vérification administrateur
    if (verifierUtilisateur($pdo, "administrateurs", "id_admin", "admin", $telephone, $mot_de_passe)) {
        sendResponse("success", "Connexion réussie (Administrateur)", ["role" => "admin"]);
    }

    // ✅ Vérification enseignant
    if (verifierUtilisateur($pdo, "enseignants", "id_enseignant", "enseignant", $telephone, $mot_de_passe)) {
        sendResponse("success", "Connexion réussie (Enseignant)", ["role" => "enseignant"]);
    }

    // 🚫 Aucun utilisateur trouvé
    sendResponse("error", "Aucun compte trouvé avec ce numéro de téléphone.");

} catch (PDOException $e) {
    sendResponse("error", "Erreur SQL : " . $e->getMessage());
} catch (Exception $ex) {
    sendResponse("error", "Erreur interne : " . $ex->getMessage());
}
?>
