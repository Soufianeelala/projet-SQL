
<?php
$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');

if (isset($_POST['username']) && isset($_POST['password']) ){
    if (!empty($_POST['username']) && !empty($_POST['password']) ){
        $user = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


$request =$bdd->prepare( " SELECT  * from utilisateur where username= :username ");
$request->execute([
    "username"=>$user,
    
]);
}

         // Récupération des données de l'utilisateur
  
         if ($data) {
            // Cryptage du mot de passe saisi
            $entryPasswordCrypted = sha1(sha1($password) . "5943");
            
            // Vérification des informations
            if (($data['username'] === $user) && ($data['password'] === $entryPasswordCrypted)) {
                $_SESSION['id_user']=$data['id_username'];
                // Redirection après une connexion réussie
                header('Location: index.php');
                exit;
            } else {
                echo '<p class="error">Mot de passe ou nom d\'utilisateur incorrect</p>';
            }
        } else {
            echo '<p class="error">Nom d\'utilisateur introuvable</p>';
        }
    //  else {
    //     echo '<p class="error">Veuillez remplir tous les champs</p>';
    // }
    echo $iduser;

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
  <form id="auth" action="utilisateur.php" method='POST'>
        <label id="username">Votre Nom</label>
        <input type="text" name="username" id="nausernameme">
        <label id="password">Votre mot de passe</label>
        <input type="password" name="password" id="password"><br>
            <button >se connecter</button>
            <a href="ajouter_utilisateur.php">s'inscrire</a>
            <a href="">se déconnecter</a>


    </form>
  
</body>
</html>