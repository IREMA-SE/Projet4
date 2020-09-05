<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog JF</title>
        <title>JF Blog | Accueil </title>
    	<link rel="apple-touch-icon" sizes="180x180" href='images/apple-touch-icon.png'>
        <link rel="icon" type="image/png" sizes="32x32" href='images/favicon-32x32.png'>
        <link rel="icon" type="image/png" sizes="16x16" href='images/favicon-16x16.png'>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<div class="container">
        		<!-- menu -->
        		<?php include('menu.php') ?>
        		<!-- banner -->
        		<?php include('banner.php') ?>
        		<!-- // banner -->
		    <div class="content">
					<h2>Dernières publications :</h2>
					<button id="ajoutbillet" onclick="window.location.href='add_post.php';">Ajouter un article</button>
					<br>
					<br>
                    <?php
                        while ($data = $posts->fetch())
                        {
                     ?>
                    <h3> <?= htmlspecialchars($data['title']) ?></h3>
                    <span class="createdate">Date du <?= $data['creation_date_fr'] ?></span>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                    <br />
                   <?php 
        		   	if($user['access_level'] == 1){
        			?> 
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        		   <?php 
        		   	} 
        			?>
                    <?php 
        		   	if($user['level'] == 1){
        			?> 
                    <em><a href="index.php?action=addpost&amp;id=<?= $data['id'] ?>">Modifier l'article</a></em>
                    <?php 
        		   	} 
        			?>
        			<br />
                    <button><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir les commentaires</a></em></button>
                    <button><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Ajouter un commentaire</a></em></button>
            
                    <?php
                    }
                    $posts->closeCursor();
                    ?>
                    <?php $content = ob_get_clean(); ?>
                    <?php require('template.php'); ?>
            </div>
	    </div>
		
</body>
</html>