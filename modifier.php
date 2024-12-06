<?php
$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');

if (isset($_GET['id']) ){
   $id =$_GET['id'];
//  //Partie Consulter les donner////////////////////////////////////////////////

$request = $bdd-> prepare( " SELECT  * from fiche_film where id = :id  ");
$request -> execute([
    'id' => $id
]);
}?>
<!-- -------------------la Partie modifier -->
<?php
if(isset($_POST['titre']) && isset($_POST['duree'])&& isset($_POST['date'])){
    $id=htmlspecialchars($_POST['id']);
    $titre=htmlspecialchars($_POST['titre']); 
    $duree=htmlspecialchars($_POST['duree']);
    $date=htmlspecialchars($_POST['date']);
    echo $duree;
    echo $date;
    echo $titre;
    $requestModifier=$bdd->prepare(" UPDATE fiche_film 
                                    SET titre = :titre, date = :date, duree = :duree
                                                 WHERE id = :id

     ");

     $requestModifier->execute([
        'titre' =>$titre,
        'date' =>$date ,
        'duree'=>$duree ,
        'id' => $id      
      ]);
      // Redirection après La Modification
    header("Location: index.php");
    exit();
}
 
;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
        <title>Modifier le film</title>
</head>
<body>
  <?php include("nav.php"); ?>
 <h1> Modifier le film</h1>
  <form action="modifier.php" method="post">
  <?php if($data = $request -> fetch()):;?>
    <!-- Champ caché pour inclure l'ID du film -->
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

    <label for="titre">TITRE</label>
    <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($data['titre']); ?>">

    <label for="duree">LA DURÉE</label>
    <input type="text" id="duree" name="duree" value="<?php echo htmlspecialchars($data['duree']); ?>">

    <label for="annee">L'ANNÉE</label>
    <input type="text" id="date" name="date" value="<?php echo htmlspecialchars($data['date']); ?>">

    <button type="submit">Modifier</button>
</form>
<?php endif; ?>

</body>
</html>
        
</body>
</html>