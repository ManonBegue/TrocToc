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

        .container {
            width: 60%;
            margin: auto;
            padding: 40px 20px;
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
            position: relative;
        }

        .heure {
            font-size: 0.9em;
            color: #888;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }

        .nom-note {
            font-weight: bold;
            font-size: 1.1em;
        }

        .note {
            font-weight: normal;
            color: #009900;
            margin-left: 5px;
        }

        .service-category {
            font-size: 0.9em;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
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
    <div class="annonces">
        <div class="annonce">
            <div class="heure">
                <span>Aujourd'hui à 10h51</span>
                <span><strong>Bidart</strong></span>
            </div>
            <div class="nom-note">Sylviane <span class="note">5/5</span></div>
            <div class="service-category">Animaux - Cherche Garde chien</div>
            <div class="description">"Bonjour, Je n'ai pas noté les personnes ayant répondu à une possibilité de garde de chiens. Recherche pour une semaine en Mai"</div>
        </div>

        <div class="annonce">
            <div class="heure">
                <span>Aujourd'hui à 10h50</span>
                <span><strong>Toulouse</strong></span>
            </div>
            <div class="nom-note">Delphine <span class="note">5/5</span></div>
            <div class="service-category">Services véhicules - Cherche Lavage auto</div>
            <div class="description">"Bonjour, Je cherche une entreprise pour le nettoyage de mon véhicule intérieur extérieur à domicile svp"</div>
        </div>
    </div>
</div>

</body>
</html>
