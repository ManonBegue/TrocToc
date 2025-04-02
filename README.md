<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST['service'] ?? '';
    $location = $_POST['location'] ?? '';
    
    echo "<p>Vous avez recherché le service : <strong>$service</strong> à <strong>$location</strong></p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrocToc</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 50%; margin: auto; padding: 20px; }
        select, input, button { margin: 10px; padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>TrocToc</h1>
        <form method="POST">
            <select name="service">
                <option value="">Demande de services :</option>
                <option value="Bricolage-Travaux">Bricolage-Travaux</option>
                <option value="Jardinage-Piscine">Jardinage-Piscine</option>
                <option value="Déménagement-Manu">Déménagement-Manu</option>
                <option value="Dépannage-Réparation">Dépannage-Réparation</option>
                <option value="Entretien-Réparation">Entretien-Réparation</option>
                <option value="Services véhicules">Services véhicules</option>
                <option value="Services à la personne">Services à la personne</option>
                <option value="Enfants">Enfants</option>
                <option value="Animaux">Animaux</option>
                <option value="Courses">Courses</option>
            </select>
            <input type="text" name="location" placeholder="Ville ou CP">
            <button type="submit">Rechercher</button>
        </form>
        <br>
        <button onclick="location.href='inscription.php'">S'inscrire</button>
        <button onclick="location.href='connexion.php'">Se connecter</button>
    </div>
</body>
</html>
