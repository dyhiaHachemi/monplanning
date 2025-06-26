<?php

// vérifie que la page a été appelée via une requête POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // récupère les données envoyées par enregistrer_realisation_tache.js
    $id_tache = (int)$_POST['id_tache'];
    $type_tache = $_POST['type_tache'];
    $date = date('Y-m-d');
    
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "planning_db");

    if ($conn->connect_error) {
        die("Erreur de connexion: " . $conn->connect_error);
    }
    // Vérifie si la tâche a déjà été cochée aujourd’hui
    $stmt = $conn->prepare("SELECT id_tache_realisee FROM tache_realisee WHERE id_tache = ? AND type_tache = ? AND date_realisation = ?");
    // verifier s'il y a erreur dasn la requette
    if (!$stmt) {
        die("Erreur de préparation SQL : " . $conn->error);
    }
    $stmt->bind_param("iss", $id_tache, $type_tache, $date);
    $stmt->execute();
    $stmt->store_result();
    
    // si la tâche n’a pas encore été cochée aujourd’hui: on peut l'enregistrer.
    if ($stmt->num_rows === 0) {
        // fermer l’ancien statement
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO tache_realisee (id_tache, type_tache, date_realisation, accomplie) VALUES (?, ?, ?, TRUE)");
        $stmt->bind_param("iss", $id_tache, $type_tache, $date);
        
        if ($stmt->execute()) {
            echo "Tâche realisée pour aujourd'hui.";
        } else {
            echo " Erreur SQL : " . $stmt->error;
        }
    } else {
        echo "Tâche déjà cochée aujourd'hui.";
    }


    $stmt->close();
    $conn->close();
}
?>
