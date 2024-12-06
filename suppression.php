<?php
$bdd = new PDO('mysql:host=localhost;dbname=film2;charset=utf8', 'root', '');
// ------------------------Partie consulter 
if (isset($_GET['id']) ){
   $id =$_GET['id'];

$request = $bdd-> prepare( " SELECT  * from fiche_film 
                                        where id= :id  ");
$request -> execute([
    'id' => $id 

]);
}
?>
<!-- -------------------la Partie suppression -->
 
<?php
if (isset($_GET['id'])) { // Vérifie si un ID est envoyé pour suppression
    $id = htmlspecialchars($_GET['id']); 
    
    $requestSupprimer = $bdd->prepare("DELETE FROM fiche_film WHERE id = :id");
    $requestSupprimer->execute(['id' => $id]);
    
    // Redirection après suppression
    header("Location: index.php");
    exit();
}
?>

        
</body>
</html>