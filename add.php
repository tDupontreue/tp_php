<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

?>

<!doctype html>
<html lang="fr">
  <head>
    <title>Ajouter !</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
       <div class="text-center">
            <h1 >Bonjour <?php echo $data['pseudo']; ?> ! <a href="deconnexion.php" >Déconnexion</a></h1>
            <hr />
            <a href="home.php" >Afficher recette</a>
            <a href="add.php" >Ajouter recette</a>
            <a href="del.php" >Suprimer recette</a>
        </div>    

    <h1>Ajout de recette</h1>
    <?php
    if (isset($_POST["btnRecette"])) 
    {
                $Req = $bdd->query("INSERT INTO recette(Titre) VALUES ('" . $_POST["nomRecette"] . "')");
                echo "Recette ajouté";  
                ?>
                <p><a href="add.php">Ajouter une autre recette</a></p>
            <?php
    } 
    else 
    {
    ?>
        <form action="" method="post">
            Nom Recette : <input type="text" name="nomRecette" id="nomRecette" required>
            <input type="submit" name="btnRecette" value="Ajouter une Recette">
        </form>
    <?php
    }
    $Req = $bdd->query("SELECT * FROM recette");
    ?>
        <table>
            <tr>
                <th>Titre</th>
            </tr>
            <?php
            while ($tab = $Req->fetch()) {
            ?>
                <tr>
                    <td><?php echo $tab["Titre"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
  </body>
</html>