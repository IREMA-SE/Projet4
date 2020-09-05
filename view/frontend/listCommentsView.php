<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Comments Lists</h1>


<?php

while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            Post:<?= htmlspecialchars($data['title']) ?>
        </h3>
        <p>
            Author: <?= htmlspecialchars($data['author']) ?>
        <br>
        
           Commnt: <?= nl2br(htmlspecialchars($data['comment'])) ?>
            <br />
           
            <?php 
			if($user['level'] == 1){
				if($data['approved'] == 0){
				?> 
				<em><a href="index.php?action=approvecomment&act=1&amp;id=<?= $data['id'] ?>">Approve</a></em>
				<?php 
				}
				
				?> 
				<em><a href="index.php?action=approvecomment&act=2&amp;id=<?= $data['id'] ?>">Delete</a></em>
				<?php 
				
			}
			?>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
