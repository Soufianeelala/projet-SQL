<?php
$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');

if (isset($_GET['id']) ){
   $id =$_GET['id'];

$request = $bdd-> prepare( " SELECT  * from fiche_film where id=:id  ");
$request -> execute([
    "id"=>$id
]);
}
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
        <h1>Récupération La  Fiche Technique de Film</h1>
        <section>
             <?php if($data = $request -> fetch()):;?>
            <article id=voirplus>
                <p>Titre:<?php echo $data['titre'];?></p>
                <?php  $duree=$data['duree'];
                $heures = intdiv($duree, 60); // Division entière pour obtenir les heures
                $min = $duree % 60;   // Reste pour obtenir les minutes?>
                <img id="imgvoirplus" src="ASSETS/img/<?php echo $data['image']; ?>" alt="Image"  >
                <p>Durée : <?php echo $heures ."H". $min ."min" ?></p>
                <p>La date:<?php echo $data['date'];?> </p>
                <?php $uniqueName=$data['image'];
                ?>
                <a href="voir_plus.php?id=<?php echo $data['id'];?>  ">voir plus</a>
                <a href="modifier.php?id=<?php echo $data['id'];?> "> Modifier</a>
                <a href="Suppression.php?id=<?php echo $data['id'];?> ">Supprimer</a>    
            </article>
            <?php endif ?>
        </section>
        
</body>
</html>