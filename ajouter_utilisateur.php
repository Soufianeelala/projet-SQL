<?php
$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');

if (isset($_POST['username']) && isset($_POST['password'])) {
    // La fonction trim() supprime les espaces inutiles.
    $user = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Affichage de username après soumission du formulaire
    echo "Nom d'utilisateur : " . $user;
     // Cryptage du mot de passe
     $passwordCrypted = sha1(sha1($password) . "5943");
     echo "password : " . $passwordCrypted;
        


    // Vérifiez si l'utilisateur existe déjà
    $checkUser = $bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE username = :username');
    $checkUser->execute(["username" => $user]);
    $userExists = $checkUser->fetchColumn();

    if ($userExists == 0) {
        // Insertion d'un nouvel utilisateur
        $request = $bdd->prepare('INSERT INTO utilisateur (username, password ) VALUES (:username, :password )');
        $request->execute([
            "username" => $user,
            "password" =>$passwordCrypted
        ]);

        echo "<p>Utilisateur ajouté avec succès !</p>";
    } else {
        echo "<p>Le nom d'utilisateur est déjà utilisé.</p>";
    }
} else {
    echo "<p>Veuillez remplir tous les champs.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter un Film</title>
</head>
<body>
  <?php include("nav.php"); ?>
  <form id="auth" action="ajouter_utilisateur.php" method='POST'>
      <label for="username">Votre Nom</label>
      <input value="" type="text" name="username" id="username">
      <label for="password">Votre mot de passe</label>
      <input type="password" name="password" value="" id="password"><br>
      <button type="submit">S'inscrire</button>
      <a href="index.php">Accueil</a>

  </form>
</body>
</html>
