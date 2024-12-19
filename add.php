
<?php
$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');
if(isset($_POST['titre']) && isset($_POST['duree'])&& isset($_POST['date'])&& isset($_FILES['image'])){
    $titre=htmlspecialchars($_POST['titre']); 
    $duree=htmlspecialchars($_POST['duree']);
    $date=htmlspecialchars($_POST['date']);
   
    if(isset($_FILES['image'])){
        $image = $_FILES['image']['name'];
        $imageInfo = pathinfo($image);
        $imageExt = $imageInfo['extension'];
        // Tableau qui va permettre de spécifier les extensions autorisées
        $autorizedExt = ['png','jpeg','jpg','webp','bmp','svg'];

        // Verification de l'extention du fichier
        
        if(in_array($imageExt,$autorizedExt)){
            $uniqueName = time() . rand(1,1000) . "." . $imageExt;
            move_uploaded_file($_FILES['image']['tmp_name'],"assets/img/".$uniqueName); 
        }

    echo $duree;
    echo $date;
    echo $titre;
    $request=$bdd->prepare(' INSERT INTO fiche_film( titre, date ,duree ,image ) 
                            VALUE (:titre,:date,:duree ,:image)
     ');

     $request->execute([
        'titre' =>$titre,
         'date' =>$date ,
         'duree'=>$duree ,
         'image'=>$uniqueName
        ]);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>ajouter un Film</title>
</head>
<body>
  <?php include("nav.php"); ?>
  <form action="add.php" method="post" enctype ="multipart/form-data">

    <label for="titre">TITRE</label>
    <input type="text" id="titre" name="titre">
    
    <label for="duree">LA DUREE</label>
    <input type="text" id="duree" name="duree">
    
    <label for="annee">L'ANNEE</label>
    <input type="text" id="date" name="date">

    <label for="image"> entrer l' image </label>
    <input type="file" id ="image"  name="image"  required>
    
    <button type="submit">Ajouter</button>
  </form>
</body>
</html>