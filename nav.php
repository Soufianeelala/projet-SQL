<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Admin Icon</title>
    <!-- Font Awesome CDN -->
<nav>

    <ul>
        <li><a href ="index.php">Accueil</a></li>
               <li class='admin-icon'><a href ='utilisateur.php'> <i class='fas fa-user-shield admin-icon'></i>    </a></li>

<?php
            if(isset($_SESSION['username'])){
                echo"        <li><a href ='add.php'>Ajouter un film</a></li>";
            }else{
                echo"        <li> <a href ='ajouter_utilisateur.php'>   </a></li>";


            }

            
            ?>
    </ul>
</nav>