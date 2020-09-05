<?php
    include("connection.php");
    if(isset($_POST["auteur"])){
        $auteur = $_POST["auteur"]; 
        $commentaire = $_POST["commentaire"];
        
        //Ajout de commentaire à la BD
        $req = $bdd->prepare('INSERT INTO commentaires(auteur, commentaire, CURDATE())');
        $req->execute(array(
            'auteur' => $auteur,
            'commentaire' => $commentaire));
            
        $req = $bdd->query('INSERT INTO `commentaires`( `auteur`, `commentaire`, `id_billet`) VALUES ("'.$auteur.'","'.$commentaire.'",'.$_GET['billet'].')');
        
        header("Location:commentaires.php?billet=" . $_GET["billet"]);
    }
?>
<?php
            $artreq = $bdd->query('SELECT * FROM billets WHERE id = '.$_GET["billet"].'');
            $article = $artreq->fetch();
        ?>
        
        
     <div class="news">
        <h3>
            <?php echo htmlspecialchars($article['titre']); ?>
            <em>le <?php echo $article['date_creation']; ?></em>
         </h3>
    
        <p>
            <?php
            echo nl2br(htmlspecialchars($article['contenu']));
            ?>
        </p>
    </div>    
<div>
	<form method="post" action="" >
		<h2>Ajout d'un commentaire</h2>
		<p>Auteur: <input type="text" name="auteur" value="<?php echo $auteur;?>"></p>
		<p>Commentaire: <textarea name="commentaire" rows="5" cols="50"><?php echo $commentaire;?></textarea></p>
		<p><button type="submit" class="btn" name="addcomment">Poster</button><br></p>
		
	</form>	
</div>
<?php
// Fin de la boucle des commentaires
$req->closeCursor();
?>