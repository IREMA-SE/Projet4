<?php ob_start(); ?>

<div class="container">
    <h2>Se connecter</h2>
    <form action="index.php?action=login" method="post">
    	
        <div>
            <label for="email">Adresse E-mail</label><br />
            <input type="text" id="email"  name="email" />
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