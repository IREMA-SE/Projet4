<?php ob_start(); ?>
<h1>Users Lists</h1>
<p><a href="index.php?action=adduser">Add New User</a></p>

<?php

while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['name']) ?>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['email'])) ?>
            <br />
           
            <?php 
		   	if($user['level'] == 1){
			?> 
            <em><a href="index.php?action=adduser&amp;id=<?= $data['Id'] ?>">Update User</a></em>
            <?php 
		   	} 
			?>
        </p>
    </div>
<?php
}
$posts->closeCursor();
$content = ob_get_clean();
?>
<?php require('template.php'); ?>