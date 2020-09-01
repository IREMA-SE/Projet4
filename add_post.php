<?php
    if(isset($_POST["titre"])){
        
        
        $titre = $_POST["titre"]; 
        $contenu = $_POST["contenu"];
        
        //Code to insert posts into database
        $req = $bdd->prepare('INSERT INTO billets(titre, contenu, CURDATE())');
        $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu));

        $req = $bdd->query('INSERT INTO `billets`( `titre`, `contenu`) VALUES ("'.$titre.'","'.$contenu.'")');
        
        header("Location:index.php?");
        
    }
?>

<div>
	<form method="post" action="" >
		<h2>Ajout d'un billet</h2>
		<p>Titre: <input type="text" name="titre" value="<?php echo $titre;?>"></p>
		<p>Contenu: <textarea name="contenu" rows="5" cols="50"><?php echo $contenu;?></textarea></p>
		<p><button type="submit" class="btn" name="addpost">Poster</button><br></p>
	</form>	
</div>

