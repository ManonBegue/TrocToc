<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST['service'] ?? '';
    $location = $_POST['location'] ?? '';
    echo "<p>Vous avez recherché le service : <strong>" . htmlspecialchars($service) . "</strong> à <strong>" . htmlspecialchars($location) . "</strong></p>";
}

$villes = ["Lyon", "Marseille", "Toulouse", "Bordeaux", "Lille", "Nice", "Nantes", "Strasbourg", "Grenoble", "Rennes","Bidart"];

function villeAleatoire($villes) {
    return $villes[array_rand($villes)];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrocToc</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #ffffff;
            position: relative;
            border-bottom: 1px solid #ddd;
        }

        .logo {
            height: 60px;
        }

        .header-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 2em;
            font-weight: bold;
            color: #333;
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .header-buttons button {
            padding: 8px 15px;
            font-size: 14px;
            cursor: pointer;
        }

        .container {
            width: 60%;
            margin: auto;
            padding: 40px 20px;
        }

        .form-row {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            align-items: center;
        }

        select, input, button[type="submit"] {
            padding: 10px;
            font-size: 14px;
        }

        select, input {
            flex: 1;
        }

        button[type="submit"] {
            white-space: nowrap;
        }

        .form-note {
            margin-top: 10px;
            display: inline-block;
            border: 2px solid #000;
            padding: 8px 16px;
            font-weight: bold;
            color: #000;
            background-color: #fff;
            width: 33.3%;
            text-align: center;
        }

        .annonces {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .annonce {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            background-color: #f9f9f9;
            box-shadow: 1px 1px 6px rgba(0,0,0,0.1);
        }

        .heure {
            font-size: 0.9em;
            color: #888;
            margin-bottom: 5px;
        }

        .nom-note {
            font-weight: bold;
            font-size: 1.1em;
            margin-bottom: 5px;
        }

        .note {
            font-weight: normal;
            color: #009900;
            margin-left: 5px;
        }

        .titre {
            font-size: 1em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .description {
            font-style: italic;
            color: #444;
        }

        .ville {
            margin-top: 10px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="pictures/logo.png" alt="Logo TrocToc" class="logo">
    <div class="header-title">TrocToc</div>
    <div class="header-buttons">
        <button onclick="location.href='inscription.php'">S'inscrire</button>
        <button onclick="location.href='connexion.php'">Se connecter</button>
    </div>
</div>

<div class="container">
    <form method="POST">
        <div class="form-row">
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
        </div>
        <div class="form-note">Service entre particuliers</div>
    </form>

    <div class="annonces">
        <div class="annonce">
            <div class="heure">Aujourd'hui à 10h51</div>
            <div class="nom-note">Sylviane <span class="note">5/5</span></div>
            <div class="titre">Cherche Garde chien à Albi</div>
            <div class="description">"Bonjour, Je n'ai pas noté les personnes ayant répondu à une possibilité de garde de chiens. Recherche pour une semaine en Mai"</div>
            <div class="ville">Ville :<strong>Bidart</strong></div>
        </div>

        <div class="annonce">
            <div class="heure">Aujourd'hui à 10h50</div>
            <div class="nom-note">Delphine <span class="note">5/5</span></div>
            <div class="titre">Cherche Lavage auto à Saint-Raphaël</div>
            <div class="description">"Bonjour, Je cherche une entreprise pour le nettoyage de mon véhicule interieur exterieur à domicile svp"</div>
            <div class="ville">Ville :<strong>Toulouse</strong></div>
        </div>
    </div>
</div>

</body>
</html>
