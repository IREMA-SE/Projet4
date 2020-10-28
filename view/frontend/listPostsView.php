<?php ob_start(); ?>

                <h3>Dernières publications :
                	<?php
                    if($user['level'] == 1){
                ?> 
                <button id="ajoutbillet"><a href="index.php?action=addpost">Ajouter un article</a></button>
                <?php
                }
                ?>
                
                </h3>
                <br>
                <br>
                <div class="post-content">
                <?php
                while ($data = $posts->fetch())
                {
                ?>
                <h4> <?= htmlspecialchars($data['title']) ?></h4>
                <span class="createdate">Date du <?= $data['creation_date_fr'] ?></span><br>
                <?php
                	$content = $data['content'];
                    $content = strip_tags($content);
                    
                ?>
                	
                
                <br />
                <?php 
                echo substr($content, 0, 600). '... ' . '<button><a href="index.php?action=post&amp;id='. $data['id'] .'">Lire la suite</a></button>';
                
                ?>
                <?php 
                if($user['level'] == 1){
                ?> 
                <button><em><a href="index.php?action=addpost&amp;id=<?= $data['id'] ?>">Modifier</a></em></button>
                <button><em><a href="index.php?action=delpost&amp;id=<?= $data['id'] ?>">Supprimer</a></em></button>
                <?php 
                } 
                ?>
                

<?php
}

?>
</div>
<?php

$posts->closeCursor();
$content = ob_get_clean();
?>
<?php require('template.php'); ?>