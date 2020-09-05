<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<h2>Add Post</h2>

<form action="index.php?action=addpost" method="post">
	<input type="hidden" name="id" value="<?php echo $postid; ?>" />
    <div>
        <label for="title">Title</label><br />
        <input type="text" id="title" value="<?php echo $title; ?>" name="title" />
    </div>
    <div>
        <label for="content">Blog</label><br />
        <textarea id="content" name="content"><?php echo $content; ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
