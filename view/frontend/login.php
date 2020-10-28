
<?php ob_start(); ?>
       <h4>Se connecter</h4>
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
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>