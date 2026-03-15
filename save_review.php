<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['name'] ?? '');
    $stars = intval($_POST['stars'] ?? 0);
    $comment = trim($_POST['comment'] ?? '');

    if ($name == "" || $stars == 0) {
        die("❌ Nom et étoiles obligatoires.");
    }

    $stmt = $conn->prepare("INSERT INTO avis (name, stars, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $stars, $comment);

    if ($stmt->execute()) {
        echo "⭐ Avis envoyé avec succès !";
    } else {
        echo "❌ Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "❌ Accès invalide.";
}
?>