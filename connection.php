<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mydbname;charset=utf8', '', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>