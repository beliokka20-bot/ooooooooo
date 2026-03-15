<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name == "" || $email == "" || $tel == "") {
        die("❌ Veuillez remplir tous les champs obligatoires.");
    }

    $stmt = $conn->prepare("INSERT INTO rendezvous (name, email, tel, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $tel, $message);

    if ($stmt->execute()) {
        echo "✅ Rendez-vous enregistré avec succès !";
    } else {
        echo "❌ Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "❌ Accès invalide.";
}
?>