<?php ob_start(); ?>

<div class="container">
    <h2>S'inscrire</h2>
    
    <?= $error; ?>
    
    <form action="index.php?action=register" method="post">
    	<div>
        	<label for="name">Name</label><br />
            <input type="text" id="name" value="<?= $name; ?>" name="name" />
        </div>
        <div>
            <label for="email">Adresse E-mail</label><br />
            <input type="email" id="email"  name="email" />
        </div>
        <div>
            <label for="password">Mot de passe</label><br />
            <input id="password" type="password" name="password" />
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>