<?php 
// Connexion à la base de données
$host = 'localhost';
$db = 'troctoc';
$user = 'root';
$pass = ''; // Mets ton mot de passe ici si besoin

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$annonces = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST['service'] ?? '';
    $location = $_POST['location'] ?? '';

    echo "<p>Vous avez recherché le service : <strong>" . htmlspecialchars($service) . "</strong> à <strong>" . htmlspecialchars($location) . "</strong></p>";

    $query = "
        SELECT a.description, u.prenom, l.ville, s.nom_service, a.date_creation
        FROM annonces a
        JOIN utilisateurs u ON a.utilisateur_id = u.id
        JOIN localisations l ON a.localisation_id = l.id
        JOIN services s ON a.service_id = s.id
        WHERE s.nom_service LIKE :service AND l.ville LIKE :ville
        ORDER BY a.date_creation DESC
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':service' => "%$service%",
        ':ville' => "%$location%"
    ]);
    $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TrocToc</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { display: flex; align-items: center; justify-content: space-between; padding: 10px 20px; background-color: #ffffff; position: relative; border-bottom: 1px solid #ddd; }
        .logo { height: 60px; }
        .header-title { position: absolute; left: 50%; transform: translateX(-50%); font-size: 2em; font-weight: bold; color: #333; }
        .header-buttons { display: flex; gap: 10px; }
        .header-buttons button { padding: 8px 15px; font-size: 14px; cursor: pointer; }
        .container { width: 60%; margin: auto; padding: 40px 20px; }
        .form-row { display: flex; gap: 10px; justify-content: flex-start; align-items: center; }
        select, input, button[type="submit"] { padding: 10px; font-size: 14px; }
        select, input { flex: 1; }
        button[type="submit"] { white-space: nowrap; }
        .form-note { margin-top: 10px; display: inline-block; border: 2px solid #000; padding: 8px 16px; font-weight: bold; color: #000; background-color: #fff; width: 33.3%; text-align: center; }
        .annonces { margin-top: 30px; display: flex; flex-direction: column; gap: 20px; }
        .annonce { border: 1px solid #ccc; border-radius: 10px; padding: 15px; background-color: #f9f9f9; box-shadow: 1px 1px 6px rgba(0,0,0,0.1); }
        .heure { font-size: 0.9em; color: #888; margin-bottom: 5px; }
        .service-category { font-size: 1em; font-weight: bold; margin-bottom: 5px; }
        .description { font-style: italic; color: #444; }
    </style>
</head>
<body>

<div class="header">
    <img src="pictures/logo.png" alt="Logo TrocToc" class="logo">
    <div class="header-title">TrocToc</div>
    <div class="header-buttons">
        <a href="inscription.php">
            <button>S'inscrire</button>
        </a>
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
                <option value="Déménagement">Déménagement</option>
                <option value="Dépannage">Dépannage</option>
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
        <?php if (!empty($annonces)): ?>
            <?php foreach ($annonces as $annonce): ?>
                <div class="annonce">
                    <div class="heure">
                        <span><?php echo date("d/m/Y H:i", strtotime($annonce['date_creation'])); ?></span>
                        <span><strong><?php echo htmlspecialchars($annonce['ville']); ?></strong></span>
                    </div>
                    <div class="nom-note"><?php echo htmlspecialchars($annonce['prenom']); ?></div>
                    <div class="service-category"><?php echo htmlspecialchars($annonce['nom_service']); ?></div>
                    <div class="description"><?php echo htmlspecialchars($annonce['description']); ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune annonce trouvée.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
