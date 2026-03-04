<?php
session_start();

if (isset($_SESSION['user_id'])) {
    echo json_encode([
        "connecte" => true,
        "nom" => $_SESSION['nom'],
        "role" => $_SESSION['role']
    ]);
} else {
    echo json_encode(["connecte" => false]);
}
?>
