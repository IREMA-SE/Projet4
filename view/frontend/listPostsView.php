
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
