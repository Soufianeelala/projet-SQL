

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
  <form id="auth" action="se_connecter.php" method='POST'>
        <label id="username">Votre Nom</label>
        <input type="text" name="username" id="username">
        <label id="password">Votre mot de passe</label>
        <input type="password" name="password" id="password"><br>
            <button>se connecter</button>
            <a href="ajouter_utilisateur.php">s'inscrire</a>
            <a href="">se déconnecter</a>


    </form>
  
</body>
</html>