<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog JF</title>
        <title>JF Blog | Accueil </title>
    	<link rel="apple-touch-icon" sizes="180x180" href='images/apple-touch-icon.png'>
        <link rel="icon" type="image/png" sizes="32x32" href='images/favicon-32x32.png'>
        <link rel="icon" type="image/png" sizes="16x16" href='images/favicon-16x16.png'>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
   
    <body>

		<!--JS FOR TEXT EDITOR-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
        <script type="text/javascript">
    			tinymce.init({
					selector: '#txtarea'
				});
		</script>
		
		<!--//BODY SECTION TOP HEADER MENU-->
		<div class="container">
        		<div class="topbanner"> 
        			<a href="index.php">Home I</a>
        			<?php
        				if(isset($_SESSION["logged"]) && $_SESSION["logged"] == 1){
        					if($user["level"] == 1){
        						?>
        						<a href="index.php?action=users">Liste des utilisateurs I</a>
        						<a href="index.php?action=listcomments">Les Commentaires à valider I</a>
        						<?php
        					}
        					?>
        					<a href="index.php?action=logout">Se déconnecter I</a>
        					<?php
        				}else{
        					?>
        					<a href="index.php?action=register">S'inscrire I</a>
        					<a href="index.php?action=login">Se connecter I</a>
        					<?php
        				}
        			?>
        		</div>
        		<!--BODY SECTION HEADER MENU-->
        		<div class="menu">
        			<div class="logo_div">
        				<a href="index.php"><h1>Jean Forteroche</h1></a>
        				<p id="fonction-jf">Acteur et Ecrivain</p>
        			</div>
        			<ul>
        			  <li><a class="active" href="index.php">Accueil</a></li>
        			  <li><a href="#news">Bibliographie</a></li>
        			  <li><a href="#about">Biographie</a></li>
        			  <li><a href="#about">Distinctions honorifiques </a></li>
        			  <li><a href="#contact">Contact</a></li>
        			</ul>
        		</div>
        		
        		
        		<!--BODY SECTION MAIN TOP-->
        		<?php if (isset($_SESSION['user']['username'])) { ?>
        			<div class="logged_in_info">
        				<span>Bonjour et Bienvenue <?php echo $_SESSION['user']['username'] ?></span>
        				|
        				<span><a href="logout.php">logout</a></span>
        			</div>
        		<?php }else{ ?>
        			<div class="banner">
        				<div class="welcome_msg">
        					<h1>"Billet simple pour l'Alaska"</h1>
        					<p> 
        						est mon prochain roman sur lequel <br> 
        						je travaille actuellement. <br> 
        						Je vais le publier par épisode<br>
        						sur ce site. Bonne lecture!
        						<span></span>
        					</p>
        				</div>
        			</div><!--DEBUT CONTENT-->
        		<?php 
        		}
        		
        		echo $content; ?>

                
        		<!--BODY SECTION FOOTER-->
        		<div class="footer">
        			<p>Blog Jean Forteroche &copy; <?php echo date('Y'); ?></p>
        		</div>
        </div>
		<!-- // footer -->
    </body>
</html>