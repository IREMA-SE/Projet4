<?php ob_start(); ?>
    <div class="container">
        <h1>Liste des commentaires</h1>
        
        <?php
        
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    Post:<?= htmlspecialchars($data['title']) ?>
                </h3>
                <p>
                    Author: <?= htmlspecialchars($data['author']) ?><br />
                <br />
                
                   Commnt: <?= nl2br(htmlspecialchars($data['comment'])) ?>
                    <br />
                   
                    <?php 
        			if($user['level'] == 1){
        				if($data['approved'] == 0){
        				?> 
        				<em><a href="index.php?action=approvecomment&act=1&amp;id=<?= $data['id'] ?>">Valider</a></em>
        				<?php 
        				}
        				
        				?> 
        				<em><a href="index.php?action=approvecomment&act=2&amp;id=<?= $data['id'] ?>">Supprimer</a></em>
        				<?php 
        				
            			}
            			?>
                    </p>
                </div>
        </div>
    <?php
    }
    $posts->closeCursor();
    $content = ob_get_clean();
    ?>
    <?php require('template.php'); ?>
</div>