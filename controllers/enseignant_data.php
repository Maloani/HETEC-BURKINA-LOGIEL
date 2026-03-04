<?php
session_start();
require_once '../config/db.php';

// --- Réponse JSON UTF-8 ---
header('Content-Type: application/json; charset=utf-8');

// --- Vérification de la session ---
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'enseignant') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Non autorisé ou session expirée'
    ]);
    exit;
}

$id_enseignant = $_SESSION['user_id'];

try {
    // === 1️⃣ Informations de l’enseignant connecté ===
    $stmt = $db->prepare("
        SELECT 
            id_enseignant,
            nom_complet, 
            mail_enseignant AS email, 
            telephone, 
            sexe,
            niveau_etude,
            date_creation
        FROM enseignants 
        WHERE id_enseignant = ?
        LIMIT 1
    ");
    $stmt->execute([$id_enseignant]);
    $enseignant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$enseignant) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Enseignant introuvable'
        ]);
        exit;
    }

    // === 2️⃣ Récupération des cours avec UE, CM, P, TPE ===
    $query = $db->prepare("
        SELECT 
            c.id_cours,
            c.designation_cours, 
            c.code_cours, 
            c.credits,
            c.CM, 
            c.P, 
            c.TPE,
            u.id_ue,
            u.code_ue,
            u.intitule_ue,
            o.designation_option, 
            f.designation_filiere, 
            c.annee_academique
        FROM cours c
        LEFT JOIN ues u ON c.id_ue = u.id_ue
        LEFT JOIN options o ON c.id_option = o.id_option
        LEFT JOIN filieres f ON o.id_filiere = f.id_filiere
        WHERE c.id_enseignant = ?
        ORDER BY c.annee_academique DESC, u.intitule_ue ASC
    ");
    $query->execute([$id_enseignant]);
    $courses = $query->fetchAll(PDO::FETCH_ASSOC);

    // === 3️⃣ Réponse JSON complète ===
    echo json_encode([
        'status' => 'success',
        'enseignant' => [
            'id_enseignant' => $enseignant['id_enseignant'],
            'nom_complet' => $enseignant['nom_complet'],
            'email' => $enseignant['email'] ?? 'Non renseigné',
            'telephone' => $enseignant['telephone'] ?? '—',
            'sexe' => $enseignant['sexe'] ?? '—',
            'niveau_etude' => $enseignant['niveau_etude'] ?? '—',
            'date_creation' => $enseignant['date_creation'] ?? null
        ],
        'courses' => $courses
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erreur SQL : ' . $e->getMessage()
    ]);
    exit;
}
?>
