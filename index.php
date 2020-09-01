<?php  include('connection.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog JF</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Blog Jean Forteroche</h1>
        <p>Dernières publications :</p>
		<button id="ajoutbillet" onclick="window.location.href='add_post.php';">Ajouter un billet</button>

<?php

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
     <br />
    <button><em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Voir les commentaires</a></em></button>
    <button><em><a href="add_commentaires.php?billet=<?php echo $donnees['id']; ?>">Ajouter un commentaire</a></em></button>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</body>
</html>