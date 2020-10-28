<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

		<button> <a  href="index.php">Retour en accueil</a></button>
            <h4>
                <?= htmlspecialchars($post['title']) ?><br />
                <span class="createdate"><em>le <?= $post['creation_date_fr'] ?></em></span> 
            </h4>
            
            <p>
                <?= $post['content'] ?>
            </p>
       
        <br>
        <h4>Commentaires des lecteurs</h4>
        <br>
        <?php
        	if($isauth == 1){
        ?>
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
           
            <div>
                <label for="comment">Ajouter un commentaire</label><br />
                <textarea id="txtarea" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
        
        <?php
        	}
        	
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong><br> 
            <span class="createdate">Posté le: <?= $comment['comment_date_fr'] ?></span><br>
            <p><?= $comment['comment'] ?></p>
            <?php
			if(isset($_SESSION["logged"]) && $_SESSION["logged"] == 1){
			?>
            <a href="index.php?action=post&id=<?php echo $comment['post_id']; ?>&disp=<?php echo $comment['id']; ?>">Signaler ce commentaire</a>
            <?php
			}
			?>
            <hr />
        <?php
        }
        ?>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>