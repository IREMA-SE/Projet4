<?php ob_start(); ?>
    <h2>Ajout d'un article</h2>
    <form action="index.php?action=addpost" method="post">
    	<input type="hidden" name="id" value="<?php echo $postid; ?>" />
        <div>
            <label for="title">Title</label><br />
            <input type="text" id="title" value="<?php echo $title; ?>" name="title" />
        </div>
        <div>
            <label for="content">Contenu</label><br />
            <textarea id="txtarea" name="content"><?php echo $content; ?></textarea>
        </div>
        <div>
            <input type="submit" />
    </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>