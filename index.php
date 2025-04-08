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
            margin-left: 5px;
        }

        .note.rouge {
            color: red;
            font-weight: bold;
        }

        .note.orange {
            color: orange;
            font-weight: bold;
        }

        .note.vert {
            color: green;
            font-weight: bold;
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
            <input type="text" name="location" placeholder="Ville">
            <button type="submit">Rechercher</button>
        </div>
        <div class="form-note">Service entre particuliers</div>
    </form>

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

        <div class="annonce">
            <div class="heure">
                <span>Vendredi à 9h50</span>
                <span><strong>Toulouse</strong></span>
            </div>
            <div class="nom-note">Francis <span class="note">3/5</span></div>
            <div class="service-category">Services véhicules - Cherche Lavage auto</div>
            <div class="description">"Bonjour, Je cherche une entreprise pour le nettoyage de mon véhicule intérieur extérieur à domicile svp"</div>
        </div>

        <div class="annonce">
            <div class="heure">
                <span>Jeudi à 15h50</span>
                <span><strong>Bidart</strong></span>
            </div>
            <div class="nom-note">Patxi <span class="note">1/5</span></div>
            <div class="service-category">Services véhicules - Cherche Lavage auto</div>
            <div class="description">"Bonjour, Je cherche une entreprise pour le nettoyage de mon véhicule intérieur extérieur à domicile svp"</div>
        </div>

        <div class="annonce">
            <div class="heure">
                <span>Mardi à 13h51</span>
                <span><strong>Lyon</strong></span>
            </div>
            <div class="nom-note">Victoire <span class="note">5/5</span></div>
            <div class="service-category">Animaux - Cherche Garde chien</div>
            <div class="description">"Bonjour, Je n'ai pas noté les personnes ayant répondu à une possibilité de garde de chiens. Recherche pour une semaine en Mai"</div>
        </div>

    </div>
</div>

<script>
    document.querySelectorAll('.note').forEach(note => {
        const match = note.textContent.trim().match(/^(\d)(?:\/5)?$/);
        if (match) {
            const valeur = parseInt(match[1]);
            if (valeur <= 2) {
                note.classList.add('rouge');
            } else if (valeur === 3) {
                note.classList.add('orange');
            } else if (valeur >= 4) {
                note.classList.add('vert');
            }
        }
    });
</script>

</body>
</html>