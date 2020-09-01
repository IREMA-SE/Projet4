<?php  include('connection.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog JF</title>
        <title>JF Blog | Accueil </title>
    	<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<div class="container">
				<!-- container - wraps whole page -->
	    
        		<!-- menu -->
        		<?php include('sections/menu.php') ?>
        		<!-- // menu -->
        
        		<!-- banner -->
        		<?php include('sections/banner.php') ?>
        		<!-- // banner -->
		    <div class="content">
				<h2>Dernières publications :</h2>
				<button id="ajoutbillet" onclick="window.location.href='add_post.php';">Ajouter un billet</button>
                <br>
                 <br>
                <?php
                
                // On récupère les 5 dernières publications par ordre décroissant
                $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
                
                while ($donnees = $req->fetch()){
                ?>
                
                <h3>
                 <?php echo htmlspecialchars($donnees['titre']); ?>
                <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                </h3>
                 <br>
				<?php
				// Afficher le contenu du billet
				echo nl2br(htmlspecialchars($donnees['contenu']));
				?>
				<br />
				<button><em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Voir les commentaires</a></em></button>
				<button><em><a href="add_commentaires.php?billet=<?php echo $donnees['id']; ?>">Ajouter un commentaire</a></em></button>
				<br>
				<br>
                <br>
            	<?php
            	} // Fin de la boucle des billets
            	$req->closeCursor();
            	?>
        </div>
	</div>
</body>
</html>