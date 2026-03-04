<?php
session_start();
require_once 'models/config.php'; // ✅ ton fichier PDO déjà correct

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.']);
    exit;
}

$matricule = isset($_POST['matricule']) ? trim($_POST['matricule']) : '';
$mot_de_passe = isset($_POST['mot_de_passe']) ? trim($_POST['mot_de_passe']) : '';

if ($matricule === '' || $mot_de_passe === '') {
    echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir tous les champs.']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM inscriptions WHERE matricule_etudiant = :matricule LIMIT 1");
    $stmt->execute(['matricule' => $matricule]);
    $etudiant = $stmt->fetch();

    if (!$etudiant) {
        echo json_encode(['status' => 'error', 'message' => 'Matricule ou mot de passe incorrect.']);
        exit;
    }

    // Comparaison en clair (sans hash)
    if ($mot_de_passe === trim($etudiant['mot_de_passe'])) {
        $_SESSION['id_etudiant'] = $etudiant['id_inscription'];
        $_SESSION['nom_etudiant'] = $etudiant['nom_etudiant'] . ' ' . $etudiant['prenom_etudiant'];
        $_SESSION['matricule'] = $etudiant['matricule_etudiant'];

        echo json_encode(['status' => 'success', 'message' => 'Connexion réussie.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Matricule ou mot de passe incorrect.']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erreur serveur : ' . $e->getMessage()]);
}
