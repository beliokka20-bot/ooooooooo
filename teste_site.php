<?php

// Test connexion base de données
$conn = mysqli_connect("localhost","root","","sitecenter");

if(!$conn){
    die("❌ Erreur de connexion : " . mysqli_connect_error());
}

echo "✅ Connexion réussie à la base de données <br><br>";

// Test requête simple
$result = mysqli_query($conn,"SELECT * FROM rendezvous");

if(mysqli_num_rows($result) > 0){

    echo "<h3>Liste des rendez-vous :</h3>";

    while($row = mysqli_fetch_assoc($result)){
        echo "Nom : ".$row['name']."<br>";
        echo "Email : ".$row['email']."<br>";
        echo "Téléphone : ".$row['tel']."<br>";
        echo "Message : ".$row['message']."<hr>";
    }

}else{
    echo "⚠ Aucun rendez-vous trouvé.";
}

?>