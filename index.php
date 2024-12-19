<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');
$request = $bdd-> prepare( ' SELECT  * from fiche_film ');
$request -> execute([]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php  include("nav.php");?>
    <h1>Récupération de la requéte</h1>
    <section>
    <?php while($data = $request -> fetch()): ?>
    <article>
        <h3>La Fiche Technique de Film</h3>
        <p><img src="ASSETS/img/<?php echo $data['image']; ?>" alt="Image" style='width:200px;' ></p>
        <p>Titre : <?php echo $data['titre']; ?></p>
        <?php  
            $duree = $data['duree'];
            $heures = intdiv($duree, 60);
            $min = $duree % 60;
        ?>
        <p>Durée : <?php echo $heures . "H" . $min . "min"; ?></p>
        <p>Date : <?php echo $data['date']; ?></p>
        <a href="voir_plus.php?id=<?php echo $data['id']; ?>">Voir plus</a>

        <!-- Afficher Modifier/Supprimer uniquement si l'utilisateur connecté est le créateur -->
        <?php if ($data['id_user'] === $_SESSION['id_user']): ?>
            <a href="modifier.php?id=<?php echo $data['id']; ?>">Modifier</a>
            <a href="suppression.php?id=<?php echo $data['id']; ?>">Supprimer</a>
        <?php endif; ?>
    </article>
<?php endwhile; ?>

    </section>
</body>
</html>