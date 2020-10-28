<?php ob_start(); ?>


        <h3>Commentaires des lecteurs</h3>      
        <?php  
        while ($data = $posts->fetch())
        {
        ?>
                <h4>
                    Post:<?= htmlspecialchars($data['title']) ?>
                </h4>
                <p>
                    Author: <?= htmlspecialchars($data['author']) ?><br />
                <br />
                
                   Commnt: <?= $data['comment'] ?>
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
        
		<?php
		}
		$posts->closeCursor();
		$content = ob_get_clean();
		?>
	<?php require('template.php'); ?>